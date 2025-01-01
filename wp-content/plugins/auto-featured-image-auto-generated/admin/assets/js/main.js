"use strict";
jQuery(function () {
  jQuery("#atfit-tabs").tabs({
    activate: function (event, ui) {
      const hash = ui.newPanel.attr("id");
      // window.location.hash = hash;
      localStorage.setItem("atfit-tab", "#" + hash);
      if (history.pushState) {
        history.pushState(null, null, "#" + hash);
      } else {
        window.location.hash = "#" + hash;
      }
    },
  });

  // Use shortcuts Example: Use arrow keys to navigate tabs
  jQuery(document).on("keydown", function (e) {
    var tab = jQuery("#atfit-tabs");
    if (tab.length) {
      var active = tab.tabs("option", "active");
      if (e.key === "ArrowLeft") {
        // left
        if (active > 0) {
          tab.tabs("option", "active", active - 1);
        }
      } else if (e.key === "ArrowRight") {
        // right
        if (active < tab.find(".ui-tabs-nav li").length - 1) {
          tab.tabs("option", "active", active + 1);
        }
      }
    }
  });

  jQuery("#atfit-featured-image-generate").on("click", function (e) {
    var post_id = jQuery("#atfit-featured-image-post").val();
    var preview = jQuery("#atfit-featured-image img");
    var loading = jQuery("#atfit-featured-image .atfit-loading");
    var terminal = jQuery("#atfit-terminal");
    if (!post_id) {
      alert("Please select a post");
      return;
    }
    terminal.css("display", "none");
    loading.css("display", "flex");
    jQuery("#atfit-featured-image-generate").attr("disabled", "disabled");
    // Settings key value pairs form
    var settings = jQuery("#atfit-settings")
      .serializeArray()
      .reduce(function (obj, item) {
        if (item.name.endsWith("[]")) {
          // console.log("multiple", item);
          item.multiple = true;
        }
        item.name = item.name.replace("atfit_settings[", "");
        item.name = item.name.replace("[]", "");
        item.name = item.name.replace("]", "");

        // check if is array (multiple)

        // if (Array.isArray(obj[item.name])) {

        if (item.multiple) {
          if (!obj[item.name]) {
            obj[item.name] = [];
          }
          obj[item.name].push(item.value);
        } else {
          obj[item.name] = item.value;
        }

        return obj;
      }, {});

    atfit.getImage(post_id, settings, function (response, error) {
      jQuery("#atfit-featured-image-generate").removeAttr("disabled");
      if (response) {
        preview.css("display", "block");
        preview.attr("src", response.data.image);
        preview.attr(
          "alt",
          "Query: " +
            response.data.query +
            " Prompt: " +
            response.data.prompt +
            " Sources: " +
            JSON.stringify(response.data.background_source)
        );
        terminal.html(
          "<strong>Debug</strong><hr>" +
            "<strong>Query: </strong>" +
            response.data.query +
            "<br>" +
            "<strong>Prompt: </strong>" +
            response.data.prompt +
            "<br>" +
            "<strong>Source: </strong>" +
            JSON.stringify(response.data.background_source) +
            "<br>"
        );
      } else {
        preview.css("display", "none");
        terminal.html(
          "<strong>Debug</strong><hr>" +
            "<strong>Error: </strong>" +
            error.data.message +
            "<br>" +
            "<strong>Query: </strong>" +
            error.data.query +
            "<br>" +
            "<strong>Prompt: </strong>" +
            error.data.prompt +
            "<br>" +
            "<strong>Source: </strong>" +
            JSON.stringify(error.data.background_source) +
            "<br>"
        );
      }
      terminal.css("display", "block");
      loading.css("display", "none");
    });
  });
});

