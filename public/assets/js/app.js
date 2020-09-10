var affixScroll;
$(document).ready(function(){

    $('.header__content__right .nav-group svg').on('click', function(){
        $('.header__second-row').toggleClass('active');
        $('.header-overlay').toggleClass('active');
    })

    $('.header-overlay').on('click', function(){
        $('.header__second-row').toggleClass('active');
        $('.header-overlay').toggleClass('active');
    })

    $('.adv-disc__button').on('click', function(){
        $('.adv-disc__container').toggleClass('adv-disc__container--hidden')
    })

    $('.adv-disc__close').on('click', function(){
        $('.adv-disc__container').addClass('adv-disc__container--hidden')
    })
    $('.chart-wysiwyg__html figure').on('mouseenter', function(){
        $(this).find('.image-overlay').removeClass('image-overlay--hidden');
        $(this).find('.zoom-icon').removeClass('zoom-icon--hidden');
    })

    $('.chart-wysiwyg__html figure').on('mouseleave', function(){
        $(this).find('.image-overlay').addClass('image-overlay--hidden');
        $(this).find('.zoom-icon').addClass('zoom-icon--hidden');
    })

    $('.chart-wysiwyg__html figure').on('click', function(){
        var src = $(this).find('.fugure-img').attr('src');
        $('.image-zoom-modal-overlay__content__image').attr('src', src);
        $('.image-zoom-modal-overlay').removeClass('image-zoom-modal-overlay--hidden');

    })

    $('.image-zoom-modal-overlay__content__close, .image-zoom-modal-overlay').on('click', function(e){
        e.stopPropagation();
        $('.image-zoom-modal-overlay').addClass('image-zoom-modal-overlay--hidden');
    })

    $('.chart__show-more__text').on('click', function(){
        var isExpanded = $(this).attr('data-expanded');
        if(isExpanded == 'closed') {
            // console.log(isExpanded)
            $(this).text('Show less');
            $('.chart-product-text').removeClass('hidden')
            $(this).attr('data-expanded', 'open');
            // console.log('if')
        } else {
            // console.log('else')
            // console.log(isExpanded)
            $(this).text('Show more');
            $('.chart-product-text').each(function(index, item){
                // console.log(index, item);
                if(index >= 9 ) {
                    $(this).addClass('hidden');
                }
            })
            $(this).attr('data-expanded', 'closed');
            // $('chart-product-text').removeClass('hidden')
        }
    })

    // RATING
    var totalRating = 0;
    var selectRating = 0;
    var usability = 0;
    var satisfaction = 0;
    var money = 0;
    var quality = 0;


    $('.write-review__title').on('click', function(){
        $('.write-review__first-step').addClass('write-review__first-step--hidden');
        $('.progress-bar__fill').css('width', '0');
    })

    $('.rating__left-side, .rating__right-side').on('mouseenter', function(e) {
        var rating = $(this).attr('data-value');
        totalRating = rating;
        $(this).parents('.rating__container').attr('data-rating', totalRating);
    })

    $('.write-review__main-header .rating__left-side, .write-review__main-header .rating__right-side').on('click', function(e) {
        selectRating = $(this).attr('data-value');
        $(this).parents('.rating__container').attr('data-rating', selectRating);
        $('.write-review__sub-category .rating__container').attr('data-rating', selectRating)
        usability = selectRating;
        satisfaction = selectRating;
        money = selectRating;
        quality = selectRating;
        $('.write-review__first-step').removeClass('write-review__first-step--hidden')
        $('.progress-bar__fill').css('width', '25%')
    });

    $('.usability .rating__left-side, .usability .rating__right-side').on('click', function(e) {
        usability = $(this).attr('data-value');
        $(this).parents('.rating__container').attr('data-rating', usability);
        selectRating = getTotalRating(usability, satisfaction,  money, quality);
        $('.write-review__main-header .rating__container').attr('data-rating', selectRating);
    });

    $('.satisfaction .rating__left-side, .satisfaction .rating__right-side').on('click', function(e) {
        satisfaction = $(this).attr('data-value');
        $(this).parents('.rating__container').attr('data-rating', satisfaction);
        selectRating = getTotalRating(usability, satisfaction,  money, quality);
        $('.write-review__main-header .rating__container').attr('data-rating', selectRating);
    });

    $('.money .rating__left-side, .money .rating__right-side').on('click', function(e) {
        money = $(this).attr('data-value');
        $(this).parents('.rating__container').attr('data-rating', money);
        selectRating = getTotalRating(usability, satisfaction,  money, quality);
        $('.write-review__main-header .rating__container').attr('data-rating', selectRating);
    });

    $('.quality .rating__left-side, .quality .rating__right-side').on('click', function(e) {
        quality = $(this).attr('data-value');
        $(this).parents('.rating__container').attr('data-rating', quality);
        selectRating = getTotalRating(usability, satisfaction,  money, quality);
        $('.write-review__main-header .rating__container').attr('data-rating', selectRating);
    });


    $('.write-review__main-header .rating__container').on('mouseleave', function(e) {
        if(selectRating == 0) {
            $(this).attr('data-rating', '0');
        } else {
            $(this).attr('data-rating', selectRating);
        }
    })

    $('.usability').on('mouseleave', function(e) {
        if(usability == 0) {
            $(this).attr('data-rating', selectRating);
        } else {
            $(this).attr('data-rating', usability);
        }
    })

    $('.satisfaction').on('mouseleave', function(e) {
        if(satisfaction == 0) {
            $(this).attr('data-rating', selectRating);
        } else {
            $(this).attr('data-rating', satisfaction);
        }
    })

    $('.money').on('mouseleave', function(e) {
        if(money == 0) {
            $(this).attr('data-rating', selectRating);
        } else {
            $(this).attr('data-rating', money);
        }
    })

    $('.quality').on('mouseleave', function(e) {
        if(quality == 0) {
            $(this).attr('data-rating', selectRating);
        } else {
            $(this).attr('data-rating', quality);
        }
    })

    $('.write-review__main-header .write-review__title').on('click', function(){
        $('.write-review__first-step').removeClass('write-review__first-step--hidden');
        if(selectRating) {
            $('.progress-bar__fill').css('width', '25%');
        }
    })

    $('#cancel-rating').on('click', function(){
        $('.write-review__first-step').addClass('write-review__first-step--hidden');
    })

    // step 2
    $('#go-to-step-2').on('click', function(){
        $('.write-review__first-step').addClass('write-review__first-step--hidden');
        $('.write-review__second-step').removeClass('write-review__second-step--hidden');
        $('.write-review__second-step .progress-bar__fill').css('width', '50%');
        $('.write-review__main-header').addClass('write-review__main-header--no-clicks');
    })

    $('#ni-user-review--content').on('input', function(e) {
        $('.write-review__word-count').html(e.target.value.length + '/ 30 characters');
        if(e.target.value.length < 30) {
            $(this).removeClass('success').addClass('warning')
            $('#go-to-step-3').attr('disabled', 'disabled')
        } else {
            $(this).removeClass('warning').addClass('success')
            $('#go-to-step-3').removeAttr('disabled');
        }
    })

    $('#back-to-step-1').on('click', function() {
        $('.write-review__second-step').addClass('write-review__second-step--hidden');
        $('.write-review__first-step').removeClass('write-review__first-step--hidden');
        $('.write-review__first-step .progress-bar__fill').css('width', '25%');
        $('.write-review__main-header').removeClass('write-review__main-header--no-clicks');
    })

    //step 3
    $('#go-to-step-3').on('click', function(){
        $('.write-review__third-step .write-review__overall-rank .rating__container').attr('data-rating', selectRating);
        $('.write-review__third-step .write-review__paragraph--user-review').text($('#ni-user-review--content').val());
        $('.write-review__second-step').addClass('write-review__second-step--hidden');
        $('.write-review__third-step').removeClass('write-review__third-step--hidden');
        $('.write-review__third-step .progress-bar__fill').css('width', '75%');

    })

    $('#back-to-step-2').on('click', function(){
        $('.write-review__third-step').addClass('write-review__third-step--hidden');
        $('.write-review__second-step').removeClass('write-review__second-step--hidden');
    })

    $('#go-to-step-4').on('click', function(){

        selectRating = getTotalRating(usability, satisfaction,  money, quality);

        //проверка на бота
        if($('#check').val() == '') {
            var formData = new FormData();
            formData.append('hosting-id', $('#hosting-id').val());
            formData.append('user-review', $('#ni-user-review--content').val());
            formData.append('email', $('#review-email').val());
            formData.append('user-name', $('#review-name').val());
            formData.append('position', $('#review-position').val());
            formData.append('usability', usability);
            formData.append('satisfaction', satisfaction);
            formData.append('money', money);
            formData.append('quality', quality);
            formData.append('totalRating', selectRating);
            console.log(formData);

            $.ajax({
                type: "POST",
                async: false,
                processData: false,
                contentType: false,
                url: "/send-comment",
                data: formData,
                dataType: "html",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log(data);
                    $('.write-review__third-step').addClass('write-review__third-step--hidden');
                    $('.write-review__thank-you').removeClass('write-review__thank-you--hidden');
                }
            });
        }
    })

    var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    $('#review-email').on('input', function (e) {
        if(reg.test(e.target.value)) {
            $(this).removeClass('warning')
            if($('#review-name').val().length > 1 && $('#review-position').val().length > 1) {
                $('#go-to-step-4').removeAttr('disabled');
            }
        } else {
            $(this).addClass('warning')
            $('#go-to-step-4').attr('disabled', 'disabled')
        }
    })

    $('#review-name').on('input', function (e) {
        if(e.target.value.length > 1) {
            $(this).removeClass('warning')
            if(reg.test($('#review-email').val()) && $('#review-position').val().length > 1) {
                $('#go-to-step-4').removeAttr('disabled');
            }
        } else {
            $(this).addClass('warning')
            $('#go-to-step-4').attr('disabled', 'disabled')
        }
    })

    $('#review-position').on('input', function (e) {
        if(e.target.value.length > 1) {
            $(this).removeClass('warning')
            if(reg.test($('#review-email').val()) && $('#review-name').val().length > 1) {
                $('#go-to-step-4').removeAttr('disabled');
            }
        } else {
            $(this).addClass('warning')
            $('#go-to-step-4').attr('disabled', 'disabled')
        }
    })

    // $('.toc__items-container').overlayScrollbars({
    //     className       : "os-theme-dark",
    //     // resize          : "both",
    //     resize          : false,
    //     sizeAutoCapable : true,
    //     paddingAbsolute : true,
    //     scrollbars : {
    //         clickScrolling : true
    //     }
    // });

    // console.log(affixScroll, 'ads')
    var offsetToc;
    if(document.querySelector('.toc')) {
        offsetToc = $('.toc').offset().top;
    }

    // console.log(offsetToc);
    if(document.querySelector('.toc')) {
        $(window).scroll(function() {
            var scrollLength = $(this).scrollTop();
            handleScroll(offsetToc, scrollLength);
        });
    }

    var smooth = $('.smooth');
    smooth.on('click', function(e){
      e.preventDefault();
      var target = $(this).attr('href');
      $('body,html').animate({
        scrollTop: ($(target).offset().top)
      }, 1000);
    });

    $('.nav-tab__item').on('click', function(e){
        e.preventDefault();
        $('.nav-tab__item').removeClass('active');
        $(this).addClass('active')
        var panel = $(this).attr('href');
        $('.tab-panel').removeClass('active');
        $(panel).addClass('active');
    })

    $('#show-more-comment').on('click', function () {
        $('.visitors-reviews__card').removeClass('hidden');
        $('.visitors-reviews__show-more').remove();
    })

    $('.visitor-review-agg__count').on('click', function () {
        $('body,html').animate({
            scrollTop: ($('.visitors-reviews').offset().top)
        }, 1000);
    })

})



