jQuery(document).ready(function() {
    "use strict";

    var $ = jQuery,
        externalBookingInput = jQuery('.fw-external-booking-input'),
        lang = FwPhpVars.lang;

    externalBookingInput.each(function(){
        var $thisInput = jQuery(this),
            currentDay = new Date(),
            dayTomorrow = new Date();
            dayTomorrow.setDate(dayTomorrow.getDate() + 1);

        /* Create function splitDate. This function separate the date, month & year and insert in differents block. */
        function splitDate(){
            var valueIntputOnChange = $thisInput.attr('value'),
                externalBookingData = $thisInput.parent().find('.external-booking-data'),
                externalBookingMonth = $thisInput.parent().find('.external-booking-month'),
                externalBookingYear = $thisInput.parent().find('.external-booking-year'),
                arrSplit = valueIntputOnChange.split('/');

            var date = new Date( $thisInput.val() );

            if( $thisInput.val() ) {
                externalBookingData.empty().append(arrSplit[2]);
                var month_text = $.fn.datetimepicker.defaults.i18n[lang].months[date.getMonth()];
                if( month_text != undefined ) {
                    /* get translation of the month */
                    externalBookingMonth.empty().append('/ ' + month_text);
                }
                else {
                    externalBookingMonth.empty().append('/ ' + arrSplit[1]);
                }
                externalBookingYear.empty().append(', ' + arrSplit[0]);
            }
        }

        /* DateTime Picker */
        $thisInput.datetimepicker({
            timepicker: false,
            scrollMonth: false,
            minDate: 0,
            lang: lang,
            format: 'Y/m/d',
            onGenerate: function(){
                splitDate();
            }
        });

        /* Set default date for booking-in and booking-out */
        if($thisInput.hasClass('fw-external-booking-in')) {
            var current_input = $(this);

            current_input.datetimepicker({
                lang: lang,
                format: 'Y/m/d',
                value: currentDay,
                closeOnDateSelect: true,
                onChangeDateTime: function($current_time, $input) {
                    var inDate  = external_booking_date_format($input.val(), 'ymd', '/');
                    inDate = new Date(inDate);
                    var outDate = external_booking_date_format(current_input.parents('.fw-external-booking').find('.fw-external-booking-out').val(), 'ymd', '/');
                    outDate = new Date(outDate);

                    var args = { lang: lang, format: 'Y/m/d', minDate: inDate };
                    if ( inDate > outDate ) {
                        args = { lang: lang, format: 'Y/m/d', minDate: inDate, value: $input.val() };
                    }

                    current_input.parents('.fw-external-booking').find('.fw-external-booking-out').datetimepicker(args);
                }
            });
        }
        else if($thisInput.hasClass('fw-external-booking-out')) {
            $(this).datetimepicker({
                lang: lang,
                format: 'Y/m/d',
                value: dayTomorrow,
                closeOnDateSelect: true,
            });
        }

        $('select.fw-nr-family-members-booking').selectize({
            create: true,
            onDropdownOpen: function(){
                external_booking_position();
            },
            onDropdownClose: function(){
                $('.selectize-dropdown').css('opacity', '0');
            }
        });
    });

    jQuery('.fw-external-booking-form').on('click', '.fw-external-booking-url', function(e){
        var this_form = jQuery(this).parents('.fw-external-booking-form');
        jQuery(this).attr( "href", the_core_change_external_booking_url( this_form ) );
    });
});


function external_booking_date_format(date, format, separator) {
    var date = new Date(date);
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();
    var dateObject = {
        d: day,
        m: month,
        y: year
    };
    var formatArr = format.split("");
    return dateObject[formatArr[0]] + separator + dateObject[formatArr[1]] + separator + dateObject[formatArr[2]];
};

function external_booking_position() {
    /* Append selectize dropdown in body and set this position */
    $('.selectize-control.fw-nr-family-members-booking').each(function(){
        var selectExternalBooking = $(this),
            calcPosition = selectExternalBooking.offset(),
            calcPositionTop = calcPosition.top,
            calcPositionLeft = calcPosition.left,
            selectExternalBookingHeight = selectExternalBooking.height(),
            selectExternalBookingDropdown = selectExternalBooking.find('.selectize-dropdown');

        selectExternalBookingDropdown.appendTo('body');
        selectExternalBooking.click(function(){
            if(selectExternalBookingDropdown.css("display") == "block"){
                selectExternalBookingDropdown.css({
                    top: calcPositionTop + selectExternalBookingHeight,
                    left: calcPositionLeft,
                    opacity: 1
                });

                $(window).on('scroll', function(){
                    selectExternalBookingDropdown.css({
                        top: calcPositionTop + selectExternalBookingHeight,
                        left: calcPositionLeft
                    });
                });
            }
        });
    });
}

