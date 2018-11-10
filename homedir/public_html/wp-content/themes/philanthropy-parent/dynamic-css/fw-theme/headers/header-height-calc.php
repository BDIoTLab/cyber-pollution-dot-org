<?php /* Align menu of header type1 on middle based on logo */ ?>
/* If logo is no-retina */
<?php /* For Header 1 & 4 */ ?>
<?php if( floatval($the_core_less_variables['fw-menu-logo-height']) > floatval($the_core_less_variables['fw-menu-item-height']) ) : ?>
  .fw-logo-no-retina.header-1 .fw-header:not(.fw-header-sticky-new-logo) .primary-navigation,
  .fw-logo-no-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .primary-navigation {
    margin-top: <?php echo floatval($the_core_less_variables['fw-menu-logo-height'])/2 - floatval($the_core_less_variables['fw-menu-item-height'])/2; ?>px;
  }
  .fw-logo-no-retina.header-1 .fw-header:not(.fw-header-sticky-new-logo) .fw-search,
  .fw-logo-no-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .fw-search {
    margin-top: <?php echo floatval($the_core_less_variables['fw-menu-logo-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2; ?>px;
  }
  .fw-logo-no-retina.header-1 .fw-header:not(.fw-header-sticky-new-logo) .fw-mini-search,
  .fw-logo-no-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .fw-mini-search {
    margin-top: <?php echo floatval($the_core_less_variables['fw-menu-logo-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2; ?>px;
    top: 0;
  }
  .fw-logo-no-retina.header-1 .fw-header:not(.fw-header-sticky-new-logo) .mmenu-link,
  .fw-logo-no-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .mmenu-link {
    margin-top: <?php echo floatval($the_core_less_variables['fw-menu-logo-height'])/2 - floatval($the_core_less_variables['fw-icon-line-height-mobile-menu'])/2; ?>px;
  }
  .fw-logo-no-retina.header-4 .fw-info-text-header-main .fw-text {
    height: <?php echo esc_js($the_core_less_variables['fw-menu-logo-height']); ?>px;
  }
<?php endif; ?>

<?php /* For Header 5 */ ?>
<?php if( floatval($the_core_less_variables['fw-menu-logo-height']) > floatval($the_core_less_variables['fw-header-5-menu-icon-height']) ) : ?>
  .fw-logo-no-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .primary-navigation {
    margin-top: 0;
  }
  .fw-logo-no-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .fw-nav-wrap {
    margin-top: <?php echo floatval($the_core_less_variables['fw-menu-logo-height'])/2 - floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2; ?>px;
  }
<?php endif; ?>

<?php /* For Header 1 & 4 */ ?>
<?php if( floatval($the_core_less_variables['fw-menu-logo-height']) <= floatval($the_core_less_variables['fw-menu-item-height']) ) : ?>
  .fw-logo-no-retina.header-1 .fw-header:not(.fw-header-sticky-new-logo) .fw-wrap-logo {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['fw-menu-logo-height'])/2); ?>px;
  }
  .fw-logo-no-retina.header-1 .fw-header:not(.fw-header-sticky-new-logo) .fw-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2); ?>px;
  }
  .fw-logo-no-retina.header-1 .fw-header:not(.fw-header-sticky-new-logo) .fw-mini-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2); ?>px;
    top: 0;
  }
  .fw-logo-no-retina.header-1 .fw-header:not(.fw-header-sticky-new-logo) .mmenu-link {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['fw-icon-line-height-mobile-menu'])/2); ?>px;
  }
  .fw-logo-no-retina.header-4 .fw-info-text-header-main .fw-text {
    height: <?php echo esc_js($the_core_less_variables['fw-menu-logo-height']); ?>px;
  }
<?php endif; ?>

<?php /* For Header 5 */ ?>
<?php if( floatval($the_core_less_variables['fw-menu-logo-height']) <= floatval($the_core_less_variables['fw-header-5-menu-icon-height']) ) : ?>
  .fw-logo-no-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .fw-wrap-logo {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2 - floatval($the_core_less_variables['fw-menu-logo-height'])/2); ?>px;
  }
  .fw-logo-no-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .fw-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2); ?>px;
  }
  .fw-logo-no-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .fw-mini-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2); ?>px;
    top: 0;
  }
  .fw-logo-no-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .mmenu-link {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2 - floatval($the_core_less_variables['fw-icon-line-height-mobile-menu'])/2); ?>px;
  }
<?php endif; ?>