function getTotalRating(usability, satisfaction,  money, quality) {
    usability = parseFloat(usability);
    satisfaction = parseFloat(satisfaction);
    money = parseFloat(money);
    quality = parseFloat(quality);
    var totalRating = (usability + satisfaction + money + quality)/4;
    // console.log(totalRating);
    if(totalRating < 5 && totalRating > 4.5) {
        totalRating = 4.5;
    }
    else if(totalRating < 4.5 && totalRating > 4) {
        totalRating = 4;
    }
    else if(totalRating < 4 && totalRating > 3.5) {
        totalRating = 3.5;
    }
    else if(totalRating < 3.5 && totalRating > 3) {
        totalRating = 3;
    }
    else if(totalRating < 3 && totalRating > 2.5) {
        totalRating = 2.5;
    }
    else if(totalRating < 2.5 && totalRating > 2) {
        totalRating = 2;
    }
    else if(totalRating < 2 && totalRating > 1.5) {
        totalRating = 1.5;
    }
    else if(totalRating < 1.5 && totalRating > 1) {
        totalRating = 1;
    }
    else if(totalRating < 1 && totalRating > 0) {
        totalRating = 0.5;
    }
    return totalRating;
}

var $window = $(window);
var $links = $('.smooth');
var $sections = getSections($links);
var $root = $('html, body');
var $hashLinks = $('a[href^="#"]:not([href="#"])');

