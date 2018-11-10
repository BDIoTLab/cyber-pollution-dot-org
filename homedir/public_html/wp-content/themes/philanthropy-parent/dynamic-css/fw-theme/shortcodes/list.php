/* List */
/* -------------------------------------------------- */
.fw-list ul,
.fw-list ol {
  margin: 0;
  padding: 10px 0 0 0;
}
.fw-list li {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  margin: 0 0 10px 0;
  list-style: inside;
  position: relative;
}
.fw-list.list-accent i {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.fw-list li img {
  position: relative;
  /*top: -0.1em;*/
}
.fw-list li ul,
.fw-list li ol {
  margin: 0 0 0 30px;
}
.fw-list.list-numbers li {
  list-style: decimal inside;
}
.fw-list.list-bordered ul,
.fw-list.list-bordered ol {
  margin: 0;
  border-bottom: 1px solid #ccc;
}
.fw-list.list-bordered li {
  border-top: 1px solid #ccc;
  padding-top: 10px;
  padding-left: 10px;
}
.fw-list.list-bordered li ul,
.fw-list.list-bordered li ol {
  margin: 0 0 0 10px;
  border-bottom: none;
}
.fw-list.list-icon li {
  list-style: none;
}
.fw-list.list-icon li i {
  font-size: 14px;
  line-height: inherit;
  vertical-align: bottom;
}
.fw-list.list-icon.list-bordered li {
  position: relative;
}
.fw-list.upload-icon ul li {
  list-style: none;
}
.fw-list.upload-icon li a{
  vertical-align: middle;
}
