/* LifterLMS */
/* -------------------------------------------------- */

/* Access Plan */
.llms-access-plan-title,
.llms-access-plan.featured .llms-access-plan-featured {
    background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.llms-access-plan .llms-access-plan-restrictions .stamp {
    background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
    padding: 2px 7px;
}
.llms-access-plan .llms-access-plan-restrictions ul {
    padding: 0;
}
.llms-access-plan .llms-access-plan-restrictions a {
    color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.llms-access-plan .llms-access-plan-restrictions a:hover {
    color: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?>;
}
.llms-lesson-preview .llms-lesson-link {
    padding:38px;
}
.llms-lesson-preview .llms-lesson-title {
    line-height: 1.3em;
}
.llms-syllabus-wrapper .llms-section-title {
    margin-bottom:50px;
}
.llms-loop-item-footer {
    padding:5px;
}
.llms-syllabus-wrapper .llms-section-title {
    margin-top:50px;
}
.llms-lesson-preview {
    display: inline-table;
}
.llms_review {
    padding:40px !important;
}
.llms-lesson-button-wrapper, .llms-button-wrapper {
    margin-top: 40px;
    margin-bottom: 40px;
}
.llms-error a {
    color: #099e6b;
}
.llms-access-plan-restrictions ul li {
    font-size: 14px;
    line-height: 18px;
    list-style-type: none;
}
.course .llms-meta-info .llms-meta-title {
    margin-bottom: 15px;
}
.llms-access-plan-footer .llms-button-action .llms-tooltip {
    min-width: 435px;
}
.course .llms-meta-info {
    margin-top: 35px;
}
.course #old_reviews h3 {
    margin-top: 35px;
    margin-bottom: 35px;
}
.course #thank_you_box h2 {
    font-size: 32px;
    line-height: 38px;
}
.course .post.post-details .entry-content {
    padding-bottom: 80px;
}
.llms-loop-item-content .llms-loop-title {
    padding: 0 15px;
    margin-top: 10px;
    margin-bottom: 10px;
}
.llms-student-dashboard .llms-sd-section {
    margin-bottom: 45px;
}
.llms-my-memberships ul.listing-memberships {
    width: 40%;
    margin: 0px;
    margin-top: 20px;
    padding-left: 0px;
}
.llms-sd-tab dashboard .course-item .course-link {
    margin-bottom: 10px;
}
.llms-student-dashboard .llms-person-information-form h3 {
    margin-top: 25px;
    margin-bottom: 12px;
    font-size: 20px;
    line-height: 28px;
}
.llms-video-wrapper {
    margin-bottom: 30px;
}
.llms-video-wrapper .center-video iframe {
    width: 727px;
    height: 405px;
    max-width: 100%;
}
.llms-my-achievements ul.listing-achievements {
    padding-left: 0px;
}
.course .llms-meta-info {
    margin: -5px 0;
}
.course .llms-meta-info .llms-meta-title {
    margin-top: 30px;
}
.llms-access-plan.featured .llms-access-plan-content,
.llms-access-plan.featured .llms-access-plan-footer {
    border-left: 3px solid <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
    border-right: 3px solid <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.llms-access-plan.featured .llms-access-plan-footer {
    border-bottom-color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.llms-access-plan .llms-access-plan-footer {
    padding-bottom: 30px;
}
.llms-access-plan-footer .llms-button-action,
.llms-checkout .llms-button-action,
.llms-button-primary,
.llms-person-information-form .button,
.llms-student-dashboard button[type*="submit"],
.review_box input.button,
.llms-lesson-button-wrapper input[type="submit"],
.llms-button-action,
#llms-quiz-question-wrapper input[type="submit"] {
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
.llms-access-plan-footer .llms-button-action:focus,
.llms-checkout .llms-button-action:focus,
.llms-button-primary:focus,
.llms-person-information-form .button:focus,
.llms-student-dashboard button[type*="submit"]:focus,
.review_box input.button:focus,
.llms-lesson-button-wrapper input[type="submit"]:focus,
.llms-button-action:focus,
#llms-quiz-question-wrapper input[type="submit"]:focus {
    background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
    border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
    color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
}
.llms-access-plan-footer .llms-button-action:hover,
.llms-checkout .llms-button-action:hover,
.llms-button-primary:hover,
.llms-person-information-form .button:hover,
.llms-student-dashboard button[type*="submit"]:hover,
.review_box input.button:hover,
.llms-lesson-button-wrapper input[type="submit"]:hover,
.llms-button-action:hover,
#llms-quiz-question-wrapper input[type="submit"]:hover {
    background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover']); ?>;
    color: #fff !important;
}
.llms-access-plan-footer .llms-button-action:active,
.llms-checkout .llms-button-action:active,
.llms-button-primary:active,
.llms-person-information-form .button:active,
.llms-student-dashboard button[type*="submit"]:active,
.review_box input.button:active,
.llms-lesson-button-wrapper input[type="submit"]:active,
.llms-button-action:active,
#llms-quiz-question-wrapper input[type="submit"]:active {
    box-shadow: none;
}
.llms-access-plan-price .lifterlms-price {
    color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}

/* LifterLMS Checkout */
.llms-checkout-wrapper .llms-form-heading {
    background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.llms-checkout-section,
.llms-notice {
    border-color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.llms-notice {
    background: transparent;
}
.llms-form-field.type-radio input[type=radio]:checked+label:before {
    background-image: -webkit-radial-gradient(center,ellipse,<?php echo esc_js($the_core_less_variables['theme-color-1']); ?> 0,<?php echo esc_js($the_core_less_variables['theme-color-1']); ?> 40%,#fafafa 45%);
    background-image: radial-gradient(ellipse at center,<?php echo esc_js($the_core_less_variables['theme-color-1']); ?> 0,<?php echo esc_js($the_core_less_variables['theme-color-1']); ?> 40%,#fafafa 45%);
}
.llms-form-field .selectize-input {
    border: 1px solid rgba(0,0,0,0.13);
}
.llms-student-dashboard .llms-sd-link {
    color: <?php echo esc_js($the_core_less_variables['link-color']); ?>;
}
.llms-student-dashboard .llms-sd-link:hover,
.llms-loop-item-content .llms-loop-title:hover {
    color: <?php echo esc_js($the_core_less_variables['link-hover-color']); ?>;
}
.llms-progress .progress-bar-complete {
    background-color:#38d43f;
}
.llms-sd-section .llms-sd-section-title,
.llms-quiz-results h3 {
    background-color: transparent;
}
.llms-person-information-form .button {
    margin-top: 2em;
}
.llms-lesson-preview.is-complete .llms-lesson-complete,
.llms-lesson-preview.is-free .llms-lesson-complete {
    color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.llms-error {
    color: #d8000c;
}
.llms-progress-circle-count {
    position: relative;
    top: 36%;
}
svg .llms-animated-circle {
    stroke: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}