<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/37442f81a6.js" crossorigin="anonymous"></script>
  <!-- <link rel="icon" href="../src/img/favicon/favicon.ico"> -->
  <title><?php wp_title(); ?></title>

  <?php wp_head(); ?>
</head>

<body class="l-body" <?php body_class(); ?>>