<?php $args = array(
  'post_type' => 'sns',
  'posts_per_page' => -1,
);

$the_query = new WP_Query($args);
if ($the_query->have_posts()) :
  while ($the_query->have_posts()) : $the_query->the_post(); ?>
    <a href="<?php echo get_post_meta($post->ID, 'sns_data', true) ?>" class="c-sns__items"><?php the_title(); ?></a>
  <?php endwhile; ?>
<?php else : ?>
  何も投稿がありません。
<?php endif; ?>