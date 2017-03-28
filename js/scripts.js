$(window).load(function () {

    "use strict";

    // Remove loader

    $('#progress-bar').width('100%');
    $('#loader').hide();

});

$(document).ready(function () {

    "use strict";

    // Loader bar

    var count = 1;

    $('img').load(function () {

        $('#progress-bar').css('width', count * 170);
        count = count + 1;
    });

    $('#loader').css('padding-top', $(window).height() / 2);

    // Smooth Scroll to internal links

    $('.smooth-scroll').smoothScroll({
        speed: 800,
        offset: -68
    });

    // Initialize Sliders

    $('#home-slider').flexslider({
        directionNav: false
    });

    $('.testimonials-slider').flexslider({
        directionNav: false,
        animation: "slide",
        slideshow: false
    });

    $('#client-slider').flexslider({
        directionNav: false,
        controlNav: false,
        maxItems: 4,
        minItems: 1,
        move: 1,
        animation: "slide",
        itemWidth: 250,
        slideshowSpeed: 7000
    });

    $('#about-detail-slider').flexslider({
        directionNav: false,
        manualControls: "#about-toggle li",
        animation: "slide",
        smoothHeight: true,
        slideshow: false,
        animationSpeed: 400,
        touch: false
    });

    $('.project-slider').flexslider({
        directionNav: false
    });

    // Mobile Menu

    $('#mobile-toggle').click(function () {
        if ($('#navigation').hasClass('open-nav')) {
            $('#navigation').removeClass('open-nav');
        } else {
            $('#navigation').addClass('open-nav');
        }
    });

    $('#menu li a').click(function () {
        if ($('#navigation').hasClass('open-nav')) {
            $('#navigation').removeClass('open-nav');
        }
    });

    // Adjust slide height for smaller screens

    $('#home-slider .slides li').css('height', $(window).height());



    // Append HTML <img>'s as CSS Background for slides
    // also center the content of the slide

    $('#home-slider .slides li').each(function () {

        var imgSrc = $(this).children('.slider-bg').attr('src');
        $(this).css('background', 'url("' + imgSrc + '")');
        $(this).children('.slider-bg').remove();

        var slideHeight = $(this).height();
        var contentHeight = $(this).children('.slide-content').height();
        var padTop = (slideHeight / 3) - (contentHeight / 2);

        $(this).children('.slide-content').css('padding-top', padTop);

    });

    // Turn dynamic animations for iOS devices (because it doesn't look right)

    var iOS = false,
        p = navigator.platform;

    if (p === 'iPad' || p === 'iPhone' || p === 'iPod') {
        iOS = true;
    }

    // Sticky Nav

    $(window).scroll(function () {

        if ($(window).scrollTop() > 100) {
            $('#navigation').addClass('sticky-nav');
        } else {
            $('#navigation').removeClass('sticky-nav');
        }

        // Parallax

        if (iOS === false) {

            var scrollAmount = $(window).scrollTop() / 5;
            scrollAmount = Math.round(scrollAmount);
            $('.has-parallax').css('backgroundPosition', '50% ' + scrollAmount + 'px');

        }
    });

    // Append .divider <img> tags as CSS backgrounds

    $('.divider').each(function () {
        var imgSrc = $(this).children('.divider-bg').attr('src');
        $(this).css('background', 'url("' + imgSrc + '")');
        $(this).children('.divider-bg').remove();
    });

    
    // About slide clicks

    $('#about-toggle li').click(function () {
        $('#about-toggle li').removeClass('active');
        $(this).addClass('active');
    });

    // Team Hovers

    $('.team-member').hover(function () {
        $('.team-member').addClass('team-focus');
        $(this).removeClass('team-focus');
    }, function () {

        $('.team-member').removeClass('team-focus');
    });


    // Portfolios

    $('.filters li').click(function () {

        $('.filters li').removeClass('active');
        $(this).addClass('active');

        var category = $(this).attr('data-category');
        $('.project').removeClass('hide-project');

        if (category !== 'all') {
            $('.project').each(function () {

                if (!$(this).hasClass(category)) {
                    $(this).addClass('hide-project');
                }

            });
        }

    });

    // Project Clicks with AJAX call

    $('.project').click(function (event) {
        event.preventDefault();

        if ($('.ajax-container').hasClass('open-container')) {
            $('.ajax-container').addClass('closed-container');
            $('.ajax-container').removeClass('open-container');
        }

        var fileID = $(this).attr('data-project-file');

        if (fileID != null) {
            $('html,body').animate({
                scrollTop: $('.ajax-container').offset().top - 70
            }, 500);

        }

        $.ajax({
            url: fileID
        }).success(function (data) {
            $('.ajax-container').addClass('open-container');
            $('.ajax-container').html(data);
            $('.project-slider').flexslider({
                directionNav: false
            });
            $('.ajax-container').removeClass('closed-container');

            $('.close-project').click(function () {
                $('.ajax-container').addClass('closed-container');
                $('.ajax-container').removeClass('open-container');
                $('html,body').animate({
                    scrollTop: $('.projects-container').offset().top - 70
                }, 500);
                setTimeout(function () {
                    $('.ajax-container').html('');
                }, 1000);
            });
        });

    });

    // Contact Form Code

    $('#form-button').click(function () {

        var name = $('#form-name').val();
        var email = $('#form-email').val();
        var message = $('#form-msg').val();
        var error = 0;

        if (name === '' || email === '' || message === '') {
            error = 1;
            $('#details-error').fadeIn(200);
        } else {
            $('#details-error').fadeOut(200);
        }

        if (!(/(.+)@(.+){2,}\.(.+){2,}/.test(email))) {
            $('#details-error').fadeIn(200);
            error = 1;
        }

        var dataString = 'name=' + name + '&email=' + email + '&text=' + message;

        if (error === 0) {
            $.ajax({
                type: "POST",
                url: "mail.php",
                data: dataString,
                success: function () {
                    $('#details-error').fadeOut(1000);
                    $('#form-sent').fadeIn(1000);
                }
            });
            return false;
        }

    });

    // Reset form contents

    $('.reset-btn').click(function () {
        $('#form-name').val('');
        $('#form-email').val('');
        $('#form-msg').val('');
    });




});