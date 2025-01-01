(function ($) {
  "use strict";
  $("#modestra-dismiss-notice").on("click", ".notice-dismiss", function () {
    $.ajax({
      url: modestra_admin_localize.ajax_url,
      method: "POST",
      data: {
        action: "modestra_dismissble_notice",
        nonce: modestra_admin_localize.nonce,
      },
      success: function (response) {
        if (response.success) {
          console.log("Notice dismissed successfully.");
          $("#modestra-dismiss-notice").fadeOut(); // Hide the notice
        } else {
          console.log("Failed to dismiss notice:", response.data.message);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error:", textStatus, errorThrown);
      },
    });
  });
  $("#modestra-dashboard-tabs-nav li:first-child").addClass("active");
  $(".tab-content").hide();
  $(".tab-content:first").show();
  $("#modestra-dashboard-tabs-nav li").click(function () {
    $("#modestra-dashboard-tabs-nav li").removeClass("active");
    $(this).addClass("active");
    $(".tab-content").hide();
    var activeTab = $(this).find("a").attr("href");
    $(activeTab).fadeIn();
    return false;
  });
})(jQuery);
