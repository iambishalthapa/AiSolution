(function ($) {
  "use strict";
  //Custom js for promotional widgets CTA button
  var isEditMode = false;
  $(window).on("elementor/frontend/init", function () {
    if (elementorFrontend.isEditMode()) {
      isEditMode = true;
    }
    if (isEditMode) {
      parent.document.addEventListener("mousedown", function (e) {
        var widgets = parent.document.querySelectorAll(".elementor-element--promotion");
        if (widgets.length > 0) {
          for (var i = 0; i < widgets.length; i++) {
            if (widgets[i].contains(e.target)) {
              var icon = widgets[i].querySelector(".icon > i");
              var dialog = parent.document.querySelector("#elementor-element--promotion__dialog");
              // var dialog = document.querySelector( "#elementor-element--promotion__dialog" );

              /* //Adding cozy-addons class to the element 
							dialog.addClass( "cozy-dialog-action" ); */
              if (icon.classList.toString().indexOf("cozy-widget-icons") >= 0) {
                dialog.querySelector(".dialog-buttons-action").style.display = "none";
                if (dialog.querySelector(".cozy-addons-dialog-cta") === null) {
                  var cozyAddonsBtn = document.createElement("button");
                  cozyAddonsBtn.textContent = "Upgrade To Pro";
                  cozyAddonsBtn.setAttribute("class", "cozy-addons-dialog-cta dialog-button dialog-action dialog-buttons-action elementor-button elementor-button-success");
                  cozyAddonsBtn.setAttribute("onclick", "window.open('https://cozythemes.com/cozy-addons/')");
                  dialog.querySelector(".dialog-buttons-wrapper").appendChild(cozyAddonsBtn);
                } else {
                  dialog.querySelector(".cozy-addons-dialog-cta").style.display = "";
                }
              } else {
                // dialog.querySelector( ".cozy-addons-dialog-cta" ).style.display = "";

                if (dialog.querySelector(".cozy-addons-dialog-cta") !== null) {
                  dialog.querySelector(".cozy-addons-dialog-cta").style.display = "none";
                }
              }
            }
          }
        }
      });
    }
  });
})(jQuery);
