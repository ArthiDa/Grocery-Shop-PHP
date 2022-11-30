$(document).ready(function () {
  $(".list").click(function () {
    const value = $(this).attr("data-filter");
    if (value == "*") {
      $(".item-box").show("1000");
    } else {
      $(".item-box")
        .not("." + value)
        .hide("1000");
      $(".item-box")
        .filter("." + value)
        .show("1000");
    }
  });
});
