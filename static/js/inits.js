$(document).ready(function () {
 
    var show = true;
    var countbox = ".advantages_block";
    $(window).on("scroll load resize", function () {
        if (!show) return false; // Отменяем показ анимации, если она уже была выполнена
        var w_top = $(window).scrollTop(); // Количество пикселей на которое была прокручена страница
        var e_top = $(countbox).offset().top; // Расстояние от блока со счетчиками до верха всего документа
        var w_height = $(window).height(); // Высота окна браузера
        var d_height = $(document).height(); // Высота всего документа
        var e_height = $(countbox).outerHeight(); // Полная высота блока со счетчиками
        if (w_top + 500 >= e_top || w_height + w_top == d_height || e_height + e_top < w_height) {
            $('.advantage_digit').css('opacity', '1');
            $('.advantage_digit').spincrement({
                from: 0,
                thousandSeparator: "",
                duration: 6000
            });
             
            show = false;
        }
    });

    $('.portfolio_block').slick({
        infinite: true,
        autoplay: true,
        dots: true,
        arrow: true,
        cssEase: 'linear',
        slidesToShow: 3,
        slidesToScroll: 1
    });
    
    $('.gallery_works_block').slick({
        infinite: true,
        autoplay: true,
        dots: true,
        arrow: true,
        cssEase: 'linear',
        slidesToShow: 3,
        slidesToScroll: 1
    });
    
    $('.gallery_manufacture_block').slick({
        infinite: true,
        autoplay: true,
        dots: true,
        arrow: true,
        cssEase: 'linear',
        slidesToShow: 3,
        slidesToScroll: 1
    });
    
    $('.materials_block').slick({
        dots: false,
        arrow:false,
        infinite: true,
        autoplay: true,
        cssEase: 'linear',
        slidesToShow: 4,
        slidesToScroll: 1
    });
    
    $('.testimonials_block').slick({
        dots: true,
        arrow:false,
        infinite: true,
        autoplay: false,
        cssEase: 'linear',
        slidesToShow: 1,
        slidesToScroll: 1
      });
 
});
testimonials_block