jQuery(window).load(function ($) {
    "use strict";

    var $ = jQuery,
        screenRes = $(window).width(),
        is_safari = navigator.userAgent.indexOf("Safari") != -1 && navigator.userAgent.indexOf('Chrome') == -1 &&  navigator.userAgent.indexOf('Android') == -1,
        exceptionsElements =
            'a[href*="mailto:"], '+
            'a[href*="callto:"], '+
            'a[href*="tel:"], '+
            '.w3eden .inddl, '+
            '.wpdm-download-link';

    // Page Transition
    function pageTransition() {
        var pageTransitionDiv = $('.fw-page-transition'),
            pageTransitionIn = pageTransitionDiv.data('page-transition-in'),
            pageTransitionOut = pageTransitionDiv.data('page-transition-out'),
            pageTransitionDurationIn = pageTransitionDiv.data('page-transition-duration-in'),
            pageTransitionDurationOut = pageTransitionDiv.data('page-transition-duration-out'),
            pageTransitionSpinner = $('body').find('.fw-page-transition-spinner');

        // Transition In
        if (!pageTransitionDiv.hasClass(pageTransitionIn)) {
            pageTransitionSpinner.fadeOut();

            pageTransitionDiv.css({
                'animation-duration' : pageTransitionDurationIn / 1e3 + "s"
            }).addClass(pageTransitionIn);

            setTimeout(function(){
                pageTransitionDiv.removeClass(pageTransitionIn).addClass('pageTransitionEnd');
            }, pageTransitionDurationIn);
        }


        // Transition Out
        // Disable transition out if click on excerpt element from array exceptionsElements[]
        var flags = false;
        $(exceptionsElements).on('click', function(){
            flags = true;
        });

        // Window before unload
        $(window).on('beforeunload',function(){
            if (flags) {
                flags = false;
                return;
            }
            if (!pageTransitionDiv.hasClass(pageTransitionIn) && !is_safari) {
                pageTransitionDiv.css({'animation-duration' : pageTransitionDurationOut / 1e3 + "s"});
                pageTransitionDiv.removeClass('pageTransitionEnd').addClass(pageTransitionOut);
                pageTransitionDiv.css('animation-duration', pageTransitionDurationOut);
                pageTransitionSpinner.fadeIn();
            }
        });
    }
    if(screenRes > 1199) {
        pageTransition();
    }
    $(window).resize(function(){
        var screenRes = $(window).width();
        if(screenRes > 1199) {
            pageTransition();
        }
    });
});

