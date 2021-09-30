<?php wp_body_open(); ?>
<header class="header">
  <div class="header__wrap">
    <div class="header__inner">
      <a class="header__logo" href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a>
      <nav class="header__menu u-dp-pc">


      <?php
      $args = array (
        'menu' => 'global-navigation',
        'menu_class' => 'header__list',
        'container' => false,
        'depth'         => 1,
        'fallback_cb'   => false,
        'add_li_class'  => 'header__item',
      );
      wp_nav_menu($args);
      ?>
      </nav>
      <div class="drawer">
        <input type="checkbox" id="drawer-toggle" class="drawer__trigger">
        <label for="drawer-toggle" class="drawer__btn">
          <span class="drawer__icon">&nbsp;</span>
        </label>
        <label class="drawer__background" for="drawer-toggle"></label>
        <nav class="drawer__menu">

          <!-- <form action="/" method="get" class="form">
            <input type="text" class="form__input" name="s" value="Search" placeholder="検索">
          </form> -->

          <div id="accordion" class="accordion">
            <div class="accordion__wrap">
              <div class="js-accordion-title accordion__box fadeIn">
                <a href="/" class="accordion__link">
                  <h4 class="accordion__title">MENU</h4>
                  <span>メニュー</span>
                </a>
                <div class="accordion__button">
                  <button>
                    <span></span>
                    <span></span>
                  </button>
                </div>
              </div>
              <div class="accordion__content">
                <?php
                $args = array (
                  'menu' => 'global-navigation',
                  'menu_class' => 'drawer__list',
                  'container' => false,
                  'depth'         => 1,
                  'fallback_cb'   => false,
                  'add_li_class'  => 'drawer__item',
                );
                wp_nav_menu($args);
                ?>
              </div>
              <div class="js-accordion-title accordion__box fadeIn">
                <a href="/" class="accordion__link">
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
              <div class="accordion__content">
                <ul class="drawer__list">
                <?php
                  $cats = get_categories();
                  foreach($cats as $cat) {
                    echo '<li class="drawer__item"><a href="' . get_category_link($cat->term_id) . '">' . $cat->name. '</a></li>';
                  }
                ?>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div><!-- l-drawer -->
    </div><!-- l-header__inner -->
  </div><!-- l-header -->
</header>

<!-- <div id="js-loader" class="loader"></div> -->
