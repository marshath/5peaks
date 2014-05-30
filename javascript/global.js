jQuery(function ($) {
  $(document).ready(function () {
    $('nav#mobile-nav').meanmenu();
    $('.sf-menu').superfish();
    $('.rtw_main').addClass('ellipsis');
  });
  $(window).load(function() {
    $('.sponsors').flexslider({
      animation: "slide",
      animationLoop: true,
      itemWidth: 210,
      itemMargin: 5,
      minItems: 2,
      maxItems: 6
    });
    $('.flexslider').flexslider({ controlNav: false });
    $('.submenu-children li a').prepend('<i class="icon-angle-right"></i>');
    $("#main-content table").addClass("table table-striped");
  });
})(jQuery);
