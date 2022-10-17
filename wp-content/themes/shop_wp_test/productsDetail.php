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
    <div class="p-detail">
      <figure class="p-detail__box">
        <?php get_post_meta('goods_detail_img', true); ?>
        <img class="p-detail__img" src="./img/pumps_02.jpg" alt="details">
      </figure>
      <div class="p-detail__box">
        <div class="p-detail__description">
          <p class="p-detail__text">
            テキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキスト
          </p>
          <p class="p-detail__text">
            テキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキスト
          </p>
        </div>

        <div class="p-detail__description">
          <p class="p-detail__text">¥99,999 +tax</p>
          <dl class="p-detail__text">
            <dt>SIZE：</dt>
            <dd>W999 × D999 × H999</dd>
            <dt>COLOR：</dt>
            <dd>テキスト</dd>
            <dt>MATERIAL：</dt>
            <dd>テキストテキストテキスト</dd>
          </dl>
        </div>
      </div>
    </div>

    <?php if (have_posts()) : ?>
      <?php the_post(); ?>

    <?php else : ?>
      <h2>記事が見つかりません。</h2>
    <?php endif; ?>
    <div class="p-detail__back">
      <a href="/">Back To Products</a>
    </div>
  </div>
  <?php get_template_part('content', 'sns'); ?>
</main>

<!--footer -->
<?php get_footer(); ?>