<?php /* Calculate Height for Logo Retina */ ?>
<?php $the_core_less_variables['fw-calculate-height-logo-retina'] = (floatval($the_core_less_variables['fw-menu-logo-height'])/2).'px'; ?>
<?php /* If logo is retina, for Header 1 & 4 */ ?>
<?php if( floatval($the_core_less_variables['fw-calculate-height-logo-retina']) > floatval($the_core_less_variables['fw-menu-item-height']) ) : ?>
  .fw-logo-retina.header-1 .fw-header:not(.fw-header-sticky-new-logo) .primary-navigation,
  .fw-logo-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .primary-navigation {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-calculate-height-logo-retina'])/2 - floatval($the_core_less_variables['fw-menu-item-height'])/2); ?>px;
  }
  .fw-logo-retina.header-1 .fw-header:not(.fw-header-sticky-new-logo) .fw-search,
  .fw-logo-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .fw-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-calculate-height-logo-retina'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2); ?>px;
  }
  .fw-logo-retina.header-1 .fw-header:not(.fw-header-sticky-new-logo) .fw-mini-search,
  .fw-logo-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .fw-mini-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-calculate-height-logo-retina'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2); ?>px;
    top: 0;
  }
  .fw-logo-retina.header-1 .fw-header:not(.fw-header-sticky-new-logo) .mmenu-link,
  .fw-logo-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .mmenu-link {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-calculate-height-logo-retina'])/2 - floatval($the_core_less_variables['fw-icon-line-height-mobile-menu'])/2); ?>px;
  }
  .fw-logo-retina.header-4 .fw-info-text-header-main .fw-text {
    height: <?php echo esc_js($the_core_less_variables['fw-calculate-height-logo-retina']); ?>;
  }
<?php endif; ?>

<?php /* For Header 5 */ ?>
<?php if( floatval($the_core_less_variables['fw-calculate-height-logo-retina']) > floatval($the_core_less_variables['fw-header-5-menu-icon-height']) ) : ?>
  .fw-logo-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .primary-navigation {
    margin-top: 0;
  }
  .fw-logo-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .fw-nav-wrap {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-calculate-height-logo-retina'])/2 - floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2); ?>px;
  }
<?php endif; ?>

<?php /* For Header 1 & 4 */ ?>
<?php if( floatval($the_core_less_variables['fw-calculate-height-logo-retina']) <= floatval($the_core_less_variables['fw-menu-item-height']) ) : ?>
  .fw-logo-retina.header-1 .fw-header:not(.fw-header-sticky-new-logo) .fw-wrap-logo {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['fw-calculate-height-logo-retina'])/2); ?>px;
  }
  .fw-logo-retina.header-1 .fw-header:not(.fw-header-sticky-new-logo) .fw-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2); ?>px;
  }
  .fw-logo-retina.header-1 .fw-header:not(.fw-header-sticky-new-logo) .fw-mini-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2); ?>px;
    top: 0;
  }
  .fw-logo-retina.header-1 .fw-header:not(.fw-header-sticky-new-logo) .mmenu-link {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['fw-icon-line-height-mobile-menu'])/2); ?>px;
  }
  .fw-logo-retina.header-4 .fw-info-text-header-main .fw-text {
    height: <?php echo esc_js($the_core_less_variables['fw-calculate-height-logo-retina']); ?>;
  }
<?php endif; ?>

<?php /* For Header 5 */ ?>
<?php if( floatval($the_core_less_variables['fw-calculate-height-logo-retina']) <= floatval($the_core_less_variables['fw-header-5-menu-icon-height']) ) : ?>
  .fw-logo-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .fw-wrap-logo {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2 - floatval($the_core_less_variables['fw-calculate-height-logo-retina'])/2); ?>px;
  }
  .fw-logo-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .fw-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2); ?>px;
  }
  .fw-logo-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .fw-mini-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2); ?>px;
    top: 0;
  }
  .fw-logo-retina.header-5 .fw-header:not(.fw-header-sticky-new-logo) .mmenu-link {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2 - floatval($the_core_less_variables['fw-icon-line-height-mobile-menu'])/2); ?>px;
  }
<?php endif; ?>

/* Text logo */
<?php $the_core_less_variables['logo-text-title-subtitle-height'] = ( floatval($the_core_less_variables['fw-logo-title-line-height']) + floatval($the_core_less_variables['fw-logo-subtitle-line-height']) + 6 ).'px'; ?>
<?php /* For Header 1 */ ?>
/* Logo Title & Subtitle */
<?php if( floatval($the_core_less_variables['logo-text-title-subtitle-height']) > floatval($the_core_less_variables['fw-menu-item-height']) ) : ?>
  <?php /* Logo height > Menu height */ ?>
  .header-1.fw-logo-text .primary-navigation {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['logo-text-title-subtitle-height'])/2 - floatval($the_core_less_variables['fw-menu-item-height'])/2); ?>px;
  }
  .header-1.fw-logo-text .fw-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['logo-text-title-subtitle-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2); ?>px;
  }
  .header-1.fw-logo-text .fw-mini-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['logo-text-title-subtitle-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2); ?>px;
    top: 0;
  }
