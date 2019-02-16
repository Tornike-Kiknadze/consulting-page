(() => {
  $(".navigation__link").click(function () {
    $(".navigation__checkbox").prop("checked", false);
    const container = $(this).attr("attr");
    $("html,body").animate(
      { scrollTop: $("." + container).offset().top },
      "slow"
    );
  });

  $("#learn-more").click(function () {
    const container = $(this).attr("attr");
    $("html,body").animate(
      { scrollTop: $("." + container).offset().top + 170 },
      "slow"
    );
  });

  $(".btni").click(function () {
    $(".input, .area").val("");
  });
})();


var navItem = $(".navigation__item")
var navBtn = $('.navigation__button')
var navigationList = $(".navigation__list")

navBtn.on("click", toogleNavList);
navItem.on("click", toogleNavList)
function toogleNavList() {
  navigationList.toggleClass('events-none');
}



