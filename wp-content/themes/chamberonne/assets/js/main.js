jQuery(document).ready(function($){

  //mobile menu start
  $('.hamburger').on('click', function(e){
    $('.m-panel').addClass('open');
    $('html, body').addClass('no-scroll');
    $('.shadow').addClass('show');
  });

  $('.m-panel .close').on('click', function(e){
    $('.m-panel').removeClass('open');
    $('html, body').removeClass('no-scroll');
    $('.shadow').removeClass('show');
  });

  $('.cart-tabs a').on('click', function (e) {
    e.preventDefault();
    $('.cart-tabs a').removeClass('active');
    $(this).addClass('active');
    $(this)
    .closest('.block-tabs')
    .find('.cart-tabs__item--active')
    .removeClass('cart-tabs__item--active')
    .hide();
    $($(this.hash)).fadeIn(300, function () {
      $(this).addClass('cart-tabs__item--active');
    });
  });

  $('.js-action-btn').on('click', function (e) {
    e.preventDefault();
    $('.js-action-btn').removeClass('active');
    $(this).addClass('active');

    var type = $(this).data('type');
    if (type === 'all') {
      $('.js-item-post').fadeIn(300, function () {
        $(this).show();
      });
    }
    else {
      $('.js-item-post').hide();
      $('.js-item-post').each(function () {
        let currentType = $(this).data('type');
        if (currentType === type) {
          $(this).fadeIn(300, function () {
            $(this).show();
          });
        }
      })
    }
  });


});