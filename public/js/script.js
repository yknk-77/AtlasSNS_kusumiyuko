// ヘッダーの動き
  jQuery($(function() {
    //クリックで動く
    $('.nav-open').click(function () {
      $(this).toggleClass('active');
      $(this).next('nav').slideToggle();
    });
    }));
