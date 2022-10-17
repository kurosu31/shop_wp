<?php
/* 
Template Name: PRODUCTS DETAIL 〜プロダクト詳細〜
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
  <div class="c-container p-container__top">
    <div class="p-container__title-box">
      <h1 class="p-container__title">
        <?php echo get_the_title(); ?>
      </h1>
    </div>
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
    ?>
        <div class="p-detail">
          <figure class="p-detail__box">
            <?php
            $thumbnail = (has_post_thumbnail()) ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : '/wordpress/wp-content/themes/shop_wp/images/no_img.png';
            if (get_the_post_thumbnail_url()) :  ?>
              <img class="p-detail__img" src="<?php echo $thumbnail ?>" alt="recommend1">
            <?php endif; ?>
          </figure>
          <div class="p-detail__box">
            <div class="p-detail__description">
              <div class="p-detail__text">
                <?php echo the_content(); ?>
              </div>
            </div>
            <div class="p-detail__description">
              <p class="p-detail__text">&yen; <?php echo number_format(get_post_meta($post->ID, 'price_data', true)); ?></p>
              <div class="p-detail__text">
                <dl class="p-detail__option">
                  <dt class="p-detail__option-title">SIZE：</dt>
                  <dd class="p-detail__option-content"><?php echo get_post_meta($post->ID, 'goods_data1', true); ?></dd>
                  <dt class="p-detail__option-title">COLOR：</dt>
                  <dd class="p-detail__option-content"><?php echo get_post_meta($post->ID, 'goods_data2', true); ?></dd>
                  <dt class="p-detail__option-title">MATERIAL：</dt>
                  <dd class="p-detail__option-content"><?php echo get_post_meta($post->ID, 'goods_data3', true); ?></dd>
                </dl>
              </div>
            </div>
          </div>
        </div>
    <?php
      endwhile;
    endif;
    ?>
    <?php if (have_posts()) : ?>
      <?php the_post(); ?>
    <?php else : ?>
      <h2>記事が見つかりません。</h2>
    <?php endif; ?>
    <div class="p-detail__back">
      <?php
      $h = $_SERVER['HTTP_HOST'];
      if (!empty($_SERVER['HTTP_REFERER']) && (strpos($_SERVER['HTTP_REFERER'], $h) !== false)) {
        echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">Back To Products</a>';
      }
      ?>
    </div>
  </div>
  <?php get_template_part('content', 'sns'); ?>
</main>

<!--footer -->
<?php get_footer(); ?>