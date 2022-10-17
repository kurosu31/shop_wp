<?php get_header(); ?>

<!-- loading -->
<?php get_template_part('content', 'loading'); ?>
<!-- nav menu -->
<?php get_template_part('content', 'menu'); ?>
<!-- main -->
<main class="l-main">
  <section class="p-hero">
    <ul id="js-slide-wrap" class="is-slide__wrap">
      <li class="js-slide-item is-slide__initial">
        <img class="p-hero__img" src="<?php echo get_post_meta($post->ID, 'top_slider_img1', true); ?>" alt=" top-slider_img1">
      </li>
      <li class="js-slide-item is-slide__initial">
        <img class="p-hero__img" src="<?php echo get_post_meta($post->ID, 'top_slider_img2', true); ?>" alt="top-slider_img2">
      </li>
      <li class="js-slide-item is-slide__initial">
        <img class="p-hero__img" src="<?php echo get_post_meta($post->ID, 'top_slider_img3', true); ?>" alt="top-slider_img3">
      </li>
    </ul>
  </section>
  <p>top-index</p>
  <?php echo get_post_type_archive_link(get_post_type()); ?>
  <p>ページが表示できていません</p>
  <section class="c-container">
    <ul class="p-recommend js-offset">
      <li class="p-recommend__linenup js-random-show">
        <a href="/">
          <img src="./img/pumps_03.jpg" alt="recommend1">
          <p>プロダクトタイトルプロダクトタイトル</p>
          <p>&yen; 99,999 +tax</p>
        </a>
      </li>
      <li class="p-recommend__linenup js-random-show">
        <a href="/">
          <img src="./img/boots.jpg" alt="recommend2">
          <p>プロダクトタイトルプロダクトタイトル</p>
          <p>&yen; 99,999 +tax</p>
        </a>
      </li>
      <li class="p-recommend__linenup js-random-show">
        <a href="/">
          <img src="./img/sandal_01.jpg" alt="recommend3">
          <p>プロダクトタイトルプロダクトタイトル</p>
          <p>&yen; 99,999 +tax</p>
        </a>
      </li>
      <li class="p-recommend__linenup js-random-show">
        <a href="/">
          <img src="./img/shoes_01.jpg" alt="recommend4">
          <p>プロダクトタイトルプロダクトタイトル</p>
          <p>&yen; 99,999 +tax</p>
        </a>
      </li>
      <li class="p-recommend__linenup js-random-show">
        <a href="/">
          <img src="./img/formal.jpg" alt="recommend5">
          <p>プロダクトタイトルプロダクトタイトル</p>
          <p>&yen; 99,999 +tax</p>
        </a>
      </li>
      <li class="p-recommend__linenup js-random-show">
        <a href="/">
          <img src="./img/sneaker_01.jpg" alt="recommend6">
          <p>プロダクトタイトルプロダクトタイトル</p>
          <p>&yen; 99,999 +tax</p>
        </a>
      </li>
      <li class="p-recommend__linenup js-random-show">
        <a href="/">
          <img src="./img/sneaker_02.jpg" alt="recommend7">
          <p>プロダクトタイトルプロダクトタイトル</p>
          <p>&yen; 99,999 +tax</p>
        </a>
      </li>
      <li class="p-recommend__linenup js-random-show">
        <a href="/">
          <img src="./img/pumps_02.jpg" alt="recommend8">
          <p>プロダクトタイトルプロダクトタイトル</p>
          <p>&yen; 99,999 +tax</p>
        </a>
      </li>
    </ul>
    <div class="p-recommend__more"><a href="/">View More <i class="fa-solid fa-plus"></i></a></div>
  </section>
  <section class="c-container c-sns">
    <a href="/" class="c-sns__items">INSTAGRAM</a>
    <a href="/" class="c-sns__items">TWITTER</a>
    <a href="/" class="c-sns__items">FACEBOOK</a>
  </section>
</main>

<?php get_footer(); ?>