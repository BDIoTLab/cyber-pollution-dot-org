/* Countdown */
/* -------------------------------------------------- */
.fw-countdown .fw-countdown-child {
	display: inline-block;
	vertical-align: middle;
	margin: 0 3px;
}
.fw-countdown .fw-countdown-child span {
	font-family: <?php echo ($the_core_less_variables['font-family-base']); ?>;
	font-size: <?php echo esc_js($the_core_less_variables['font-size-base']); ?>;
	line-height: <?php echo esc_js($the_core_less_variables['line-height-base']); ?>;
	font-weight: <?php echo esc_js($the_core_less_variables['font-weight-base']); ?>;
	font-style: <?php echo esc_js($the_core_less_variables['font-style-base']); ?>;
	letter-spacing: <?php echo esc_js($the_core_less_variables['font-letter-spacing-base']); ?>;
	color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}
.fw-countdown.fw-countdown-style-1 .fw-countdown-child {
	padding: 3px 9px;
	min-height: 25px;
	min-width: 35px;
	background-color: #000;
	border-radius: 3px;
	color: #fff;
}
.fw-countdown.fw-countdown-style-1 .fw-countdown-child:first-child {
	margin-left: 0;
}
.fw-countdown.fw-countdown-style-1 .fw-countdown-child:last-child {
	margin-right: 0;
}
.fw-countdown.fw-countdown-style-1 .fw-countdown-child span {
	display: block;
	width: 100%;
	text-align: center;
}
.fw-countdown.fw-countdown-style-2 .fw-countdown-child span {
	font-size: 12px;
}
.fw-countdown.fw-countdown-style-2 .fw-countdown-child span[class$='-nr'] {
	display: inline-block;
	padding: 0 5px;
	font-size: 19px;
}
.fw-countdown.fw-countdown-style-3 .fw-countdown-child {
	margin: 0;
}
.fw-countdown.fw-countdown-style-3 .fw-countdown-child span.days {
	padding-right: 0.1em;
}
/*--- Responsive ---*/
/* Screen 568px */
@media(max-width:767px) {
	.fw-countdown-container .fw-countdown.fw-countdown-style-1 div.fw-countdown-child {
		padding-top: 10px;
		padding-bottom: 10px;
		padding-right: 20px;
		padding-left: 20px;
	}
	.fw-countdown-container .fw-countdown.fw-countdown-style-1 div.fw-countdown-child span.numbers {
		font-size: 20px;
		line-height: 25px;
		letter-spacing: normal;
	}
	.fw-countdown-container .fw-countdown.fw-countdown-style-1 div.fw-countdown-child span.letters {
		font-size: 15px;
		line-height: 25px;
		letter-spacing: normal;
	}
	.fw-countdown-container .fw-countdown.fw-countdown-style-2 div.fw-countdown-child span.numbers {
		font-size: 30px;
		line-height: 35px;
		letter-spacing: normal;
	}
	.fw-countdown-container .fw-countdown.fw-countdown-style-2 div.fw-countdown-child span.letters {
		line-height: 33px;
		font-size: 23px;
		letter-spacing: normal;
	}
	.fw-countdown-container .fw-countdown.fw-countdown-style-3 div.fw-countdown-child span.numbers {
		font-size: 30px;
		line-height: 35px;
		letter-spacing: normal;
	}
}
/* Screen 320px */
@media(max-width:479px) {
	.fw-countdown-container .fw-countdown.fw-countdown-style-1 div.fw-countdown-child {
		padding-top: 5px;
		padding-bottom: 5px;
		padding-right: 10px;
		padding-left: 10px;
	}
	.fw-countdown-container .fw-countdown.fw-countdown-style-1 div.fw-countdown-child span.numbers {
		font-size: 15px;
		line-height: 20px;
	}
	.fw-countdown-container .fw-countdown.fw-countdown-style-1 div.fw-countdown-child span.letters {
		font-size: 10px;
		line-height: 20px;
	}
	.fw-countdown-container .fw-countdown.fw-countdown-style-2 div.fw-countdown-child span.numbers {
		font-size: 25px;
		line-height: 30px;
	}
	.fw-countdown-container .fw-countdown.fw-countdown-style-2 div.fw-countdown-child span.letters {
		line-height: 28px;
		font-size: 18px;
	}
	.fw-countdown-container .fw-countdown.fw-countdown-style-3 div.fw-countdown-child span.numbers {
		font-size: 25px;
		line-height: 30px;
	}
}
