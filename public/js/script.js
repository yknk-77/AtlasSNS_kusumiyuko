// ヘッダーの動き
jQuery($(function () {
  //クリックで動く
  $('.nav-open').click(function () { //クリックした時に
    $('.nav-open').toggleClass('active'); //.nav-openクラスにactiveクラスを付与する
    $('.nav-accordion').slideToggle(); //.nav-accordionをアコーディオンメニューで表示する
  });
}));

// 投稿編集モーダル
// 要素を取得しそれぞれ変数に格納
const modal = $("#js-modal");
const overlay = $("#js-overlay");
const open = $("#js-open");
const close = $("#js-close");

// モーダルopen
open.on('click', function () { //編集ボタンをクリックしたら
  modal.addClass("open"); // modalクラスにopenクラス付与
  overlay.addClass("open"); // overlayクラスにopenクラス付与
});

// モーダルclose
close.on('click', function () { //×ボタンをクリックしたら
  modal.removeClass("open"); // modalクラスからopenクラスを外す
  overlay.removeClass("open"); // overlayクラスからopenクラスを外す
});

// プロフィール編集モーダル
