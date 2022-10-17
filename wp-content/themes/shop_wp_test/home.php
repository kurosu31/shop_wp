<?php
/* 
Template Name: HOME 〜トップページ〜
*/
?>
<!-- header -->
<?php get_header(); ?>
<!-- loading -->
<?php get_template_part('content', 'loading'); ?>
<!-- nav menu -->
<?php get_template_part('content', 'menu'); ?>
<!-- main -->
<main class="l-main">
  <section class="p-hero">
    <?php $page_info = get_page_by_path('home');
    $page_id = $page_info->ID;
    ?>
    <ul id="js-slide-wrap" class="is-slide__wrap">
      <li class="js-slide-item is-slide__initial">
        <img class="p-hero__img" src="<?php echo get_post_meta($page_id, 'top_slider_img1', true); ?>" alt=" top-slider_img1">
      </li>
      <li class="js-slide-item is-slide__initial">
        <img class="p-hero__img" src="<?php echo get_post_meta($page_id, 'top_slider_img2', true); ?>" alt="top-slider_img2">
      </li>
      <li class="js-slide-item is-slide__initial">
        <img class="p-hero__img" src="<?php echo get_post_meta($page_id, 'top_slider_img3', true); ?>" alt="top-slider_img3">
      </li>
    </ul>
  </section>
  <section class="c-container">
    <ul class="p-recommend js-offset">
      <?php $args = array(
        'post_type' => 'item',
        'posts_per_page' => -1,
        'tax_query' => array(
          array(
            'taxonomy' => 'item_category_taxonomy', // カスタムタクソノミー
            'terms' => array('recommend_item'), // カスタムタクソノミーのカテゴリー（タクソノミーターム）
            'field' => 'slug'
          ),
        ),
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <li class="p-recommend__linenup js-random-show">
            <a href=" <?php the_permalink(); ?>">
              <?php
              $thumbnail = (has_post_thumbnail()) ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : '/wordpress/wp-content/themes/shop_wp/images/no_img.png';
              if (get_the_post_thumbnail_url()) :  ?>
                <img src="<?php echo $thumbnail ?>" alt="recommend1">
              <?php endif; ?>
              <p><?php the_title(); ?></p>
              <!-- <p>&yen; <?php echo mb_strimwidth(strip_tags(get_the_content()), 0, 20, "…", "UTF-8"); ?></p> -->
              <p>&yen; <?php echo number_format(get_post_meta($post->ID, 'price_data', true)); ?></p>
            </a>
          </li>
        <?php endwhile; ?>
      <?php else : ?>
        何も投稿がありません。
      <?php endif; ?>
    </ul>
    <div class="p-recommend__more"><a href="<?php echo get_post_type_archive_link('item'); ?>">View More <i class="fa-solid fa-plus"></i></a></div>
  </section>
  <?php get_template_part('content', 'sns'); ?>
</main>

<!--footer -->
<?php get_footer(); ?>