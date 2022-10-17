<?php
/* 
Template Name: PRODUCTS 〜プロダクト〜
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
  <section class="c-container p-container__top">
    <div class="p-container__title-box">
      <h1 class="p-container__title">
        <?php echo get_the_title(); ?>
      </h1>
    </div>
    <ul id="js-offset" class="p-recommend js-products">
      <?php get_template_part('goods_loop'); ?>
    </ul>
    <div>
      <?php if (function_exists("pagination")) pagination($wp_query->max_num_pages); ?>
    </div>
  </section>
  <?php get_template_part('content', 'sns'); ?>
</main>

<!--footer -->
<?php get_footer(); ?>