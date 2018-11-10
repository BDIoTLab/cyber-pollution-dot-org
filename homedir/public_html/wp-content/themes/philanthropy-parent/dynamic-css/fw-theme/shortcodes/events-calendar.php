/* Events */
.fw-shortcode-calendar-wrapper.wrapp_calendar {
  padding: 0;
  margin: 0;
}
.fw-shortcode-calendar-wrapper.wrapp_calendar .page-header {
  padding: 0;
  margin: 40px 0 0;
  border: none;
}
.calendar{
  margin: 0 auto;
}
.fw-shortcode-calendar-wrapper .cal-month-day {
  height: 100%;
}
.fw-shortcode-calendar-wrapper .cal-month-day span[data-cal-date] {
  font-weight: normal;
  opacity: 1;
  float: left !important;
  margin-top: 14px;
  margin-left: 20px;
}
.fw-shortcode-calendar-wrapper .cal-month-day.event-day span[data-cal-date] {
  color: #fff !important;
}
.fw-shortcode-calendar-wrapper .cal-month-day:hover {
  cursor: pointer;
}
.fw-shortcode-calendar-wrapper .cal-month-day:hover span[data-cal-date] {
  color: #fff;
}
.fw-shortcode-calendar-wrapper .cal-month-day.cal-day-today {
  color: #fff !important;
}
.fw-shortcode-calendar-wrapper .cal-month-day.cal-day-inmonth.cal-day-today:hover span[data-cal-date],
.fw-shortcode-calendar-wrapper .cal-month-day:hover span[data-cal-date]{
  color: #fff !important;
}
.fw-shortcode-calendar-wrapper .cal-month-day .text-today {
  position: absolute;
  top: 13px;
  right: 20px;
  color: #fff;
  text-transform: uppercase;
}
.fw-shortcode-calendar-wrapper .cal-month-box .cal-day-today span[data-cal-date]{
  color: #fff !important;
}
.fw-shortcode-calendar-wrapper .cal-row-fluid .cal-cell1{
  height: 133px;
}
.fw-shortcode-calendar-wrapper .cal-day-outmonth {
  cursor: default;
  background: #e9eef0;
}
.fw-shortcode-calendar-wrapper .cal-day-outmonth span[data-cal-date] {
  color: #a7b4b9;
  opacity: 1;
}
.fw-shortcode-calendar-wrapper .cal-day-outmonth:hover {
  cursor: default;
}
.fw-shortcode-calendar-wrapper .cal-day-outmonth:hover span[data-cal-date] {
  color: #fff;
}
.fw-shortcode-calendar-wrapper .cal-month-day.cal-day-outmonth.event-day:hover {
  cursor: pointer;
}
.fw-shortcode-calendar-wrapper .cal-month-day.cal-day-outmonth.event-day:hover span[data-cal-date] {
  color: #fff;
}
.fw-shortcode-calendar-wrapper #cal-day-tick{
  display: none !important;
}
.fw-shortcode-calendar-wrapper .cal-event-list .event.pull-left{
  margin-top: 5px;
  display: none;
}
.fw-shortcode-calendar-wrapper .cal-week-box .cal-row-head [class*="cal-cell"].cal-day-today {
  color: #fff;
}
.fw-shortcode-calendar-wrapper .cal-week-box .cal-row-head [class*="cal-cell"].cal-day-today span[data-cal-date] {
  color: #fff;
  opacity: 1;
}
.fw-shortcode-calendar-wrapper .cal-week-box .cal-cell1.day-highlight {
  min-height: 30px;
  height: auto;
  line-height: normal;
  padding: 0.5em 0 0.5em 10px;
}
.fw-shortcode-calendar-wrapper #cal-week-box {
  display: none !important;
}
.fw-shortcode-calendar-wrapper .cal-row-fluid.cal-row-head:hover,
.fw-shortcode-calendar-wrapper .cal-row-fluid.cal-row-head .cal-cell1:hover{
  background: none;
}
.fw-shortcode-calendar-wrapper .cal-row-head [class*="cal-cell"]:first-child,
.fw-shortcode-calendar-wrapper .cal-row-head [class*="cal-cell"]{
  height: auto;
  padding-top: 22px;
  text-transform: uppercase;
}
.fw-shortcode-calendar-wrapper .cal-year-box .row-fluid, .cal-month-box .cal-row-fluid{
  border-bottom: 3px solid #fff;
}
.fw-shortcode-calendar-wrapper .cal-year-box [class*="span"], .cal-month-box [class*="cal-cell"]{
  border-right: 3px solid #fff;
}
.fw-shortcode-calendar-wrapper .cal-month-box, .cal-year-box, .cal-week-box{
  border: none;
  border-radius: 0;
}
.fw-shortcode-calendar-wrapper .cal-month-day {
  background: <?php echo the_core_hex2rgba($the_core_less_variables['theme-color-2'], 0.05); ?>;
  -webkit-transition: background 0.3s;
  -o-transition: background 0.3s;
  transition: background 0.3s;
}
.fw-shortcode-calendar-wrapper .cal-month-day span[data-cal-date] {
  font-size: <?php echo floatval($the_core_less_variables['font-size-base'])*0.9; ?>px;
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}
.fw-shortcode-calendar-wrapper .cal-month-day:hover {
  background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.fw-shortcode-calendar-wrapper .cal-month-day .text-today {
  font-size: <?php echo floatval($the_core_less_variables['font-size-base'])-3; ?>px;
}
.fw-shortcode-calendar-wrapper .cal-day-today span[data-cal-date]{
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.fw-shortcode-calendar-wrapper .cal-month-box .cal-day-today span[data-cal-date]{
  font-size: <?php echo floatval($the_core_less_variables['font-size-base'])*0.9; ?>px;
}
.fw-shortcode-calendar-wrapper .cal-day-outmonth:hover {
  background: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['theme-color-1'], -10); ?>;
}
.fw-shortcode-calendar-wrapper .event-day {
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.fw-shortcode-calendar-wrapper .cal-month-day.cal-day-outmonth.event-day {
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.fw-shortcode-calendar-wrapper .cal-month-day.cal-day-outmonth.event-day:hover {
  background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.fw-shortcode-calendar-wrapper .cal-day-today {
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.fw-shortcode-calendar-wrapper .cal-week-box .cal-row-fluid.cal-row-head .cal-cell1.cal-day-today:hover{
  background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
/* content of events */
.fw-shortcode-calendar-wrapper #cal-slide-content {
  font-family: <?php echo ($the_core_less_variables['font-family-base']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['font-weight-base']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['font-style-base']); ?>;
  box-shadow: none;
  background-image: none;
  background-color: #fff;
  margin-bottom: 3px;
}
.fw-shortcode-calendar-wrapper #cal-slide-content a.event-item {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.fw-shortcode-calendar-wrapper #cal-slide-content a.event-item:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.fw-shortcode-calendar-wrapper .fw-shortcode-calendar .cal-month-box #cal-slide-content:hover{
  background-color: #fff;
}
.fw-shortcode-calendar-wrapper #cal-slide-content li {
  margin-bottom: 5px;
}
.fw-shortcode-calendar-wrapper #cal-slide-content li:last-child {
  margin-bottom: 0;
}
.fw-shortcode-calendar-wrapper #cal-slide-content a.event-item:before {
  font-family: 'FontAwesome';
  content: "\f133";
  font-size: 14px;
  margin-right: 5px;
}
.fw-shortcode-calendar-wrapper #cal-slide-content:hover {
  background-color: #fff;
}
/* Calendar Navigation */
.fw-shortcode-calendar-wrapper .calendar-navigation {
  width: 100%;
  overflow: hidden;
  margin-bottom: 20px;
  padding: 7px 0;
  text-align: center;
  line-height: <?php echo esc_js($the_core_less_variables['font-size-base']); ?>;
}
.fw-shortcode-calendar-wrapper .calendar-navigation h3 {
  display: inline-block;
  margin-top: 0;
  min-width: 270px;
}
.fw-shortcode-calendar-wrapper .calendar-navigation .prev,
.fw-shortcode-calendar-wrapper .calendar-navigation .next {
  font-size: <?php echo esc_js($the_core_less_variables['fw-h4-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h4-font-size']); ?>;
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  display: inline-block;
  text-transform: uppercase;
  font-weight: 400;
  width: 20px;
  text-align: center;
  background: none;
  border: none;
  outline: none;
}
.fw-shortcode-calendar-wrapper .calendar-navigation .prev:hover,
.fw-shortcode-calendar-wrapper .calendar-navigation .next:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.fw-shortcode-calendar-wrapper .calendar-navigation .prev {
  margin-right: 5px;
}
.fw-shortcode-calendar-wrapper .calendar-navigation .next {
  margin-left: 5px;
}
.fw-shortcode-calendar-wrapper .events-list {
  visibility: hidden;
}
.fw-shortcode-calendar-wrapper .list-events {
  position: absolute;
  bottom: 7px;
  left: 19px;
  font-weight: normal;
  font-size: 14px;
  text-transform: lowercase;
}
.fw-shortcode-calendar-wrapper .list-events span {
  font-size: 14px;
}
.fw-shortcode-calendar-wrapper .cal-day-today .list-events {
  color: #fff;
}
/* Details Event Button */
.details-event-button {
  margin-top: 20px;
}
.details-event-button button {
  color: #fff !important;
}
.details-event-button button:hover {
  color: #fff !important;
}
.fw-shortcode-calendar-wrapper .list-events {
  color: rgba(255, 255, 255, 0.7);
}

