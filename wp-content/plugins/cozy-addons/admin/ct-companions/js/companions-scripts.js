(function ($) {
  "use strict";
  $(document).ready(function () {
    // Check if there's a saved active tab in localStorage
    var activeTab = localStorage.getItem("activeTab");
    if (activeTab !== null) {
      changeTab(activeTab);
    } else {
      changeTab(0);
    }

    // Bind click event to tabs
    $(".ct-tab").click(function () {
      var tabIndex = $(this).data("index");
      changeTab(tabIndex);
    });

    //Enable/Disable blocks.
    const ajax_url = ajax_object.ajax_url;

    const isElementorActive = ajax_object.isElementorActive;

    const isPremium = ajax_object.isPremium;
    const premiumBlocks = [
      "modal",
      "news-ticker",
      "post-slider",
      "related-post",
      "popular-post",
      "trending-post",
      "product-slider",
      "product-tab",
      "post-views",
      "post-comments",
      "featured-post-tabs",
      "advanced-categories",
      "featured-product-tabs",
      "categorized-post-tabs",
      "magazine-grid",
      "magazine-list",
      "featured-post",
      "wishlist",
      "quick-view",
      "featured-product",
    ];

    $("#cozy-blocks-enable-super").click(function () {
      $(".cozy-block-active").each(function () {
        var blockName = $(this).attr("name");
        var checkboxId = $(this).attr("id");

        $.ajax({
          url: ajax_url,
          method: "POST",
          data: {
            action: "update_cozy_block_option",
            block_name: blockName,
            checked: !premiumBlocks.includes(blockName)
              ? "1"
              : isPremium && premiumBlocks.includes(blockName)
              ? "1"
              : "",
          },
          success: function (response) {
            if (!premiumBlocks.includes(blockName)) {
              $("#" + checkboxId).prop("checked", true);
            }

            if (isPremium && premiumBlocks.includes(blockName)) {
              $("#" + checkboxId).prop("checked", true);
            }
          },
          error: function (xhr, status, error) {
            console.log("Error:", error);
          },
        });
      });
    });

    $("#cozy-blocks-disable-super").click(function () {
      $(".cozy-block-active").each(function () {
        var blockName = $(this).attr("name");
        var checkboxId = $(this).attr("id");

        $.ajax({
          url: ajax_url,
          method: "POST",
          data: {
            action: "update_cozy_block_option",
            block_name: blockName,
            checked: "0",
          },
          success: function (response) {
            $("#" + checkboxId).prop("checked", false);
          },
          error: function (xhr, status, error) {
            console.log("Error:", error);
          },
        });
      });
    });

    // Event listener for changes in any checkbox
    $(".cozy-block-active").change(function () {
      var blockName = $(this).attr("name");
      var isChecked = $(this).is(":checked");
      // Perform AJAX call to update the option value on checkbox change
      $.ajax({
        url: ajax_url,
        method: "POST",
        data: {
          action: "update_cozy_block_option",
          block_name: blockName,
          checked: isChecked ? "1" : "0",
        },
        success: function (response) {
          // console.log(`${blockName}: Active status(${isChecked})`);
        },
        error: function (xhr, status, error) {
          console.log("Error:", error);
        },
      });
    });

    // Block CPT enable/disable
    $(".ca__block-cpt").change(function () {
      const templateName = $(this).attr("name");
      const isChecked = $(this).is(":checked");

      $.ajax({
        url: ajax_url,
        method: "POST",
        data: {
          action: "toggle_ca_cpt_enable",
          templateName: templateName,
          checked: isChecked ? "1" : "0",
        },
        success: function (response) {
          // console.log(`${templateName}: Active status(${isChecked})`);
        },
        error: function (xhr, status, error) {
          console.log("Error:", error);
        },
      });
    });

    //Cozy block upsell tooltop.
    $(".cozy-block-upsell").on("click", function (event) {
      event.preventDefault();
      if ($(this).next(".cozy-block-upsell-tooltip").is(":visible")) {
        $(this).next(".cozy-block-upsell-tooltip").hide();
        return;
      }
      $(".cozy-block-upsell-tooltip").hide();
      $(this).next(".cozy-block-upsell-tooltip").show();
    });

    function getElementorEnabledOption(checkboxId) {
      $.ajax({
        url: ajax_url,
        method: "POST",
        data: {
          action: "get_cozy_addons_elementor_widgets_enabled",
        },
        success: function (response) {
          if (isElementorActive) {
            $.ajax({
              url: ajax_url,
              method: "POST",
              data: {
                action: "update_cozy_addons_elementor_widgets_enabled",
                checked: "1",
              },
              success: function (response) {
                // console.log(`Elementor Widgets: Active status(${isChecked})`);
              },
              error: function (xhr, status, error) {
                console.log("Error:", error);
              },
            });
          } else {
            $.ajax({
              url: ajax_url,
              method: "POST",
              data: {
                action: "update_cozy_addons_elementor_widgets_enabled",
                checked: "0",
              },
              success: function (response) {
                // console.log(`Elementor Widgets: Active status(${isChecked})`);
              },
              error: function (xhr, status, error) {
                console.log("Error:", error);
              },
            });
          }

          if ("" === response && isElementorActive) {
            $("#" + checkboxId).prop("checked", true);
          } else {
            $("#" + checkboxId).prop("checked", response === "1");
          }
        },
        error: function (xhr, status, error) {
          console.log("Error:", error);
        },
      });
    }

    $(".cozy-elementor-widgets").each(function () {
      var checkboxId = $(this).attr("id");
      getElementorEnabledOption(checkboxId);
    });

    $(".cozy-elementor-widgets").change(function () {
      var isChecked = $(this).is(":checked");
      // Perform AJAX call to update the option value on checkbox change
      $.ajax({
        url: ajax_url,
        method: "POST",
        data: {
          action: "update_cozy_addons_elementor_widgets_enabled",
          checked: isChecked ? "1" : "0",
        },
        success: function (response) {
          // console.log(`Elementor Widgets: Active status(${isChecked})`);
        },
        error: function (xhr, status, error) {
          console.log("Error:", error);
        },
      });
    });

    function getHeaderFooterEnabledOption(checkboxId) {
      $.ajax({
        url: ajax_url,
        method: "POST",
        data: {
          action: "get_ct_header_footer_enabled",
        },
        success: function (response) {
          $("#" + checkboxId).prop("checked", response === "1");
        },
        error: function (xhr, status, error) {
          console.log("Error:", error);
        },
      });
    }

    $(".ct-header-footer").each(function () {
      var checkboxId = $(this).attr("id");
      getHeaderFooterEnabledOption(checkboxId);
    });

    $(".ct-header-footer").change(function () {
      var isChecked = $(this).is(":checked");
      // Perform AJAX call to update the option value on checkbox change
      $.ajax({
        url: ajax_url,
        method: "POST",
        data: {
          action: "update_ct_header_footer_enabled",
          checked: isChecked ? "1" : "0",
        },
        success: function (response) {
          // console.log(`CT Header & Footer: Active status(${isChecked})`);
        },
        error: function (xhr, status, error) {
          console.log("Error:", error);
        },
      });
    });

    function getCustomAssetsEnabledOption(checkboxId) {
      $.ajax({
        url: ajax_url,
        method: "POST",
        data: {
          action: "get_ct_custom_assets_enabled",
        },
        success: function (response) {
          $("#" + checkboxId).prop("checked", response === "1");
        },
        error: function (xhr, status, error) {
          console.log("Error:", error);
        },
      });
    }

    $(".ct-custom-assets").each(function () {
      var checkboxId = $(this).attr("id");
      getCustomAssetsEnabledOption(checkboxId);
    });

    $(".ct-custom-assets").change(function () {
      var isChecked = $(this).is(":checked");
      // Perform AJAX call to update the option value on checkbox change
      $.ajax({
        url: ajax_url,
        method: "POST",
        data: {
          action: "update_ct_custom_assets_enabled",
          checked: isChecked ? "1" : "0",
        },
        success: function (response) {
          // console.log(`CT Custom Assets: Active status(${isChecked})`);
        },
        error: function (xhr, status, error) {
          console.log("Error:", error);
        },
      });
    });

    function getCustomFontsEnabledOption(checkboxId) {
      $.ajax({
        url: ajax_url,
        method: "POST",
        data: {
          action: "get_ct_custom_fonts_enabled",
        },
        success: function (response) {
          $("#" + checkboxId).prop("checked", response === "1");
        },
        error: function (xhr, status, error) {
          console.log("Error:", error);
        },
      });
    }

    $(".ct-custom-fonts").each(function () {
      var checkboxId = $(this).attr("id");
      getCustomFontsEnabledOption(checkboxId);
    });

    $(".ct-custom-fonts").change(function () {
      var isChecked = $(this).is(":checked");
      // Perform AJAX call to update the option value on checkbox change
      $.ajax({
        url: ajax_url,
        method: "POST",
        data: {
          action: "update_ct_custom_fonts_enabled",
          checked: isChecked ? "1" : "0",
        },
        success: function (response) {
          // console.log(`CT Custom Assets: Active status(${isChecked})`);
        },
        error: function (xhr, status, error) {
          console.log("Error:", error);
        },
      });
    });

    $(".cozy-addons-admin-notice").on("click", ".notice-dismiss", function () {
      $.ajax({
        url: ajax_url,
        data: {
          action: "cozy_upsell_dismissble_notice",
        },
      });
    });

    $(".cozy-blocks-admin-notice").on("click", ".notice-dismiss", function () {
      $.ajax({
        url: ajax_url,
        data: {
          action: "cozy_blocks_dismissble_notice",
        },
      });
    });

    $(".ca-elementor__removal-notice").on(
      "click",
      ".notice-dismiss",
      function () {
        $.ajax({
          url: ajax_url,
          data: {
            action: "ca_elementor_removal_dismissable_notice",
          },
        });
      }
    );
  });

  function changeTab(index) {
    // Get all tabs and tab contents
    var tabs = $(".ct-tab");
    var contents = $(".tab-content");

    // Remove active class from all tabs and contents
    tabs.removeClass("active-tab");
    contents.removeClass("active-content");

    // Add active class to the selected tab and content
    tabs.eq(index).addClass("active-tab");
    contents.eq(index).addClass("active-content");

    // Save the active tab index to localStorage
    localStorage.setItem("activeTab", index);

    setTimeout(() => {
      localStorage.setItem("activeTab", 0);
    }, 8000);
  }
})(jQuery);
