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
          
    $('.slider_wrapper').each(function (index, sliderWrap) {
        var $advantages = $(sliderWrap).find('.advantages_block');
        var $portfolio = $(sliderWrap).find('.portfolio_block');
        var $works = $(sliderWrap).find('.gallery_works_block');
        var $manufacture = $(sliderWrap).find('.gallery_manufacture_block');
        var $materials = $(sliderWrap).find('.materials_block');
        var $testimonials = $(sliderWrap).find('.testimonials_block');
        var $next = $(sliderWrap).find('.slick-m-next');
        var $prev = $(sliderWrap).find('.slick-m-prev');
        var $dots = $(sliderWrap).find('.slide-m-dots');

        $advantages.slick({
            infinite: true,
            autoplay: true,
            dots: false,
            arrows: false,
            cssEase: 'linear',
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                  breakpoint: 550,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
              ]
        });
        
    
        $portfolio.slick({
            infinite: true,
            autoplay: false,
            dots: true,
            arrows: true,
             nextArrow: $next,
             prevArrow: $prev,
             appendDots: $dots,
            cssEase: 'linear',
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                  }
                },
                {
                    breakpoint: 500,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  }
              ]
        });
        
        $works.slick({
            infinite: true,
            autoplay: true,
            dots: true,
            arrows: true,
            nextArrow: $next,
             prevArrow: $prev,
             appendDots: $dots,
            cssEase: 'linear',
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                  }
                },
                {
                    breakpoint: 500,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  }
              ]
        });
        
        $manufacture.slick({
            infinite: true,
            autoplay: true,
            dots: true,
            arrows: true,
            nextArrow: $next,
             prevArrow: $prev,
             appendDots: $dots,
            cssEase: 'linear',
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                  }
                },
                {
                    breakpoint: 500,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  }
              ]
        });
        
        $materials.slick({
            dots: false,
            arrows:false,
            infinite: true,
            autoplay: true,
            cssEase: 'linear',
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                  }
                },
                {
                    breakpoint: 500,
                    settings: {
                      slidesToShow: 2,
                      slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 400,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  }
              ]
        });
        
        $testimonials.slick({
            dots: true,
            arrows: false,
             appendDots: $dots,
            infinite: true,
            autoplay: false,
            cssEase: 'linear',
            slidesToShow: 1,
            slidesToScroll: 1
          });

    });

    // $('.offer_image-slider').slick({
    //     infinite: true,
    //     autoplay: false,
    //     dots: false,
    //     arrows: false,
    //     slidesToShow: 3,
    //     slidesToScroll: 1, 
    // }); 

    
 
});