/* Responsive Events Calendar */
@media(max-width: 767px){
  .fw-shortcode-calendar-wrapper .calendar-navigation .next,
  .fw-shortcode-calendar-wrapper .calendar-navigation .prev {
    line-height: <?php echo esc_js($the_core_less_variables['fw-h6-font-size']); ?>;
  }
}

.fw-shortcode-calendar-wrapper #cal-day-box .cal-day-hour .events-col .dh-event-inverse {
  background: <?php echo the_core_hex2rgba($the_core_less_variables['theme-color-2'], 0.5); ?>;
}
.fw-shortcode-calendar-wrapper #cal-day-box .day-highlight,
.fw-shortcode-calendar-wrapper #cal-day-box .day-highlight:hover {
  background: <?php echo the_core_hex2rgba($the_core_less_variables['theme-color-2'], 0.5); ?>;
}
.fw-shortcode-calendar-wrapper .cal-week-box .cal-row-head {
  background: <?php echo the_core_hex2rgba($the_core_less_variables['theme-color-2'], 0.5); ?> !important;
}
.fw-shortcode-calendar-wrapper .cal-week-box .cal-row-head:hover {
  background: <?php echo the_core_hex2rgba($the_core_less_variables['theme-color-2'], 0.5); ?> !important;
}
.fw-shortcode-calendar-wrapper a.cal-event-week {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.fw-shortcode-calendar-wrapper a.cal-event-week:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
/* Event Single */
.single-fw-event .wrap-map {
  margin-bottom: <?php echo floatval($the_core_less_variables['fw-space-between-elements-sm'])/2; ?>px;
}
.single-fw-event .fw-event-offers {
  text-align: right;
  margin-bottom: <?php echo esc_js($the_core_less_variables['line-height-base']); ?>;
}
.single-fw-event .fw-event-offers .fw-event-tickets-available {
  margin-right: 15px;
}
.single-fw-event .fw-event-offers .fw-event-price {
  margin-right: 10px;
}
.single-fw-event .fw-event-offers a.fw-btn {
  color: #fff !important;
}
.single-fw-event .fw-event-offers a.fw-btn:hover {
  color: #fff !important;
}

/* PopUp Events */
.modal-footer{
  padding: 0 10px;
}
.modal-footer .btn{
  font-size: 35px;
  padding: 0;
}
.modal-dialog{
  position: absolute;
  left: 0;
  right: 0;
  top: 50%;
  margin-top: -290px;
}
.modal-body{
  padding: 45px 20px 0;
}
.modal-dialog .btn{
  position: absolute;
  padding: 0;
  top: 0;
  right: 10px;
  font-size: 30px;
}
.modal-dialog {
  width: 930px;
}
.modal-dialog .modal-body {
  height: 590px !important;
}

/* Responsive Events Calendar */
.fw-col-sm-8 .fw-shortcode-calendar-wrapper .cal-row-fluid .cal-cell1,
.fw-col-sm-6 .fw-shortcode-calendar-wrapper .cal-row-fluid .cal-cell1,
.fw-col-sm-8 .fw-shortcode-calendar-wrapper .cal-year-box [class*="span"],
.fw-col-sm-6 .fw-shortcode-calendar-wrapper .cal-year-box [class*="span"],
.fw-col-sm-8 .fw-shortcode-calendar-wrapper .cal-month-box [class*="cal-cell"],
.fw-col-sm-6 .fw-shortcode-calendar-wrapper .cal-month-box [class*="cal-cell"],
.fw-col-md-8 .fw-shortcode-calendar-wrapper .cal-row-fluid .cal-cell1,
.fw-col-md-6 .fw-shortcode-calendar-wrapper .cal-row-fluid .cal-cell1,
.fw-col-md-8 .fw-shortcode-calendar-wrapper .cal-year-box [class*="span"],
.fw-col-md-6 .fw-shortcode-calendar-wrapper .cal-year-box [class*="span"],
.fw-col-md-8 .fw-shortcode-calendar-wrapper .cal-month-box [class*="cal-cell"],
.fw-col-md-6 .fw-shortcode-calendar-wrapper .cal-month-box [class*="cal-cell"] {
  height: 4em;
  min-height: 4em;
}
.fw-col-sm-8 .fw-shortcode-calendar-wrapper .cal-row-head [class*="cal-cell"]:first-child,
.fw-col-sm-6 .fw-shortcode-calendar-wrapper .cal-row-head [class*="cal-cell"]:first-child,
.fw-col-sm-8 .fw-shortcode-calendar-wrapper .cal-row-head [class*="cal-cell"],
.fw-col-sm-6 .fw-shortcode-calendar-wrapper .cal-row-head [class*="cal-cell"],
.fw-col-md-8 .fw-shortcode-calendar-wrapper .cal-row-head [class*="cal-cell"]:first-child,
.fw-col-md-6 .fw-shortcode-calendar-wrapper .cal-row-head [class*="cal-cell"]:first-child,
.fw-col-md-8 .fw-shortcode-calendar-wrapper .cal-row-head [class*="cal-cell"],
.fw-col-md-6 .fw-shortcode-calendar-wrapper .cal-row-head [class*="cal-cell"] {
  height: 3em;
}
.fw-col-sm-8 .fw-shortcode-calendar-wrapper .cal-month-day .text-today,
.fw-col-sm-6 .fw-shortcode-calendar-wrapper .cal-month-day .text-today,
.fw-col-md-8 .fw-shortcode-calendar-wrapper .cal-month-day .text-today,
.fw-col-md-6 .fw-shortcode-calendar-wrapper .cal-month-day .text-today {
  display: none;
}
@media(max-width: 1199px){
  .modal-dialog{
    margin-top: -300px;
  }
}
@media(max-width: 991px){
  .fw-shortcode-calendar-wrapper.wrapp_calendar{
    margin-bottom: 0;
  }
  .fw-shortcode-calendar-wrapper .cal-month-day span[data-cal-date]{
    margin-top: 12px;
    margin-left: 12px;
  }
  .fw-shortcode-calendar-wrapper .cal-month-day .text-today {
    top: 45px;
    right: 10px;
  }
  .modal-dialog {
    width: 625px;
    margin-top: -360px;
  }
  .modal-dialog .modal-body{
    height: 500px !important;
  }
}

@media(max-width: 767px){
  .fw-shortcode-calendar-wrapper .cal-row-head [class*="cal-cell"]:first-child,
  .fw-shortcode-calendar-wrapper .cal-row-head [class*="cal-cell"]{
    font-size: 80%!important;
    padding-top: 0;
  }
  .fw-shortcode-calendar-wrapper .list-events{
    display: none;
  }
  .fw-shortcode-calendar-wrapper .cal-month-box .cal-day-today span[data-cal-date]{
    font-size: 80%;
  }
  .fw-shortcode-calendar-wrapper .cal-month-day span[data-cal-date]{
    font-size: 80%;
  }
  .fw-shortcode-calendar-wrapper .cal-month-day .text-today {
    display: none;
  }
  .fw-shortcode-calendar-wrapper .cal-row-fluid .cal-cell1,
  .fw-shortcode-calendar-wrapper .cal-year-box [class*="span"],
  .fw-shortcode-calendar-wrapper .cal-month-box [class*="cal-cell"]{
    min-height: 1em;
  }
  .fw-shortcode-calendar-wrapper #cal-day-tick {
    display: none !important;
  }
  .fw-shortcode-calendar-wrapper #cal-slide-content {
    padding: 10px 10px 10px 5px;
  }
  .fw-shortcode-calendar-wrapper #cal-slide-content a.event-item {
    font-size: 80%;
  }
  .fw-shortcode-calendar-wrapper .calendar-navigation h3 {
    font-size: 80%;
    min-width: auto;
  }
}