var atfit = {
  count: 0,
  running_bulk: false,
  bulk_max: 0,
  addColor: function () {
    var colors = document.querySelector("#atfit-custom-solid-colors");
    var input = document.createElement("input");
    // random color
    var color = "#FFFFFF";
    input.type = "color";
    input.value = color;
    input.setAttribute("value", color);
    input.name = "atfit_settings[custom_solid_color][]";
    var container = document.createElement("div");
    container.classList.add("atfit-custom-solid-color");
    container.appendChild(input);
    var remove = document.createElement("span");
    remove.classList.add("remove");
    remove.classList.add("dashicons");
    remove.classList.add("dashicons-no");
    remove.onclick = function () {
      atfit.removeColor(this);
    };
    container.appendChild(remove);
    colors.appendChild(container);
  },
  removeColor: function (el) {
    // Check if is the last color
    var colors = document.querySelectorAll(".atfit-custom-solid-color");
    if (colors.length === 1) {
      alert("You need at least one color");
      return;
    }
    el.parentNode.remove();
  },
  bulkGenerate: function () {
    atfit.running_bulk = true;
    atfit.bulk_max = parseInt(document.querySelector("#atfit-limit").value);
    if (isNaN(atfit.bulk_max) || atfit.bulk_max <= 0) {
      atfit.bulk_max = 0;
    }
    document.querySelector("#atfit-bulk").classList.add("running");

    if (atfit.count >= atfit.bulk_max) {
      atfit.running_bulk = false;
      document.querySelector("#atfit-bulk").classList.remove("running");
      document.querySelector("#atfit-limit").disabled = false;
      document.querySelector("#atfit-featured-bulk-generate").disabled = false;
      atfit.count = 0;

      return;
    }

    document.querySelector("#atfit-limit").disabled = true;
    document.querySelector("#atfit-featured-bulk-generate").disabled = true;
    var data = {
      action: "atfit_bulk_image",
      nonce: atfit_data.nonce,
    };
    jQuery
      .post(atfit_data.ajax_url, data, function (response) {
        if (response.data.post) {
          atfit.count++;

          document.querySelector("#atfit-bulk-count").innerHTML = atfit.count;
          document.querySelector("#last-generated").innerHTML = response.data.post.post_title;

          if (response.data.success === true) {
            document.querySelector("#atfit-bulk-list").innerHTML +=
              "<a class='post' href='post.php?post=" +
              response.data.post.ID +
              "&action=edit' target='_blank'>" +
              "<img src='" +
              response.data.attachment.url +
              "' />" +
              response.data.post.post_title +
              "</a>";
          } else {
            document.querySelector("#atfit-bulk-list").innerHTML +=
              "<a class='post error' href='post.php?post=" +
              response.data.post.ID +
              "&action=edit' target='_blank'>" +
              response.data.post.post_title +
              "</a>";
          }
          atfit.bulkGenerate();
        } else {
          atfit.running_bulk = false;
          document.querySelector("#atfit-bulk").classList.remove("running");
          document.querySelector("#atfit-limit").disabled = false;
          document.querySelector("#atfit-featured-bulk-generate").disabled = false;
          if (response.data.message) {
            alert(response.data.message);
          }
        }
      })
      .fail(function (e) {
        console.log(e);
        atfit.running_bulk = false;
        document.querySelector("#atfit-bulk").classList.remove("running");
        document.querySelector("#atfit-limit").disabled = false;
        document.querySelector("#atfit-featured-bulk-generate").disabled = false;
        alert("Error generating featured images");
      });
  },

  getImage: function (post_id, settings, cb) {
    var data = {
      action: "atfit_get_image",
      post_id: post_id,
      nonce: atfit_data.nonce,
      settings: settings,
    };
    jQuery.post(atfit_data.ajax_url, data, function (response) {
      if (response.success) {
        return cb(response);
      }
      return cb(null, response);
    });
  },
};

// Watch history changes for selecting tab
window.addEventListener("popstate", function (e) {
  var hash = window.location.hash;
  if (hash) {
    jQuery("#atfit-tabs").tabs("option", "active", jQuery(hash).index());
  }
});

// check if tab is stored in local storage
var tab = localStorage.getItem("atfit-tab");
// use tab as hash
if (tab) {
  localStorage.setItem("atfit-tab", tab);
  if (history.pushState) {
    history.pushState(null, null, tab);
  } else {
    window.location.hash = tab;
  }
}
