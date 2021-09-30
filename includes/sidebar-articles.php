<li class="sideArticles__item">
  <div class="sideArticles__head">
    <a href="<?php the_permalink(); ?>" class="sideArticles__link">
      <figure class="single__img single__img--sidebar">
        <picture class="single__imgInner">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium'); ?>
          <?php else : ?>
            <img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/noimage.jpg" alt="noimage">
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
