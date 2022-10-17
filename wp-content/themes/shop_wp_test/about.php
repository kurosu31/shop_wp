<?php
/* 
Template Name: ABOUT 〜アバウト〜
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
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_post_thumbnail('full', array('class' => 'p-about__img')); ?>
        <?php endwhile;
        endif; ?>
      </figure>
      <div class="p-detail__box">
        <div class="p-about__description">
          <div class="p-about__text">
            <?php echo get_post_meta($post->ID, 'about', true); ?>
            <?php if (have_posts()) :
              while (have_posts()) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                  <?php the_content(); ?>
                </div>
              <?php endwhile;
            else : ?>
          </div>
          <div class="p-about__text">
            <h2>入力がありません。</h2>
          </div>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php get_template_part('content', 'sns'); ?>
</main>

<!--footer -->
<?php get_footer(); ?>