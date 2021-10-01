<?php wp_body_open(); ?>
<header class="l-header">
  <div class="l-header__inner">
    <p class="l-header__left">
      <a class="l-header__item--logo" href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a>
    </p>
    <nav class="l-header__mid u-dp-pc">
      <?php
      $args = array (
        'menu' => 'global-navigation',
        'menu_class' => 'l-header__list',
        'container' => false,
        'depth'         => 1,
        'fallback_cb'   => false,
        'add_li_class'  => 'l-header__item--menu',
      );
      wp_nav_menu($args);
      ?>
    </nav>
    <div class="l-header__right drawer">
      <input type="checkbox" id="drawer-toggle" class="drawer__trigger">
      <label for="drawer-toggle" class="drawer__button">
        <span class="drawer__icon">&nbsp;</span>
      </label>
      <label for="drawer-toggle" class="drawer__background" ></label>

      <nav class="l-header__spMenu">
        <div id="accordion" class="l-header__inner--spMenu c-box--second accordion">
          <div class="js-accordion-title l-header__box">
            <a href="/" class="l-header__heading--spMenu">
              <h4>MENU</h4>
              <span>メニュー</span>
            </a>
            <div class="accordion__button">
              <button>
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
            <?php
            $args = array (
              'menu' => 'global-navigation',
              'menu_class' => 'l-header__list l-header__list--spMenu',
              'container' => false,
              'depth'         => 1,
              'fallback_cb'   => false,
              'add_li_class'  => 'l-header__item--spMenu',
            );
            wp_nav_menu($args);
            ?>
          <div class="js-accordion-title l-header__box">
            <a href="/" class="l-header__heading--spMenu">
              <h4 class="accordion__title">CATEGORY</h4>
              <span>カテゴリー</span>
            </a>
            <div class="accordion__button">
              <button>
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
            <ul class="l-header__list l-header__list--spMenu">
              <?php
              $cats = get_categories();
              foreach($cats as $cat) {
                echo '<li class="l-header__item--spMenu"><a href="' . get_category_link($cat->term_id) . '">' . $cat->name. '</a></li>';
              }
            ?>
            </ul>
        </div>
      </nav>
    </div>
  </div><!-- l-header__inner -->
</header>

<!-- <div id="js-loader" class="loader"></div> -->
