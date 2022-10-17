<!-- loop -->
<ul class="p-recommend js-offset js-products">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <li class="p-recommend__linenup js-random-show">
        <a href="<?php the_permalink(); ?>">

          <p class="p-recommend__details">&yen; <?php the_content(); ?></p>

          <?php echo get_post_meta($post->ID, 'goods_list_img', true); ?>
          <?php
          if (get_post_meta($post->ID, 'price', true)) :
            $num = get_post_meta($post->ID, 'price', true);
            echo number_format($num);
          endif; ?>

        </a>
      </li>
    <?php endwhile; ?>
  <?php endif; ?>
  <!-- <li class="p-recommend__linenup js-random-show">
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
      </li> -->
</ul>