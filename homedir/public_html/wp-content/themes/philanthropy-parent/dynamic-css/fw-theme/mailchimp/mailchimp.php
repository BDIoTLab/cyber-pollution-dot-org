/* MailChimp */
/* -------------------------------------------------- */
.mc4wp-form .selectize-input {
    border: 1px solid rgba(0, 0, 0, 0.13);
}
.mc4wp-form input[type="submit"] {
    /* fw-btn */
    font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
    font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
    font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
    font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
    line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?> !important;
    letter-spacing: <?php echo esc_js($the_core_less_variables['fw-buttons-letter-spacing']); ?>;
    color: #fff !important;
    display: inline-block;
    margin-bottom: 0;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    text-decoration: none;
    white-space: nowrap;
    outline: none;
    position: relative;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
    max-width: 100%;
    /* fw-btn-1 */
    background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
    border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
    border-width: <?php echo esc_js($the_core_less_variables['fw-btn-border-width']); ?>;
    border-radius: <?php echo esc_js($the_core_less_variables['fw-btn-radius']); ?>;
    /* fw-btn-md */
    padding: <?php echo esc_js($the_core_less_variables['padding-base-vertical']); ?> <?php echo esc_js($the_core_less_variables['padding-base-horizontal']); ?>;
    font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
    line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?> ;
}
.mc4wp-form input[type="submit"]:focus {
    background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
    border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
    color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
}
.mc4wp-form input[type="submit"]:hover {
    background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover']); ?>;
    color: #fff !important;
}
.mc4wp-form input[type="submit"]:active {
    box-shadow: none;
}