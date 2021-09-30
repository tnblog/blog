<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <?php get_header(); ?>
</head>

<body <?php body_class(); ?>>

  <?php get_template_part('includes/header'); ?>

  <main>

      <section class="l-section introduction">
        <div class="introduction__inner">
        <?php get_template_part('includes/breadcrumb'); ?>
          <h1 class="heading--page">
            BLOG
            <!-- <span>ブログ</span> -->
          </h1>
          <p class="introduction__txt">
            あれどうやるんだっけ？ってときの引き出し。
          </p>
        </div>
      </section>

      <div class="c-box--second ArticlesFilters">
            <form method="get" action="<?php bloginfo('url'); ?>">
              <div class="ArticlesFilters__inner">
                <div class="ArticlesFilters__box">
                  <?php wp_dropdown_categories('show_option_none=カテゴリを全て選択'); ?>
                </div>
                <div class="ArticlesFilters__box">
                  <?php $tags = get_tags(); if ( $tags ) : ?>
                  <select name="tag">
                    <option value="" class="selected">タグを全て選択</option>
                    <?php foreach ( $tags as $tag ): ?>
                    <option value="<?php echo esc_html( $tag->slug);  ?>"><?php echo esc_html( $tag->name ); ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php endif; ?>
                </div>
                <div class="ArticlesFilters__box--second">
                  <input class="ArticlesFilters__search" name="s" id="s" type="text" placeholder="検索ワード">
                  <input class="ArticlesFilters__searchIcon sumbit fa" id="submit" type="submit" value="&#xf0b0;">
                  <!-- <input id="reset" type="reset" value="リセット"> -->
                </div>
              </div>
            </form>
          </div>

        <div class="l-content">
          <div class="l-content__inner">
            <section class="l-section archive">
              <h2 class="heading--section">
                Articles
              </h2>
              <div class="archive__inner">
                <ul class="archive__list">

                  <?php if (have_posts()) : ?>
                  <?php while (have_posts()) : the_post(); ?>
                  <?php get_template_part('includes/loop', 'article'); ?>
                  <?php endwhile; ?>

                  <?php else: ?>
                  <p class="archive__message">該当する記事が見つかりませんでした。</p>
                  <?php endif; ?>
                </ul>
              </div>
              <?php the_posts_pagination(
                array(
                    'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
                    'prev_next' => true,
                    'prev_text' => '<i class="fas fa-chevron-left"></i>',
                    'next_text' => '<i class="fas fa-chevron-right"></i>',
                    'type'          => 'list', // 戻り値の指定 (plain/list)
                )
              );
              ?>
            </section>
          </div><!-- l-content__inner -->
        </div><!-- l-content -->
  </main>


  <?php get_template_part('includes/footer'); ?>
  <?php get_footer(); ?>
</body>

</html>
