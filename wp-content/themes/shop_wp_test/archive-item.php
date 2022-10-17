<?php get_header(); ?>

<!-- loading -->
<?php get_template_part('content', 'loading'); ?>
<!-- nav menu -->
<?php get_template_part('content', 'menu'); ?>
<!-- main -->
<main class="l-main">
  <section class="c-container p-container__top">
    <div class="p-container__title-box onclickclass">
      <h1 class="p-container__title">Products</h1>
    </div>

    <ul class="p-recommend js-offset">

      <?php
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;
      $args = array(
        'post_type' => 'item',
        'posts_per_page' => 8, //記述しなければ、管理画面 > 表示設定で設定した件数になる。
        'paged' => $paged,
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <li class=" p-recommend__linenup js-random-show">
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
        投稿がありません。
      <?php endif; ?>
    </ul>
    <div>
      <?php
      $page_links =  paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => '/page/%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $the_query->max_num_pages,
        'type' => 'array',
        'prev_text' => '<i class="fa-solid fa-caret-left"></i>',
        'next_text' => '<i class="fa-solid fa-caret-right"></i>'
      ));
      echo '<ul class="p-pagination"><li>';
      echo join('</li><li class="p-pagination__number">', $page_links);
      echo '</li></ul>';
      ?>
    </div>
  </section>
  <?php get_template_part('content', 'sns'); ?>
</main>

<?php get_footer(); ?>