<?php elseif( floatval($the_core_less_variables['logo-text-title-subtitle-height']) <= floatval($the_core_less_variables['fw-menu-item-height']) ) : ?>
  <?php /* Logo height < Menu height */ ?>
  .header-1.fw-logo-text .primary-navigation {
    margin-top: 0;
  }
  .header-1.fw-logo-text .fw-wrap-logo {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['logo-text-title-subtitle-height'])/2); ?>px;
  }
  .header-1.fw-logo-text .fw-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2); ?>px;
  }
  .header-1.fw-logo-text .fw-mini-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2); ?>px;
    top: 0;
  }
<?php endif; ?>

<?php if( floatval($the_core_less_variables['logo-text-title-subtitle-height']) > floatval($the_core_less_variables['fw-icon-line-height-mobile-menu']) ) : ?>
  <?php /* Logo Height > Menu mobile */ ?>
  @media(max-width:1199px){
    .header-1.fw-logo-text .mmenu-link {
      margin-top: <?php echo esc_js( floatval($the_core_less_variables['logo-text-title-subtitle-height'])/2 - floatval($the_core_less_variables['fw-icon-line-height-mobile-menu'])/2); ?>px;
    }
    .header-1.fw-logo-text .fw-search {
      margin-top: <?php echo esc_js( floatval($the_core_less_variables['logo-text-title-subtitle-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2); ?>px;
    }
    .header-1.fw-logo-text .fw-mini-search {
      margin-top: <?php echo esc_js( floatval($the_core_less_variables['logo-text-title-subtitle-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2); ?>px;
      top: 0;
    }
  }
<?php elseif( floatval($the_core_less_variables['logo-text-title-subtitle-height']) <= floatval($the_core_less_variables['fw-icon-line-height-mobile-menu']) ) : ?>
  <?php /* Logo Height <= Menu mobile */ ?>
  @media(max-width:1199px){
    .header-1.fw-logo-text .mmenu-link {
      margin-top: 0;
    }
    .header-1.fw-logo-text .fw-wrap-logo {
      margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-icon-line-height-mobile-menu'])/2 - floatval($the_core_less_variables['logo-text-title-subtitle-height'])/2); ?>px;
    }
    .header-1.fw-logo-text .fw-search {
      margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-icon-line-height-mobile-menu'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2); ?>px;
    }
    .header-1.fw-logo-text .fw-mini-search {
      margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-icon-line-height-mobile-menu'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2); ?>px;
      top: 0;
    }
  }
<?php endif; ?>

/* Logo Title/ No Subtitle */
<?php if( floatval($the_core_less_variables['fw-logo-title-line-height']) > floatval($the_core_less_variables['fw-menu-item-height']) ) : ?>
  <?php /* Logo height > Menu height */ ?>
  .header-1.fw-logo-text.fw-no-subtitle .primary-navigation {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-logo-title-line-height'])/2 - floatval($the_core_less_variables['fw-menu-item-height'])/2); ?>px;
  }
  .header-1.fw-logo-text.fw-no-subtitle .fw-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-logo-title-line-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2); ?>px;
  }
  .header-1.fw-logo-text.fw-no-subtitle .fw-mini-search {
    margin-top: <?php echo floatval($the_core_less_variables['fw-logo-title-line-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2; ?>px;
    top: 0;
  }
<?php elseif( floatval($the_core_less_variables['fw-logo-title-line-height']) <= floatval($the_core_less_variables['fw-menu-item-height']) ) : ?>
  <?php /* Logo height < Menu height */ ?>
  .header-1.fw-logo-text.fw-no-subtitle .fw-wrap-logo {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['fw-logo-title-line-height'])/2); ?>px;
  }
  .header-1.fw-logo-text.fw-no-subtitle .fw-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2); ?>px;
  }
  .header-1.fw-logo-text.fw-no-subtitle .fw-mini-search {
    margin-top: <?php echo floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2; ?>px;
    top: 0;
  }
<?php endif; ?>

<?php if( floatval($the_core_less_variables['fw-logo-title-line-height']) > floatval($the_core_less_variables['fw-icon-line-height-mobile-menu']) ) : ?>
  <?php /* Logo Height > Menu mobile */ ?>
  @media(max-width:1199px){
    .header-1.fw-logo-text.fw-no-subtitle .fw-wrap-logo {
      margin-top: 0;
    }
    .header-1.fw-logo-text.fw-no-subtitle .mmenu-link {
      margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-logo-title-line-height'])/2 - floatval($the_core_less_variables['fw-icon-line-height-mobile-menu'])/2); ?>px;
    }
    .header-1.fw-logo-text.fw-no-subtitle .fw-search {
      margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-logo-title-line-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2); ?>px;
    }
    .header-1.fw-logo-text.fw-no-subtitle .fw-mini-search {
      margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-logo-title-line-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2); ?>px;
      top: 0;
    }
  }
