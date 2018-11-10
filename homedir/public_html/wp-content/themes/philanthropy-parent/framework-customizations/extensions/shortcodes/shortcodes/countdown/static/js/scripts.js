jQuery(document).ready(function () {
    jQuery('.fw-countdown').each(function () {
        var _this = jQuery(this),
            countdown = _this.attr('data-countdown'),
            year = _this.attr('data-year'),
            years = _this.attr('data-years'),
            month = _this.attr('data-month'),
            months = _this.attr('data-months'),
            week = _this.attr('data-week'),
            weeks = _this.attr('data-weeks'),
            day = _this.attr('data-day'),
            days = _this.attr('data-days'),
            hour = _this.attr('data-hour'),
            hours = _this.attr('data-hours'),
            minute = _this.attr('data-minute'),
            minutes = _this.attr('data-minutes'),
            second = _this.attr('data-second'),
            seconds = _this.attr('data-seconds');

        _this.countdown(countdown, function (event) {
            if (event.type == 'finish') {
                _this.parent('.fw-countdown-container').find('.fw-countdown-expired').show();
                _this.hide();
                return;
            }
            if (_this.is('.fw-countdown-style-1')) { // Type 1
                if (event.offset.totalDays >= 7) {
                    var $this = $(this).html(event.strftime(''
                    + '<div class="fw-countdown-child"><span class="numbers week-nr">%w </span> <span class="letters week">%!w:' + week + ',' + weeks + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers days-nr">%d</span> <span class="letters days">%!d:' + day + ',' + days + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers hours-nr">%H</span> <span class="letters hours">%!H:' + hour + ',' + hours + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers minutes-nr">%M</span> <span class="letters minutes">%!M:' + minute + ',' + minutes + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers seconds-nr">%S</span> <span class="letters seconds">%!S:' + second + ',' + seconds + ';</span></div>'));
                }
                else if (event.offset.totalDays >= 1) {
                    var $this = $(this).html(event.strftime(''
                    + '<div class="fw-countdown-child"><span class="numbers days-nr">%d</span> <span class="letters days">%!d:' + day + ',' + days + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers hours-nr">%H</span> <span class="letters hours">%!H:' + hour + ',' + hours + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers minutes-nr">%M</span> <span class="letters minutes">%!M:' + minute + ',' + minutes + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers seconds-nr">%S</span> <span class="letters seconds">%!S:' + second + ',' + seconds + ';</span></div>'));
                }
                else {
                    var $this = $(this).html(event.strftime(''
                    + '<div class="fw-countdown-child"><span class="numbers hours-nr">%H</span> <span class="letters hours">%!H:' + hour + ',' + hours + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers minutes-nr">%M</span> <span class="letters minutes">%!M:' + minute + ',' + minutes + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers seconds-nr">%S</span> <span class="letters seconds">%!S:' + second + ',' + seconds + ';</span></div>'));
                }
            } else if (_this.is('.fw-countdown-style-2')) { // Type 2
                if (event.offset.totalDays >= 7) {
                    var $this = $(this).html(event.strftime(''
                    + '<div class="fw-countdown-child"><span class="numbers week-nr">%-w </span> <span class="letters week">%!w:' + week + ',' + weeks + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers days-nr">%-d</span> <span class="letters days">%!d:' + day + ',' + days + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers hours-nr">%-H</span> <span class="letters hours">%!H:' + hour + ',' + hours + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers minutes-nr">%M</span> <span class="letters minutes">%!M:' + minute + ',' + minutes + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers seconds-nr">%S</span> <span class="letters seconds">%!S:' + second + ',' + seconds + ';</span></div>'));
                }
                else if (event.offset.totalDays >= 1) {
                    var $this = $(this).html(event.strftime(''
                    + '<div class="fw-countdown-child"><span class="numbers days-nr">%-d</span> <span class="letters days">%!d:' + day + ',' + days + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers hours-nr">%-H</span> <span class="letters hours">%!H:' + hour + ',' + hours + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers minutes-nr">%M</span> <span class="letters minutes">%!M:' + minute + ',' + minutes + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers seconds-nr">%S</span> <span class="letters seconds">%!S:' + second + ',' + seconds + ';</span></div>'));
                }
                else {
                    var $this = $(this).html(event.strftime(''
                    + '<div class="fw-countdown-child"><span class="numbers hours-nr">%-H</span> <span class="letters hours">%!H:' + hour + ',' + hours + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers minutes-nr">%M</span> <span class="letters minutes">%!M:' + minute + ',' + minutes + ';</span></div>'
                    + '<div class="fw-countdown-child"><span class="numbers seconds-nr">%S</span> <span class="letters seconds">%!S:' + second + ',' + seconds + ';</span></div>'));
                }

            } else { // Type 3
                if (event.offset.totalDays > 0) {
                    var $this = $(this).html(event.strftime('<div class="fw-countdown-child"><span class="numbers">%-D %!D:' + day + ',' + days + '; %-H:%M:%S</span></div>'));
                }
                else {
                    var $this = $(this).html(event.strftime('<div class="fw-countdown-child"><span class="numbers">%-H:%M:%S</span></div>'));
                }
            }
        });
    });
});