<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <?php get_header(); ?>
</head>

<body <?php body_class(); ?>>

  <?php
    // 自動整形機能停止
    if(is_page('contact')) {
      remove_filter('the_content', 'wpautop');
    }
  ?>
  <?php get_template_part('includes/header'); ?>

  <?php if(have_posts()): ?>
  <?php while(have_posts()): the_post(); ?>
  <main>
    <section class="l-section introduction">
      <div class="introduction__inner">
      <?php get_template_part('includes/breadcrumb'); ?>
        <h1 class="heading--page">
          <?php the_title(); ?>
          <!-- <span><?php echo strtoupper($post->post_name); ?></span> -->
        </h1>
        <p class="introduction__txt">
          <?php echo get_the_excerpt(); ?>
        </p>
      </div>
    </section>


    <div class="l-content">
      <div class="l-content__inner l-content__inner--page">


        <section class="l-section page">
          <div class="page__inner">
          <h2 class="heading--section">
            <?php the_title(); ?>
          </h2>
            <?php the_content(); ?>
            <a href="/" class="c-button c-button--full">ホームに戻る</a>
          </div>
        </section>


      </div><!-- l-content__inner -->
    </div><!-- l-content -->
  </main>
  <?php endwhile; ?>
  <?php endif; ?>


  <?php get_template_part('includes/footer'); ?>
  <?php get_footer(); ?>
</body>

</html>
