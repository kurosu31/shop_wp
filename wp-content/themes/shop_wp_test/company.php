<?php
/* 
Template Name: COMPANY 〜インフォメーション〜
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
    <div class="p-detail">
      <div class="p-detail__box">
        <dl class="p-info">
          <dt>社名</dt>
          <dd><?php echo get_post_meta($post->ID, 'company_info1', true); ?></dd>
          <dt>住所</dt>
          <dd><?php echo get_post_meta($post->ID, 'company_info2', true); ?></dd>
          <dt>設立</dt>
          <dd><?php echo get_post_meta($post->ID, 'company_info3', true); ?></dd>
          <dt>資本金</dt>
          <dd><?php echo get_post_meta($post->ID, 'company_info4', true); ?></dd>
          <dt>従業員数</dt>
          <dd><?php echo get_post_meta($post->ID, 'company_info5', true); ?></dd>
          <dt>事業内容</dt>
          <dd><?php echo get_post_meta($post->ID, 'company_info6', true); ?></dd>
        </dl>
      </div>
      <div class="p-detail__box">
        <?php echo get_post_meta($post->ID, 'map', true); ?>
      </div>
    </div>
  </div>
  <?php get_template_part('content', 'sns'); ?>
</main>

<!--footer -->
<?php get_footer(); ?>