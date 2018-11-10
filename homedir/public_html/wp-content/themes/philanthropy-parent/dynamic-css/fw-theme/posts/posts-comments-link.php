/* Posts Comments Link */
/* -------------------------------------------------- */

.comments-link {
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  position: relative;
  display: inline-block;
  font-size: 17px;
  font-weight: 400;
  color: #fff !important;
  text-align: center;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
/* Type 1 */
.comments-link.fw-comment-link-type-1 {
  min-width: 44px;
  height: 40px;
  line-height: 40px;
  padding: 0 10px;
}
.comments-link.fw-comment-link-type-1:before {
  content: '+';
  position: absolute;
  left: 0;
  top: 0;
  min-width: 44px;
  height: 40px;
  line-height: 40px;
  font-size: 20px;
  opacity: 0;
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.comments-link.fw-comment-link-type-1:after {
  content: '';
  width: 0;
  height: 0;
  border-right: 10px solid transparent;
  position: absolute;
  left: 14px;
  bottom: -8px;
  border-top: 8px solid <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.comments-link.fw-comment-link-type-1:hover {
  color: #fff;
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.comments-link.fw-comment-link-type-1:hover:before {
  opacity: 1;
}
.comments-link.fw-comment-link-type-1:hover:after {
  border-top-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
/* Type 2 */
.comments-link.fw-comment-link-type-2 {
  border-radius: 5px;
  min-width: 41px;
  height: 41px;
  line-height: 41px;
  padding: 0 10px;
}
.comments-link.fw-comment-link-type-2:before {
  border-radius: 5px;
  content: '+';
  position: absolute;
  left: 0;
  top: 0;
  min-width: 41px;
  height: 41px;
  line-height: 41px;
  font-size: 16px;
  opacity: 0;
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.comments-link.fw-comment-link-type-2:after {
  content: '';
  width: 0;
  height: 0;
  border-right: 4px solid transparent;
  border-left: 4px solid transparent;
  position: absolute;
  left: 17px;
  bottom: -4px;
  border-top: 4px solid <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.comments-link.fw-comment-link-type-2:hover {
  color: #fff;
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.comments-link.fw-comment-link-type-2:hover:before {
  opacity: 1;
}
.comments-link.fw-comment-link-type-2:hover:after {
  border-top-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
/* Type 3 */
.comments-link.fw-comment-link-type-3 {
  border-radius: 50%;
  min-width: 41px;
  height: 40px;
  line-height: 40px;
  padding: 0 10px;
}
.comments-link.fw-comment-link-type-3:before {
  border-radius: 50%;
  content: '+';
  position: absolute;
  left: 0;
  top: 0;
  min-width: 41px;
  height: 40px;
  line-height: 40px;
  font-size: 16px;
  opacity: 0;
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.comments-link.fw-comment-link-type-3:after {
  content: '';
  width: 0;
  height: 0;
  border-right: 6px solid transparent;
  border-left: 6px solid transparent;
  position: absolute;
  left: 15px;
  bottom: -5px;
  border-top: 6px solid <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.comments-link.fw-comment-link-type-3:hover {
  color: #fff;
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.comments-link.fw-comment-link-type-3:hover:before {
  opacity: 1;
}
.comments-link.fw-comment-link-type-3:hover:after {
  border-top-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
/* Type 4 */
.comments-link.fw-comment-link-type-4 {
  min-width: 36px;
  height: 36px;
  line-height: 36px;
  background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  -webkit-transform: rotate(51deg) skewY(-13deg);
  -moz-transform: rotate(51deg) skewY(-13deg);
  -ms-transform: rotate(51deg) skewY(-13deg);
  -o-transform: rotate(51deg) skewY(-13deg);
  transform: rotate(51deg) skewY(-13deg);
  -webkit-transition: background 0.3s ease;
  -o-transition: background 0.3s ease;
  transition: background 0.3s ease;
}
.comments-link.fw-comment-link-type-4 span {
  width: 100%;
  height: 100%;
  display: block;
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
}
.comments-link.fw-comment-link-type-4:before {
  content: '+';
  position: absolute;
  left: 13px;
  top: -1px;
  opacity: 0;
  z-index: 1;
  -webkit-transform: rotate(-44deg);
  -moz-transform: rotate(-44deg);
  -ms-transform: rotate(-44deg);
  -o-transform: rotate(-44deg);
  transform: rotate(-44deg);
}
.comments-link.fw-comment-link-type-4:after {
  content: '';
  position: absolute;
  right: 0;
  top: 0;
  left: 0;
  bottom: 0;
  opacity: 0;
}
.comments-link.fw-comment-link-type-4:hover {
  -webkit-transition: background 0.3s ease;
  -o-transition: background 0.3s ease;
  transition: background 0.3s ease;
}
.comments-link.fw-comment-link-type-4:hover:before {
  opacity: 1;
  color: #fff;
}
.comments-link.fw-comment-link-type-4:hover:after {
  opacity: 1;
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  -webkit-transition: background 0.3s ease;
  -o-transition: background 0.3s ease;
  transition: background 0.3s ease;
}
/* Type 5 */
.comments-link.fw-comment-link-type-5 {
  width: 54px;
  height: 47px;
  line-height: 47px;
  background: transparent;
  -webkit-transform: rotate(2deg);
  -moz-transform: rotate(2deg);
  -ms-transform: rotate(2deg);
  -o-transform: rotate(2deg);
  transform: rotate(2deg);
}
.comments-link.fw-comment-link-type-5::before {
  content: '';
  display: block;
  position: absolute;
  height: 33px;
  right: 0;
  top: 3px;
  border-bottom: 1px solid transparent;
  border-top: 4px solid transparent;
  -webkit-transform: rotate(-25deg);
  -moz-transform: rotate(-25deg);
  -ms-transform: rotate(-25deg);
  -o-transform: rotate(-25deg);
  transform: rotate(-25deg);
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
  border-right: 38px solid <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.comments-link.fw-comment-link-type-5::after {
  content: '';
  position: absolute;
  display: block;
  height: 21px;
  left: 7px;
  top: 17px;
  border-bottom: 1px solid transparent;
  border-top: 3px solid transparent;
  z-index: 1;
  -webkit-transform: rotate(240deg);
  -moz-transform: rotate(240deg);
  -ms-transform: rotate(240deg);
  -o-transform: rotate(240deg);
  transform: rotate(240deg);
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
  border-right: 28px solid <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.comments-link.fw-comment-link-type-5 span {
  position: relative;
  z-index: 3;
  display: block;
  height: 100%;
  margin: -3px 0 0 11px;
  color: #fff;
}
.comments-link.fw-comment-link-type-5 span:before {
  content: '';
  width: 0;
  height: 0;
  border-right: 10px solid transparent;
  position: absolute;
  left: 23px;
  bottom: 2px;
  border-bottom: 10px solid <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  -webkit-transform: rotate(72deg);
  -moz-transform: rotate(72deg);
  -ms-transform: rotate(72deg);
  -o-transform: rotate(72deg);
  transform: rotate(72deg);
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.comments-link.fw-comment-link-type-5 span:after {
  content: '+';
  position: absolute;
  font-size: 20px;
  opacity: 0;
  left: 0;
  right: 0;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.comments-link.fw-comment-link-type-5:hover {
  -webkit-transition: background 0.3s ease;
  -o-transition: background 0.3s ease;
  transition: background 0.3s ease;
}
.comments-link.fw-comment-link-type-5:hover:after {
  border-right-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.comments-link.fw-comment-link-type-5:hover:before {
  border-right-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.comments-link.fw-comment-link-type-5:hover span {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.comments-link.fw-comment-link-type-5:hover span:after {
  opacity: 1;
  color: #fff;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.comments-link.fw-comment-link-type-5:hover span:before {
  border-bottom-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
/* Type 6 */
.comments-link.fw-comment-link-type-6 {
  font-size: <?php echo esc_js($the_core_less_variables['fw-blog-meta-font-size']); ?>;
  font-family: <?php echo ($the_core_less_variables['fw-blog-meta-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-blog-meta-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-blog-meta-font-weight']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-blog-meta-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-blog-meta-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-blog-meta-color']); ?> !important;
  text-transform: <?php echo esc_js($the_core_less_variables['fw-blog-meta-lettercase']); ?>;
  background-color: transparent;
}
.comments-link.fw-comment-link-type-6:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-blog-meta-color-hover']); ?> !important;
}
.comments-link.fw-comment-link-type-6 >* {
  display: inline-block;
}
.comments-link.fw-comment-link-type-6 .divide-comments {
  margin: 0 2px;
}