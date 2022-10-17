<header class="l-header">
  <!-- nav menu -->
  <nav id="js-nav-scroll" class="l-nav">
    <h1 class="l-nav__title">
      <a href="<?php echo home_url(); ?>" class="l-nav__title">
        <?php bloginfo('name'); ?>
      </a>
    </h1>
    <?php wp_nav_menu(array(
      'theme_location' => 'main_nav_menu',
      'container' => false,
      'menu_class' => 'l-menu is-res-menu',
      'add_li_class' => 'l-menu__item',
      'add_a_class' => 'l-menu__link is-link-jump',
      'item-wrap' => '<ul>%3$s</ul>'

    )) ?>
    <div id="is-toggle-sp-menu" class="l-menu__trigger">
      <span class="l-line js-bar-animate is-line-change"></span>
      <span class="l-line js-bar-animate is-line-change"></span>
      <span class="l-line js-bar-animate is-line-change"></span>
    </div>
  </nav>
</header>