<li class="archive__item">
  <a href="<?php the_permalink(); ?>" class="archive__link">
    <figure class="archive__img">
      <picture class="archive__imgInner">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('medium'); ?>
        <?php else : ?>
        <img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/noimage.jpg" alt="noimage">
        <?php endif; ?>
      </picture>
    </figure>
    <div class="mask">
      <div class="mask__inner">
        <p class="archive__txt">続きを表示する</p>
      </div>
    </div>
  </a>
  <div class="archive__meta">
    <p class="archive__detail">
      <span class="archive__category"><?php the_category(' '); ?></span>
      <time class="archive__time"><?php the_time('Y-m-d') ?></time>
    </p>
    <h3 class="archive__heading">
      <?php the_title(); ?>
    </h3>
    <div class="archive__tags">
      <ul class="archive__list--tags">
        <li class="archive__item--tags">
          <?php the_tags(' ', ' '); ?>
        </li>
      </ul>
    </div>
  </div>
</li>