function handleScroll(offsetToc, scrollLength) {
    var endScrollLenght = parseInt($('.html-content').offset().top) + parseInt($('.html-content').outerHeight());
    // console.log(endScrollLenght, 'end');
    // console.log(scrollLength, 'scrollLength')
    if(scrollLength >= offsetToc && scrollLength < endScrollLenght) {
        $('.toc').addClass('toc--sticky');
        activateLink($sections, $links);
        $('.toc').removeAttr('style');
    }

    else if(scrollLength < offsetToc) {
        $('.toc').removeClass('toc--sticky');
        $('.toc').removeAttr('style');
    }

    else if(scrollLength >= endScrollLenght) {
        $('.toc').removeClass('toc--sticky');
        $('.toc').css('margin-top', $('.html-content').outerHeight() +'px');
    }
}

function getSections($links) {
    return $(
      $links
        .map((i, el) => $(el).attr('href'))
        .toArray()
        .filter(href => href.charAt(0) === '#')
        .join(','),
    );
  }

  function activateLink($sections, $links) {
    var yPosition = $window.scrollTop();

    for (var i = $sections.length - 1; i >= 0; i -= 1) {
      var $section = $sections.eq(i);

      if (yPosition >= ($section.offset().top - 100)) {
        return $links
          .removeClass('active')
          .filter(`[href="#${$section.attr('id')}"]`)
          .addClass('active');
      }
    }
  }
