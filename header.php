<meta name="viewport" content="width=device-width,initial-scale=1">
  <?php
    wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.6.1/css/all.css');
    // wp_enqueue_style('font-redHat', '//fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;700;900&display=swap');
    // wp_enqueue_style('font-mPlus', '//fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300;400;500;700&display=swap');
    // wp_enqueue_style('font-noto3', '//fonts.googleapis.com/css2?family=Noto+Sans+JP%3Awght%40100%3B300%3B400%3B500%3B700%3B900&amp;#038;display=swap&amp;#038;ver=5.8');
    wp_enqueue_style('icon', get_template_directory_uri() . '/dist/assets/images/icon/favicon-32x32.png');
    wp_enqueue_style('stylesheet', get_template_directory_uri() . '/dist/assets/styles/main.css');
    wp_enqueue_script('jquery');
    wp_head();
  ?>