<?php elseif( floatval($the_core_less_variables['fw-logo-title-line-height']) <= floatval($the_core_less_variables['fw-icon-line-height-mobile-menu']) ) : ?>
  <?php /* Logo Height <= Menu mobile */ ?>
  @media(max-width:1199px){
    .header-1.fw-logo-text.fw-no-subtitle .mmenu-link {
      margin-top: 0;
    }
    .header-1.fw-logo-text.fw-no-subtitle .fw-wrap-logo {
      margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-icon-line-height-mobile-menu'])/2 - floatval($the_core_less_variables['fw-logo-title-line-height'])/2); ?>px;
    }
    .header-1.fw-logo-text.fw-no-subtitle .fw-search {
       margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-icon-line-height-mobile-menu'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2); ?>px;
    }
    .header-1.fw-logo-text.fw-no-subtitle .fw-mini-search {
      margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-icon-line-height-mobile-menu'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2); ?>px;
      top: 0;
    }
  }
<?php endif; ?>

/* Logo Title */
<?php if( floatval($the_core_less_variables['logo-text-title-subtitle-height']) > floatval($the_core_less_variables['fw-header-5-menu-icon-height']) ) : ?>
  <?php /* Header 5, Logo height > Menu height */ ?>
  .header-5.fw-logo-text .fw-nav-wrap {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['logo-text-title-subtitle-height'])/2 - floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2); ?>px;
  }
  .header-5.fw-logo-text .fw-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['logo-text-title-subtitle-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2); ?>px;
  }
  .header-5.fw-logo-text .fw-mini-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['logo-text-title-subtitle-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2); ?>px;
    top: 0;
  }
<?php elseif( floatval($the_core_less_variables['logo-text-title-subtitle-height']) <= floatval($the_core_less_variables['fw-header-5-menu-icon-height']) ) : ?>
  <?php /* Logo height < Menu height */ ?>
  .header-5.fw-logo-text .fw-nav-wrap {
    margin-top: 0;
  }
  .header-5.fw-logo-text .fw-wrap-logo {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2 - floatval($the_core_less_variables['logo-text-title-subtitle-height'])/2); ?>px;
  }
  .header-5.fw-logo-text .fw-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2); ?>px;
  }
  .header-5.fw-logo-text .fw-mini-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2); ?>px;
    top: 0;
  }
<?php endif; ?>

/* Logo Title/ No Subtitle */
<?php if( floatval($the_core_less_variables['fw-logo-title-line-height']) > floatval($the_core_less_variables['fw-header-5-menu-icon-height']) ) : ?>
  <?php /* Logo height > Menu height */ ?>
  .header-5.fw-logo-text.fw-no-subtitle .fw-nav-wrap {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-logo-title-line-height'])/2 - floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2); ?>px;
  }
  .header-5.fw-logo-text.fw-no-subtitle .fw-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-logo-title-line-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2); ?>px;
  }
  .header-5.fw-logo-text.fw-no-subtitle .fw-mini-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-logo-title-line-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2); ?>px;
    top: 0;
  }
<?php elseif( floatval($the_core_less_variables['fw-logo-title-line-height']) <= floatval($the_core_less_variables['fw-header-5-menu-icon-height']) ) : ?>
  <?php /* Logo height < Menu height */ ?>
  .header-5.fw-logo-text.fw-no-subtitle .fw-nav-wrap {
    margin-top: 0;
  }
  .header-5.fw-logo-text.fw-no-subtitle .fw-wrap-logo {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2 - floatval($the_core_less_variables['fw-logo-title-line-height'])/2); ?>px;
  }
  .header-5.fw-logo-text.fw-no-subtitle .fw-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-height'])/2); ?>px;
  }
  .header-5.fw-logo-text.fw-no-subtitle .fw-mini-search {
    margin-top: <?php echo esc_js( floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2 - floatval($the_core_less_variables['fw-header-search-input-icon-font-size'])/2); ?>px;
    top: 0;
  }
<?php endif; ?>
