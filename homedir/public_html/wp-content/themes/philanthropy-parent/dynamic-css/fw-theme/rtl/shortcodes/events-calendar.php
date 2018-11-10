/* Calendar RTL */
/* -------------------------------------------------- */
.rtl .cal-month-day span[data-cal-date] {
  float: right!important;
  margin-left: 0;
  margin-right: 20px;
}
.rtl .cal-month-day .text-today {
  left: 20px;
  right: initial;
}
.rtl .list-events {
  left: initial;
  right: 6px;
}
.rtl .list-unstyled {
  padding-right: 0;
}
.rtl #cal-day-box .cal-row-head [class*="cal-cell"]:first-child,
.rtl #cal-day-box .cal-row-head [class*="cal-cell"] {
  float: right;
}
.rtl #cal-day-box #cal-day-panel {
  padding-left: 0;
  padding-right: 60px;
}
.rtl #cal-day-box #cal-day-panel .pull-left {
  float: right !important;
}
.rtl #cal-day-box #cal-day-panel-hour {
  margin-right: -60px;
}
.rtl .details-event-button {
  float: left;
  margin-left: 7px;
  margin-right: 0;
}
.rtl #cal-slide-content a.event-item:before {
  display: none;
}
.rtl #cal-slide-content a.event-item:after {
  font-family: 'FontAwesome';
  content: "\f133";
  font-size: 14px;
  margin-left: 5px;
}
.rtl .calendar-navigation {
  direction: <?php echo esc_js($the_core_less_variables['ltr-direction']); ?>;
}