/* remove hover */
.fw-shortcode-calendar-wrapper .cal-year-box .row-fluid:hover,
.fw-shortcode-calendar-wrapper .cal-row-fluid:hover {
  background-color: transparent !important;
}
.fw-shortcode-calendar-wrapper .cal-day-panel-hour-class .cal-day-hour .time-col b {
  font-weight: normal;
}
.fw-shortcode-calendar-wrapper #cal-day-box .cal-row-head [class*="cal-cell"]:first-child,
.fw-shortcode-calendar-wrapper #cal-day-box .cal-row-head [class*="cal-cell"] {
  height: 50px;
}
.fw-shortcode-calendar-wrapper #cal-day-box .cal-row-head .events-col {
  display: none;
}
.fw-shortcode-calendar-wrapper #cal-day-box .cal-day-panel-class .cal-day-hour {
  margin-bottom: 0;
}
.fw-shortcode-calendar-wrapper #cal-day-box .cal-day-hour {
  margin-bottom: 30px;
}
.fw-shortcode-calendar-wrapper #cal-day-box .cal-day-hour .time-col {
  height: auto!important;
}
.fw-shortcode-calendar-wrapper #cal-day-box .day-highlight {
  position: relative;
  z-index: 10;
  border: none !important;
}
.fw-shortcode-calendar-wrapper #cal-day-box .day-event {
  width: 220px !important;
}
.fw-shortcode-calendar-wrapper #cal-day-box .day-event .cal-hours {
  font-weight: normal;
}
.fw-shortcode-calendar-wrapper #cal-day-box .day-event .event-item {
  display: block;
}
.fw-shortcode-calendar-wrapper .cal-week-box .cal-row-head [class*=cal-cell],
.fw-shortcode-calendar-wrapper .cal-week-box .cal-row-head [class*=cal-cell]:first-child {
  height: 70px;
  padding-top: 6px;
}
.fw-shortcode-calendar-wrapper .cal-week-box hr {
  border: none;
  margin: 0 0 10px;
}
.fw-shortcode-calendar-wrapper a.cal-event-week {
  font-size: 17px;
}
.fw-more-events-content {
  display: none;
}
/* Responsive */
/* Screen 568px */
@media (max-width:767px)  {
  .fw-shortcode-calendar-wrapper .cal-row-fluid .cal-row-head [class*="cal-cell"]:first-child,
  .fw-shortcode-calendar-wrapper .cal-row-fluid .cal-row-head [class*="cal-cell"]{
    height: 41px;
  }
  .fw-shortcode-calendar-wrapper .cal-year-box [class*="span"],
  .fw-shortcode-calendar-wrapper .cal-month-box [class*="cal-cell"]{
    height: 71px;
    min-height: 71px!important;
  }
  .fw-shortcode-calendar-wrapper .cal-week-box span[data-cal-date] {
    margin-right: 0;
  }
  .fw-shortcode-calendar-wrapper .cal-week-box.cal-week-box [data-event-class] {
    height: 27px;
    line-height: 27px;
  }
  .fw-shortcode-calendar a.cal-event-week {
    font-size: 18px!important;
    line-height: normal!important;
  }
  .fw-shortcode-calendar #cal-slide-content a.event-item {
    font-size: 18px!important;
    line-height: normal!important;
  }
  .fw-shortcode-calendar #cal-slide-content a.event-item:before {
    font-size: 18px!important;
  }
}
/* Screen 320px */
@media(max-width:479px){
  .fw-shortcode-calendar-wrapper .calendar-navigation {
    position: relative;
    padding-bottom: 18px;
  }
  .fw-shortcode-calendar-wrapper .calendar-navigation .next,
  .fw-shortcode-calendar-wrapper .calendar-navigation .prev {
    position: absolute;
    bottom: -7px;
  }
  .fw-shortcode-calendar-wrapper .calendar-navigation .next {
    left: 50%;
    margin-right: -10px;
  }
  .fw-shortcode-calendar-wrapper .calendar-navigation .prev {
    right: 50%;
    margin-left: -10px;
  }
  .fw-shortcode-calendar-wrapper .cal-row-head [class*=cal-cell],
  .fw-shortcode-calendar-wrapper .cal-row-head [class*=cal-cell]:first-child {
    height: 40px!important;
  }
  .fw-shortcode-calendar-wrapper .cal-year-box [class*="span"],
  .fw-shortcode-calendar-wrapper .cal-month-box [class*="cal-cell"]{
    height: 41px!important;
    min-height: 41px!important;
  }
  .fw-shortcode-calendar-wrapper .cal-month-day span[data-cal-date] {
    margin-top: 5px;
    margin-left: 5px;
  }
}
