/* Posts Related Article Type 2 */
/* -------------------------------------------------- */

.fw-related-article-type-2 .fw-related-article-image.fw-block-image-parent .fw-block-image-overlay .fw-related-article-text-wrap {
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['theme-color-1'], 0.85);  ?>;
  -webkit-backface-visibility: hidden; /* Chrome, Safari, Opera */
  backface-visibility: hidden;
}
.fw-related-article-type-2 .fw-related-article-image.fw-block-image-parent .fw-block-image-overlay .fw-related-article-text-wrap .fw-overlay-title {
  color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['theme-color-1'], 45); ?>;
}
.fw-related-article-type-2 .fw-related-article-image.fw-block-image-parent .fw-block-image-overlay .fw-related-article-text-wrap .fw-overlay-title span {
  color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['theme-color-1'], 45); ?> !important;
}
.fw-related-article-type-2 .fw-related-article-image.fw-block-image-parent .fw-block-image-overlay .fw-related-article-text-wrap .fw-related-article-details {
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
}
.fw-related-article-type-2  .fw-related-article-image.fw-overlay-2 {
  overflow: visible;
}
.fw-related-article-type-2 .fw-related-article-text-wrap {
  position: absolute;
  height: 125px;
  bottom: -62.5px;
  left: 25px;
  right: 25px;
  text-align: center;
  z-index: 10;
}
.fw-related-article-type-2 .fw-related-article-text-wrap:before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 37px;
  height: 1px;
  background-color: #fff;
  margin-left: -18.5px;
}
.fw-related-article-type-2 .fw-related-article-image.fw-block-image-parent .fw-block-image-overlay .fw-overlay-title {
  position: absolute;
  top: 23px;
  right: 21px;
  bottom: auto;
  left: 21px;
  background-color: transparent;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  padding: 0;
  font-size: 16px;
  line-height: 17px;
}
.fw-related-article-type-2 .fw-related-article-text-wrap .fw-related-article-details {
  position: absolute;
  right: 21px;
  bottom: 24px;
  left: 21px;
  color: #fff;
  text-transform: uppercase;
  font-size: 12px;
  line-height: 13px;
  letter-spacing: 2px;
  display: inline-block;
}