function the_core_change_external_booking_url( this_form ) {
    var atts = [],
        booking_in                  = new Date( this_form.find('.fw-external-booking-in').val() ),
        booking_out                 = new Date( this_form.find('.fw-external-booking-out').val()),
        data_url = atts['data_url'] = this_form.find('.fw-external-booking-url').attr('data-url');
        atts['data_source']         = this_form.find('.fw-external-booking-url').attr('data-source');
        atts['rooms']               = this_form.find('.fw-external-booking-rooms').val();
        atts['adults']              = this_form.find('.fw-external-booking-adults').val();
        atts['children']            = this_form.find('.fw-external-booking-children').val(),
        atts['day_in']              = booking_in.getDate(),
        atts['month_in']            = parseInt( booking_in.getMonth() )+ 1,
        atts['year_in']             = parseInt( booking_in.getYear() )+1900,
        atts['day_out']             = booking_out.getDate(),
        atts['month_out']           = parseInt( booking_out.getMonth() )+ 1,
        atts['year_out']            = parseInt( booking_out.getYear() )+1900;

    /* if is not sected the check in date */
    if( isNaN(atts['day_in']) ) {
        return data_url;
    }

    if( atts['data_source'] == 'booking.com' ) {
        //http://www.booking.com/hotel/ua/carparosa.html?checkin_monthday=17&checkin_year_month=2017-3&checkout_monthday=18&checkout_year_month=2017-3&no_rooms=2&group_adults=2&group_children=1
        data_url = atts['data_url']+
        '?checkin_monthday='+atts['day_in']+
        ';checkin_year_month='+atts['year_in']+'-'+atts['month_in']+
        ';checkout_monthday='+atts['day_out']+
        ';checkout_year_month='+atts['year_out']+'-'+atts['month_out'];
        if( atts['adults'] != undefined ) data_url += ';group_adults='+atts['adults'];
        if( atts['children'] != undefined ) data_url += ';group_children='+atts['children'];

        /* for number of rooms */
        if( atts['rooms'] != undefined ) {
            data_url += ';no_rooms='+atts['rooms'];
        }

        /* for children age */
        for (var i = 0; i < parseInt(atts['children']); i++) {
            data_url += ';age=12';
        }
    }
    else if( atts['data_source'] == 'airbnb.com' ) {
        //https://www.airbnb.com/rooms/10506615?checkin=03%2F15%2F2017&checkout=03%2F17%2F2017&guests=3&adults=2&children=1

        // old URL
        /*data_url = atts['data_url']+
        '?checkin='+atts['month_in']+'%2F'+atts['day_in']+'%2F'+atts['year_in']+
        '&checkout='+atts['month_out']+'%2F'+atts['day_out']+'%2F'+atts['year_out'];*/

        if(atts['month_in'] < 10) {
            atts['month_in'] = '0'+atts['month_in'];
        }

        if(atts['month_out'] < 10) {
            atts['month_out'] = '0'+atts['month_out'];
        }

        if(atts['day_in'] < 10) {
            atts['day_in'] = '0'+atts['day_in'];
        }

        if(atts['day_out'] < 10) {
            atts['day_out'] = '0'+atts['day_out'];
        }

        data_url = atts['data_url']+
        '?checkin='+atts['year_in']+'-'+atts['month_in']+'-'+atts['day_in']+
        '&checkout='+atts['year_out']+'-'+atts['month_out']+'-'+atts['day_out'];

        if( atts['adults'] != undefined || atts['children'] != undefined ) {
            var number_of_guests = 0;
            if( atts['adults'] != undefined ) {
                number_of_guests += parseInt(atts['adults'])
                data_url += '&adults='+atts['adults'];
            }
            else {
                /* 1 adult is required */
                data_url += '&adults=1';
            }
            if( atts['children'] != undefined ) {
                number_of_guests += parseInt(atts['children'])
                data_url += '&children='+atts['children'];
            }
            data_url += '&guests='+number_of_guests;
        }
    }
    else if( atts['data_source'] == 'hotels.com' ) {
        //https://www.hotels.com/hotel/details.html?hotel-id=449263&q-check-out=2017-03-22&q-check-in=2017-03-20&q-room-0-children=1&q-room-0-adults=2&q-room-1-adults=2

        if(atts['month_in'] < 10) {
            atts['month_in'] = '0'+atts['month_in'];
        }

        if(atts['month_out'] < 10) {
            atts['month_out'] = '0'+atts['month_out'];
        }

        if(atts['day_in'] < 10) {
            atts['day_in'] = '0'+atts['day_in'];
        }

        if(atts['day_out'] < 10) {
            atts['day_out'] = '0'+atts['day_out'];
        }

        data_url = atts['data_url']+
        '&q-check-in='+atts['year_in']+'-'+atts['month_in']+'-'+atts['day_in']+
        '&q-check-out='+atts['year_out']+'-'+atts['month_out']+'-'+atts['day_out'];
        if( atts['rooms'] != undefined ) data_url += '&q-rooms='+atts['rooms'];
        if( atts['adults'] != undefined ) data_url += '&q-room-0-adults='+atts['adults'];
        if( atts['children'] != undefined ) data_url += '&q-room-0-children='+atts['children'];

        /* for children age */
        for (var i = 0; i < parseInt(atts['children']); i++) {
            data_url += '&q-room-0-child-'+i+'-age=12';
        }
    }
    else if( atts['data_source'] == 'expedia.com' ) {
        //https://www.expedia.com/Bukovel-Hotels-Park-Hotel-Fomich.h7451885.Hotel-Information?chkin=03%2F14%2F2017&chkout=03%2F15%2F2017&adults=2&children=1
        data_url = atts['data_url']+
        '?chkin='+atts['month_in']+'%2F'+atts['day_in']+'%2F'+atts['year_in']+
        '&chkout='+atts['month_out']+'%2F'+atts['day_out']+'%2F'+atts['year_out'];
        if( atts['adults'] != undefined ) data_url += '&adults='+atts['adults'];
        if( atts['children'] != undefined ) data_url += '&children='+atts['children'];

        if( atts['rooms'] != undefined ) {
            /* for number of rooms (rooms-1 - 1 adult is send above) */
            for (var i = 1; i < parseInt(atts['rooms']); i++) {
                data_url += '&adults='+atts['adults'];
            }
        }

        /* for children age */
        for (var i = 0; i < parseInt(atts['children']); i++) {
            data_url += '&childAge=12';
        }
    }
    else if( atts['data_source'] == 'ebookers.com' ) {
        //https://www.ebookers.com/Bukovel-Hotels-Radisson-Blu-Resort-Bukovel.h5270360.Hotel-Information?chkin=14%2F03%2F2017&chkout=15%2F03%2F2017&adults=2&children=1&childAge=2
        data_url = atts['data_url']+
        '?chkin='+atts['day_in']+'%2F'+atts['month_in']+'%2F'+atts['year_in']+
        '&chkout='+atts['day_out']+'%2F'+atts['month_out']+'%2F'+atts['year_out'];
        if( atts['adults'] != undefined ) data_url += '&adults='+atts['adults'];
        if( atts['children'] != undefined ) data_url += '&children='+atts['children'];

        if( atts['rooms'] != undefined ) {
            /* for number of rooms (rooms-1 - 1 adult is send above) */
            for (var i = 1; i < parseInt(atts['rooms']); i++) {
                data_url += '&adults='+atts['adults'];
            }
        }

        /* for children age */
        for (var i = 0; i < parseInt(atts['children']); i++) {
            data_url += '&childAge=12';
        }
    }
    else if( atts['data_source'] == 'hostelworld.com' ) {
        //http://www.hostelworld.com/hosteldetails.php/X-Hostel-Bucharest/Bucharest/56567?dateFrom=2017-03-15&dateTo=2017-03-18&number_of_guests=2
        data_url = atts['data_url']+
        '?dateFrom='+atts['year_in']+'-'+atts['month_in']+'-'+atts['day_in']+
        '&dateTo='+atts['year_out']+'-'+atts['month_out']+'-'+atts['day_out'];
        if( atts['adults'] != undefined || atts['children'] != undefined ) {
            var number_of_guests = 0;
            if( atts['adults'] != undefined ) number_of_guests += parseInt(atts['adults'])
            if( atts['children'] != undefined ) number_of_guests += parseInt(atts['children'])
            data_url += '&number_of_guests='+number_of_guests;
        }
    }

    return data_url;
}

