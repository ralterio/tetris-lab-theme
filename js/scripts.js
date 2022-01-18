(function($){

    $(function() {

        $(".header__hamburger").on('click', function(){
            $(".header__menu").toggleClass('header__menu--open');
            $(".header__hamburger").toggleClass('is-active');
        });

        var btn = $('#button__to__top');

        $(window).scroll(function() {
          if ($(window).scrollTop() > 300) {
            btn.addClass('show');
          } else {
            btn.removeClass('show');
          }
        });

        btn.on('click', function(e) {
          e.preventDefault();
          $('html, body').animate({scrollTop:0}, '300');
        });

		// $('.menu-item-has-children').on('click', function(e){
		$('.menu-item-has-children').hover( function(e){
			$(this).find(".sub-menu").toggle();
		});

		$(window).scroll(function(){ $(".sub-menu").hide();
        if ($(window).width() < 1400 && $(".header__menu").hasClass('header__menu--open')) {
            $(".header__menu").toggleClass('header__menu--open');
            $(".header__hamburger").toggleClass('is-active');
        }
        });

    });

})(jQuery);
