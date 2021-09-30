<!DOCTYPE html>
<html lang="ja">

<head>
  <?php get_header(); ?>
</head>

<body>
  <?php get_template_part('includes/header'); ?>
  <main>
    <div class="l-content">
      <div class="l-content__inner l-content__inner--single">
        <?php
            $eyecatch = get_eyecatch_with_default();
          ?>
        <div class="single__header" style="background-image: url('<?php echo $eyecatch[0]; ?>');">
          <?php get_template_part('includes/breadcrumb'); ?>
          <h2 class="heading--single"><?php the_title(); ?></h2>
          <?php the_tags('<ul class="single__list--tags"><li class="single__item--tags">','</li><li class="single__item--tags">','</li></ul>'); ?>
          <div class="single__author">
            <figure class="single__img single__img--author">
              <picture class="single__imgInner">
                <?php echo get_avatar( $author, 120 ); ?>
              </picture>
            </figure>
            <div class="single__info">
              <time
                class="single__time">公開日:<?php the_time('Y.m.d');?>&nbsp;-&nbsp;最終更新日:<?php the_modified_date('Y.m.d') ?></time>
              <?php $post_author = get_the_author(); // 投稿者名の取得 ?>
              <p class="single__authorName">投稿者：
                <?php $author = get_userdata($post->post_author); echo $author->display_name; ?>
              </p>
            </div>
          </div>
        </div>

        <div class="l-content__wrap">
          <article class="l-content__item l-content__item--left">
            <section class="single">
              <div class="single__inner">
                <div class="single__content">
                  <?php the_content(); ?>
                </div>
                <div class="pager">
                  <ul class="pager__list">
                    <li class="pager__item pager__item--left">
                      <?php if (get_previous_post()):?>
                      <?php previous_post_link('<i class="fas fa-chevron-left"></i>%link'); ?>
                      <?php endif; ?>
                    </li>
                    <li class="pager__item pager__item--right">
                      <?php if (get_next_post()):?>
                      <?php next_post_link('%link<i class="fas fa-chevron-right"></i>'); ?>
                      <?php endif; ?>
                    </li>
                  </ul>
                </div>
                <a href="/" class="c-button c-button--full">ホームに戻る</a>
              </div>
            </section>
          </article>
          <aside class="l-content__item l-content__item--right">
            <sidebar id="main-sidebar" class="sidebar">
              <section>
                <div class="heading--sidebar">
                  <h2>最新記事</h2>
                </div>
                <div class="sideArticles__inner c-box">
                  <ul class="sideArticles__list">
                    <?php
                    $args = array(
                      // 'post_type' => '',
                      'post__not_in' => array($post->ID),
                      // 'category__in' => $catID,
                      // 'posts_per_page' => 4,
                      'orderby' => 'post_in'
                    );
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) : ?>

                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                    <li class="sideArticles__item">
                      <div class="sideArticles__head">
                        <a href="<?php the_permalink(); ?>" class="sideArticles__link">
                          <figure class="single__img single__img--sidebar">
                            <picture class="single__imgInner">
                              <?php if (has_post_thumbnail()) : ?>
                              <?php the_post_thumbnail('medium'); ?>
                              <?php else : ?>
                              <img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/noimage.jpg"
                                alt="noimage">
                              <?php endif; ?>
                            </picture>
                          </figure>
                        </a>
                      </div>
                      <div class="sideArticles__foot">
                        <p class="sideArticles__category"><?php the_category(' '); ?></p>
                        <p class="sideArticles__txt">
                          <?php the_title(); ?>
                        </p>
                      </div>
                    </li>

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                  </ul>
                </div>
              </section>
              <section>
                <div class="heading--sidebar">
                  <h2>関連記事</h2>
                </div>
                <div class="sideArticles__inner c-box">
                  <ul class="sideArticles__list">
                    <?php
                        $original_post = $post;
                        $tags = wp_get_post_tags($post->ID);
                        $tagIDs = array();
                        if ($tags) {
                          $tagcount = count($tags);
                          for ($i = 0; $i < $tagcount; $i++) {
                            $tagIDs[$i] = $tags[$i]->term_id;
                          }
                            $args=array(
                            'tag__in' => $tagIDs,
                            'post__not_in' => array($post->ID),
                            'showposts'=>4,
                            'ignore_sticky_posts'=>1
                            );
                            $my_query = new WP_Query($args);
                          if( $my_query->have_posts() ) {
                            while ($my_query->have_posts()) : $my_query->the_post(); ?>

                            <?php get_template_part('includes/sidebar', 'articles'); ?>

                    <?php endwhile; wp_reset_query(); ?>
                    <?php } else { ?>
                    関連する記事は見当たりません…
                    <?php } } ?>
                  </ul>
                </div>
              </section>
              <section class="u-dp-pc toc">
                <div class="c-box">
                  <?php if ( is_active_sidebar('main-sidebar') ) : ?>
                  <ul class="toc__list">
                    <?php dynamic_sidebar('main-sidebar'); ?>
                  </ul>
                  <?php endif; ?>
                </div>
              </section>
            </sidebar>
          </aside>
        </div><!-- l-content__wrap -->
      </div><!-- l-content__inner -->
    </div><!-- l-content -->
  </main>
  <?php get_template_part('includes/footer'); ?>
  <?php get_footer(); ?>
</body>

</html>
