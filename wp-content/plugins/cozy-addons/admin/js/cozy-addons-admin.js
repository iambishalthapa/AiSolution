(function ($) {
  "use strict";

  /**
   * All of the code for your admin-facing JavaScript source
   * should reside in this file.
   *
   * Note: It has been assumed you will write jQuery code here, so the
   * $ function reference has been prepared for usage within the scope
   * of this function.
   *
   * This enables you to define handlers, for when the DOM is ready:
   *
   */

  var templateStatus = $("#display_option").val();
  if (templateStatus === "specific_pages") {
    $("#template-conditions").css("display", "block");
    onvalueChanged();
  } else {
    $("#template-conditions").css("display", "none");
    onvalueChanged();
  }
  //console.log(templateStatus);
  function onvalueChanged() {
    $("#display_option").change(function () {
      var selectedOption = $(this).val();
      //alert(selectedOption);
      if (selectedOption === "specific_pages") {
        $("#template-conditions").css("display", "block");
      } else {
        $("#template-conditions").css("display", "none");
      }
    });
  }

})(jQuery);
