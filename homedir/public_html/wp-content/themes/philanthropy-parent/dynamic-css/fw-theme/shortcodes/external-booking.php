/* External Booking */
/* -------------------------------------------------- */

.fw-external-booking .fw-external-booking-form-item {
    position: relative;
}
.fw-external-booking .fw-external-booking-form-item label {
    margin: 0;
    display: block;
}
.fw-external-booking .fw-external-booking-form-item:before {
    content: '';
    position: absolute;
    top: 50%;
    right: 2px;
    margin-top: -2px;
    width: 9px;
    height: 9px;
    border-right: 1px solid <?php echo esc_js($the_core_less_variables['form-label-color']); ?>;
    border-bottom: 1px solid <?php echo esc_js($the_core_less_variables['form-label-color']); ?>;
    transform: rotate(45deg);
}
.fw-external-booking .fw-external-booking-separator {
    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
    background-color: #ccc;
    align-self: center;
}

/* Data styling */
.fw-external-booking .fw-external-booking-insert-data {
    position: relative;
    display: block;
    width: 100%;
    height: 58px;
}
.fw-external-booking .fw-external-booking-insert-data > * {
    display: inline-block;
}
.fw-external-booking .fw-external-booking-insert-data .external-booking-month,
.fw-external-booking .fw-external-booking-insert-data .external-booking-year {
    font-family: <?php echo ($the_core_less_variables['font-family-base']); ?>;
    font-size: <?php echo esc_js($the_core_less_variables['font-size-base']); ?>;
    line-height: <?php echo esc_js($the_core_less_variables['line-height-base']); ?>;
    font-weight: <?php echo esc_js($the_core_less_variables['font-weight-base']); ?>;
    font-style: <?php echo esc_js($the_core_less_variables['font-style-base']); ?>;
    letter-spacing: <?php echo esc_js($the_core_less_variables['font-letter-spacing-base']); ?>;
    color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}
.fw-external-booking .fw-external-booking-insert-data .external-booking-year {
    display: none;
    text-indent: -3px;
}
.fw-external-booking .fw-external-booking-insert-data .fw-external-booking-input {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    opacity: 0;
    padding: 0;
}
.fw-external-booking .fw-external-booking-insert-data .fw-external-booking-input:hover {
    cursor: pointer;
}
.fw-external-booking .selectize-control.fw-nr-family-members-booking {
    height: 58px;
}
.selectize-dropdown.fw-nr-family-members-booking {
    opacity: 0;
}
.fw-external-booking .fw-external-booking-insert-data .external-booking-data,
.fw-external-booking .fw-external-booking-form-item .selectize-input > div.item {
    font-family: <?php echo ($the_core_less_variables['input-font-family']); ?>;
    font-size: 58px;
    line-height: 58px;
    font-weight: <?php echo esc_js($the_core_less_variables['input-font-weight']); ?>;
    letter-spacing: <?php echo esc_js($the_core_less_variables['input-letter-spacing']); ?>;
}
.fw-external-booking .fw-external-booking-form-item .selectize-input ,
.fw-external-booking .fw-external-booking-form-item .selectize-control.single .selectize-input.input-active {
    background: none;
    border: none;
    padding: 0;
}
.fw-external-booking .fw-external-booking-form-item .selectize-control.single .selectize-input:after {
    display: none;
}

/* Horizontal */
.fw-external-booking.horizontal .fw-external-booking-form-wrap {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-wrap: wrap;
}
.fw-external-booking.horizontal.fw-external-booking-separator-enable .fw-external-booking-form-item {
    margin: 0 30px;
}
.fw-external-booking.horizontal .fw-external-booking-form-item:first-child {
    margin-left: 0 !important;
}
.fw-external-booking.horizontal .fw-external-booking-form-item {
    margin: 0 15px;
    padding: 5px 0;
}
.fw-external-booking.horizontal .fw-external-booking-form-wrap .fw-external-booking-url,
.fw-external-booking.horizontal .fw-external-booking-form-wrap div[class*="text-"] {
    align-self: center;
}
.fw-external-booking.horizontal .fw-external-booking-form-item .fw-external-booking-insert-data {
    padding-right: 20px;
}
.fw-external-booking.horizontal .fw-external-booking-form-item:nth-child(1),
.fw-external-booking.horizontal .fw-external-booking-form-item:nth-child(2) {
    width: auto;
    min-width: 16.5%;
}
.fw-external-booking.horizontal .fw-external-booking-form-item {
    min-width: 7%;
}
.fw-external-booking.horizontal .fw-external-booking-separator {
    width: 1px;
    right: -30px;
}
.fw-external-booking.horizontal .fw-external-booking-form-item:nth-last-child(2) .fw-external-booking-separator {
    display: none;
}

/* Vertical */
.fw-external-booking.vertical .fw-external-booking-form-item {
    display: inline-block;
    width: 100%;
    margin: 15px 0;
}
.fw-external-booking.vertical.fw-external-booking-separator-enable .fw-external-booking-form-item {
    margin: 30px 0;
}
.fw-external-booking.vertical .fw-external-booking-separator {
    position: relative;
    display: block;
    width: 100%;
    height: 1px;
    margin: 0 auto;
    top: 30px;
}
.fw-external-booking.vertical .fw-external-booking-form-item:first-child {
    margin-top: 0 !important;
}
.fw-external-booking.vertical .fw-external-booking-form-item:last-child {
    margin-bottom: 0;
}
.fw-external-booking.vertical .fw-external-booking-form-item:nth-last-child(2) .fw-external-booking-separator {
    display: none;
}

/*----> Responsive <---- */
/* Screen 1024px */
@media(max-width:1199px){
    .fw-external-booking.horizontal .fw-external-booking-form-item:nth-child(1),
    .fw-external-booking.horizontal .fw-external-booking-form-item:nth-child(2) {
        min-width: 20%;
    }
}
/* Portrait for all phone */
/* Screen 320px */
@media(max-width:479px){
    .fw-external-booking.horizontal .fw-external-booking-form-item:nth-child(1),
    .fw-external-booking.horizontal .fw-external-booking-form-item:nth-child(2) {
        width: 40%;
        margin-right: 10px !important;
        margin-left: 10px !important;
    }
    .fw-external-booking.horizontal .fw-external-booking-separator {
        right: -10px !important;
    }
    .fw-external-booking.horizontal .fw-external-booking-form-item {
        width: 25%;
        margin-right: 10px !important;
        margin-left: 10px !important;
    }
    .fw-external-booking.horizontal .fw-external-booking-form-item:first-child {
        margin-left: 0 !important;
    }
    .fw-external-booking.horizontal .fw-external-booking-insert-data .external-booking-data {
        font-size: 13vw !important;
    }
    .fw-external-booking.horizontal .fw-external-booking-form .external-booking-month {
        font-size: 16px !important;
    }
    .fw-external-booking.horizontal .fw-external-booking-insert-data .external-booking-year {
        display: none !important;
    }
}

