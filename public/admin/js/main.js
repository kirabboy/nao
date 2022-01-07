$(document).ready(function () {

    $( window ).scroll(function() {
        var height = $('header.header').outerHeight();
        if(window.scrollY > height) {
            $('#masthead').addClass('fixed-top');
        } else {
            $('#masthead').removeClass('fixed-top');
        }
    });

    $('#masthead .navbar-toggler').click(function (e) { 
        e.preventDefault();
        $('body').addClass('sidebar-open');
    });

    $(document).on('click', '.mobile-navbar__nav .btn-dropdown', function(){
        var expanded = $(this).attr('aria-expanded');
        if(expanded == 'true'){
            $(this).find('.fas').removeClass('fa-chevron-down');
            $(this).find('.fas').addClass('fa-chevron-up');
        } else {
            $(this).find('.fas').removeClass('fa-chevron-up');
            $(this).find('.fas').addClass('fa-chevron-down');
        }
    })

    

    $('.mobile-navbar__close').click(function (e) { 
        e.preventDefault();
        $('body').removeClass('sidebar-open');
    });


    $('.owl-product').owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        nav: true,
        items: 4,
        autoplayTimeout: 4000,
        dots: false,
        slideSpeed : 1000,
        responsive: {
            0:{items: 2},480:{items: 2},768:{items: 3},1024:{items: 4}
        },
        navText: [ "<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    });
    // Tin tuc
    $('.our_feature').owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        nav: true,
        items: 4,
        autoplayTimeout: 4000,
        dots: false,
        slideSpeed : 1000,
        responsive: {
            0:{items: 1},480:{items: 2},768:{items: 3},1024:{items: 4}
        },
        navText: [ "<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    });
    // Certificate
    $('.owl-certificate').owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        nav: true,
        items: 4,
        autoplayTimeout: 4000,
        dots: false,
        slideSpeed : 1000,
        responsive: {
            0:{items: 1},480:{items: 2},768:{items: 3},1024:{items: 4}
        },
        navText: [ "<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    });
    // Feedback
    $('.owl-testimonial').owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        nav: false,
        items: 3,
        autoplayTimeout: 6000,
        dots: true,
        slideSpeed : 1000,
        responsive: {
            0:{items: 1},520:{items: 2},768:{items: 3},1024:{items: 3}
        },
        navText: [ "<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    });  

    // /rel:'.th_clb',
    $('.th_clb').colorbox({maxWidth:'95%', maxHeight:'95%', transition:"fade"});

    $(document).on('click', '.desc-readmore', function(){
        $('.product-long-description .tab-content .tab-inner').removeClass('height-limit');
        $('.product-long-description .tab-content .desc_btn-expand').addClass('d-none');
    })

});