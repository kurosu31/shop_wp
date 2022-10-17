<?php


/*=============================================
  管理画面など設定各種
=============================================*/

// 管理画面用の css js 読み込み
function custom_admin_enqueue()
{
  //  管理画面css
  wp_enqueue_style('custom_admin_enqueue', get_template_directory_uri() . '/admin-custom/css/custom-admin.css');
  //  管理画面js
  wp_enqueue_script('custom_admin_enqueue', get_template_directory_uri() . '/admin-custom/js/custom-admin.js');
}
add_action('admin_enqueue_scripts', 'custom_admin_enqueue');

// 公開画面用の css js 読み込み
function custom_enqueue()
{
  // 公開画面css
  wp_enqueue_style('custom_admin_enqueue', get_template_directory_uri() . '/style.css');
  // 公開画面js
  wp_enqueue_script('custom_admin_enqueue', get_template_directory_uri() . '/custom/js/index.js');
}
add_action('wp_enqueue_scripts', 'custom_enqueue');

// 表示用のメディアアップローダーのスクリプト
function my_media_script()
{
  wp_enqueue_media();
}
add_action('wp_enqueue_scripts', 'my_media_script');

// アイキャッチ画像のサイズ指定を削除
add_filter('post_thumbnail_html', 'custom_attribute');
function custom_attribute($html)
{
  // width height を削除する
  $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
  return $html;
}

// 管理ページのメニュー非表示（固定ページ カスタムフィールドから設定するため）
// function remove_post_function()
// {
//   remove_post_type_support('post', 'comments'); // コメント
//   remove_post_type_support('post', 'post-formats'); // 投稿フォーマット
//   remove_post_type_support('post', 'thumbnail'); // アイキャッチ（投稿） カスタムページには表示できるようにしている。
//   remove_post_type_support('page', 'thumbnail'); // アイキャッチ（固定ページ）

//   unregister_taxonomy_for_object_type('category', 'post'); // カテゴリ
//   unregister_taxonomy_for_object_type('post_tag', 'post'); // タグ
// }
// add_action('init', 'remove_post_function');


// カスタムメニューの使用
register_nav_menu('main_nav_menu', ' ヘッダーナビゲーション');


// wp_nav_menuのliにclass追加
function add_additional_class_on_li($classes, $item, $args)
{
  if (isset($args->add_li_class)) {
    $classes['class'] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
// wp_nav_menuのaにclass追加
function add_additional_class_on_a($classes, $item, $args)
{
  if (isset($args->add_li_class)) {
    $classes['class'] = $args->add_a_class;
  }
  return $classes;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);


/*=============================================
  ページネーション
=============================================*/
// アーカイブのみ
/*=============================================
  カスタムフィールド
=============================================*/
/* ---------- 固定ページ専用カスタムフィールド ---------- */
// 投稿ページへ表示するカスタムボックスを定義する
add_action('add_meta_boxes', 'add_custom_inputbox', 10, 2);
// 追加した表示項目のデータ更新・保存のためのアクションフック
add_action('save_post', 'save_custom_postdata');
// 入力項目がどの投稿タイプかのページに表示されるかの設定
function add_custom_inputbox($post_type, $post)
{
  //投稿オブジェクトからスラッグを取得
  $slug = $post->post_name;
  if ($slug == 'home') {
    // トップページのスライダー画像用カスタムフィールドを追加
    add_meta_box(
      'top_hero_slider_img',
      'トップページのスライダー画像',
      'custom_area_top_slider_img',
      'page',
      'normal',
      'high',
    );
  }
  if ($slug == 'company') {
    // 会社案内用カスタムフィールドを追加
    add_meta_box(
      'company_map_id',
      'mapアドレス入力欄',
      'custom_area_company_map',
      'page',
      'normal',
      'high',
    );
    add_meta_box(
      'company_info_id',
      '会社詳細内容',
      'custom_area_company_info',
      'page',
      'normal',
      'high',
    );
  }
};
function custom_area_top_slider_img()
{
  global $post;
  echo  '
  <p>メディアでアップロードした画像のURLを登録してください。</p>
  <table>';
  for ($i = 1; $i <= 3; $i++) {
    echo '<tr><td>トップ画像URL' . $i . ': </td><td>
    <input type="text" name="top_slider_img' . $i . '" value="' . get_post_meta($post->ID, 'top_slider_img' . $i, true) . '" size="50" placeholder="http://...">';
  }
  echo  '</table>';
}
// 固定ページcompanyカスタムフィールドの入力エリア
function custom_area_company_map()
{
  global $post;

  echo '<textarea name="company_map" id="" cols="50" rows="5">' . get_post_meta($post->ID, 'company_map', true) . '</textarea><br>';
}
// 固定ページcompanyカスタムフィールドの入力エリア
function custom_area_company_info()
{
  global $post;
  echo  '<table>';
  for ($i = 1; $i <= 6; $i++) {
    echo '<tr><td>info' . $i . ': </td><td><input name="company_info' . $i . '" id="" cols="50" rows="5" value="' . get_post_meta($post->ID, 'company_info' . $i, true) . '"></td></tr>';
  }
  echo  '</table>';
}
function save_custom_postdata($post_id)
{
  $company_map = '';
  $company_info = '';
  $top_slider_img = '';

  if (isset($_POST['company_map'])) {
    $company_map = $_POST['company_map'];
  }

  if ($company_map != get_post_meta($post_id, 'company_map', true)) {
    update_post_meta($post_id, 'company_map', $company_map);
  } elseif ($company_map == '') {
    delete_post_meta($post_id, 'company_map', get_post_meta($post_id, 'company_map', true));
  }

  // company_infoの登録処理
  for ($i = 1; $i <= 6; $i++) {
    if (isset($_POST['company_info' . $i])) {
      $company_info = $_POST['company_info' . $i];
    }
    if ($company_info != get_post_meta($post_id, 'company_info' . $i, true)) {
      update_post_meta($post_id, 'company_info' . $i, $company_info);
    } elseif ($company_info == '') {
      delete_post_meta($post_id, 'company_info' . $i, get_post_meta($post_id, 'company_info' . $i, true));
    }
  }
  // home_top_slider_imgの登録処理
  for ($i = 1; $i <= 3; $i++) {
    if (isset($_POST['top_slider_img' . $i])) {
      $top_slider_img = $_POST['top_slider_img' . $i];
    }
    if ($top_slider_img != get_post_meta($post_id, 'top_slider_img' . $i, true)) {
      update_post_meta($post_id, 'top_slider_img' . $i, $top_slider_img);
    } elseif ($top_slider_img == '') {
      delete_post_meta($post_id, 'top_slider_img' . $i, get_post_meta($post_id, 'top_slider_img' . $i, true));
    }
  }
};
// 固定ページcompanyとhomeのエディターを非表示
add_filter('use_block_editor_for_post', function ($use_block_editor, $post) {
  if ($post->post_type === 'page') {
    if (in_array($post->post_name, ['company', 'home'])) {
      remove_post_type_support('page', 'editor');
      return false;
    }
  }
  return $use_block_editor;
}, 10, 2);




/*=============================================
カスタムウィジェット
=============================================*/
// ウィジェットエリアを作成する関数がどれなのかを登録する
add_action('widgets_init', 'recommend_widgets_area');
// ウィゲット自体の作成する関数がどれなのかを関数にする
add_action('widgets_init', function () {
  register_widget('recommend_widgets_item1');
});


// ウィジェットエリアを作成
function recommend_widgets_area()
{
  register_sidebar(array(
    'name' => 'topおすすめエリア',
    'id' => 'widget_recommend',
    'before_widget' => '<div>',
    'after_widget' => '</div>'
  ));
}

// ウィジェット自体を作成
class recommend_widgets_item1 extends WP_Widget
{
  // 初期化（管理画面で表示するウィジェットの名前を設定）
  function __construct()
  {
    // WP_Widgetは非推薦
    parent::__construct(false, $name = '商品追加');
  }
  // ウィゲットの入力項目を作成する処理
  function form($instance)
  {
    // 入力された情報をサニタイズして変数へ格納
    $title = esc_attr($instance['title']);
    $body = esc_attr($instance['body']);
    $img_title = esc_attr($instance['img_title']);
    $img = esc_attr($instance['img']);

    $id_prefix = $this->get_field_id('');
?>
    <p>
      <input type="submit" id="<?php echo $this->get_field_id('img'); ?>" class="upload btn" value="<?php echo '画像の選択' ?> " onclick="imageWidget.uploader( '<?php echo $this->id; ?>', '<?php echo $id_prefix; ?>' ); return false;">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('img_title'); ?>">
        <?php echo '画像タイトル:'; ?>
      </label>
      <input class="widefat" id="<?php echo $this->get_field_id('img_title'); ?>" name="<?php echo $this->get_field_name('img_title'); ?>" type="text" value="<?php echo $img_title; ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">
        <?php echo 'タイトル:'; ?>
      </label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('body'); ?>">
        <?php echo '内容:'; ?>
      </label>
      <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('body'); ?>" name="<?php echo $this->get_field_name('body'); ?>" type="text"><?php echo $body; ?></textarea>
    </p>
    <?php
  }
  // ウィジェットにに入力された情報を保存する処理
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']); // php,htmlのタグを取り除く
    $instance['body'] = trim($new_instance['body']); // 前後の空白を取り除く
    $instance['img_title'] = strip_tags($new_instance['img_title']); // 前後の空白を取り除く
    $instance['img'] = trim($new_instance['img']); // 前後の空白を取り除く

    return $instance;
  }

  // 管理画面から入力されたウィジェットを画面に表示する処理
  function widget($args, $instance)
  {
    // 配列を変数に展開
    extract($args);

    // ウィジェットから入力された情報を取得
    $title = apply_filters('widget_title', $instance['title']);
    $body = apply_filters('widget_body', $instance['body']);
    $img_title = apply_filters('widget_img_title', $instance['img_title']);
    $img = apply_filters('widget_img', $instance['img']);

    // ウィジェットから入力された情報がある場合、htmlを表示する
    if ($title) {
    ?>
      <li class="p-recommend__linenup js-random-show">
        <a href="/">
          <img src="<?php echo $img; ?>" alt="<?php echo $img_title; ?>">
          <p><?php echo $title; ?></p>
          <p>&yen; <?php echo $body; ?></p>
        </a>
      </li>
<?php
    }
  }
}

/*=============================================
投稿の非表示
=============================================*/
/*【管理画面】投稿メニューを非表示 ブログなどつかがあれば再編集するものとする。*/
// function remove_menus()
// {
//   global $menu;
//   remove_menu_page('edit.php'); // 投稿を非表示
// }
// add_action('admin_menu', 'remove_menus');

/*=============================================
カスタム投稿
=============================================*/

/* ---------- カスタム投稿の追加 ---------- */
function create_post_type()
{
  // 商品のカスタム投稿
  $args_item = array( //オプション（以下）
    'label' => '商品一覧', // 管理画面上の表示（日本語でもOK）
    'labels' => array(  //管理画面に表示されるラベルの文字を指定
      'add_new' => '商品追加',
      'edit_item' => '商品の編集',
      'view_item' => '商品を表示',
      'search_items' => '商品を検索',
      'not_found' => '商品は見つかりませんでした。',
      'not_found_in_trash' => 'ゴミ箱に商品はありませんでした。',
    ),
    'public' => true, // 管理画面に表示するかどうかの指定
    'hierarchical' => true,  //★固定ページのように階層構造（親子関係）を持たせる
    'has_archive' => true, // 投稿した記事の一覧ページを作成する
    'show_in_rest' => true, // Gutenbergの有効化
    'menu_position' => 5, // 管理画面メニューの表示位置（投稿の下に追加）
    'menu_icon' => 'dashicons-images-alt', //アイコンの設定
    'supports' => array( // サポートする機能（以下）
      'title',  // タイトル
      'editor', // エディター
      'thumbnail', // アイキャッチ画像
      'revisions', // リビジョンの保存
    ),
  );
  register_taxonomy(
    'item_category_taxonomy',
    'item',
    array(
      'label' => '商品登録形式',
      'labels' => array(
        'all_items' => '商品登録形式一覧',
        'add_new_item' => '新規商品登録形式を追加'
      ),
      'hierarchical' => true, //カテゴリー形式
      'show_ui' => true, // 管理画面にこのカスタム投稿タイプのページを表示するs
      'show_in_rest' => true, //Gutenberg で表示
    )
  );
  register_taxonomy(
    'item_tag_taxonomy',
    'item',
    array(
      'label' => '商品タグ',
      'labels' => array(
        'all_items' => '商品タグ一覧',
        'add_new_item' => '新規商品タグを追加'
      ),
      'hierarchical' => false, //カテゴリー形式
      'show_ui' => true, // 管理画面にこのカスタム投稿タイプのページを表示するs
      'show_in_rest' => true, //Gutenberg で表示
    )
  );
  register_post_type( // カスタム投稿タイプの追加関数
    'item', //カスタム投稿タイプ名（半角英数字の小文字）
    $args_item
  );

  // snsリンクのカスタム投稿
  $args_sns = array( //オプション（以下）
    'label' => 'snsリンク一覧', // 管理画面上の表示（日本語でもOK）
    'labels' => array(  //管理画面に表示されるラベルの文字を指定
      'add_new' => 'snsリンク追加',
      'edit_item' => 'snsリンクの編集',
      'view_item' => 'snsリンクを表示',
      'search_items' => 'snsリンクを検索',
      'not_found' => 'snsリンクは見つかりませんでした。',
      'not_found_in_trash' => 'ゴミ箱にsnsリンクはありませんでした。',
    ),
    'public' => true, // 管理画面に表示するかどうかの指定
    'hierarchical' => false,  //★固定ページのように階層構造（親子関係）を持たせる
    'has_archive' => false, // 投稿した記事の一覧ページを作成する
    'show_in_rest' => true, // Gutenbergの有効化
    'menu_position' => 6, // 管理画面メニューの表示位置（投稿の下に追加）
    'menu_icon' => 'dashicons-admin-links', //アイコンの設定
    'supports' => array( // サポートする機能（以下）
      'title',  // タイトル
      'editor', // エディター
      'revisions', // リビジョンの保存
    ),
  );
  register_post_type( // カスタム投稿タイプの追加関数
    'sns', //カスタム投稿タイプ名（半角英数字の小文字）
    $args_sns
  );
}
add_action('init', 'create_post_type');

// アイキャッチの有効化
add_theme_support('post-thumbnails');

// snsリンクのカスタム投稿画面を編集
add_action('init', 'my_remove_post_support');
function my_remove_post_support()
{
  remove_post_type_support('sns', 'editor'); //本文欄
}

// snsリンクの「パーマリンク編集」を非表示に
add_filter('get_sample_permalink_html', '__return_false');

/* ---------- カスタム投稿専用カスタムフィールド ---------- */
// 商品のカスタムフィールド
// 商品のタイトルのplayceholderの変更
function item_title_placeholder_change($title)
{
  $screen = get_current_screen();
  if ($screen->post_type == 'item') {
    $title = 'ブランド名や商品名を記入';
  }
  return $title;
}
add_filter('enter_title_here', 'item_title_placeholder_change');

function sns_title_placeholder_change($title)
{
  $screen = get_current_screen();
  if ($screen->post_type == 'sns') {
    $title = 'snsサービス名を記入してください';
  }
  return $title;
}
add_filter('enter_title_here', 'sns_title_placeholder_change');

// 商品のカスタムフィールドの項目
function add_item_fields()
{
  // 金額用カスタムフィールドを追加
  add_meta_box('price_id', '金額の入力', 'insert_price_fields', 'item', 'normal');
  // 商品詳細用カスタムフィールドを追加
  add_meta_box('goods_detail_id', '詳細の入力', 'insert_goods_detail_fields', 'item', 'normal');
}
add_action('admin_menu', 'add_item_fields');
// snsリンクのカスタムフィールドの項目
function add_sns_link_fields()
{
  // 金額用カスタムフィールドを追加
  add_meta_box('sns_link_id', 'snsリンクの入力', 'insert_sns_link_fields', 'sns', 'normal');
}
add_action('admin_menu', 'add_sns_link_fields');

// 金額用カスタムフィールドの入力エリア
function insert_price_fields()
{
  global $post;

  echo '価格(税込)： &yen; <input type="number" name="price_data" placeholder="例)12000" value="' . get_post_meta($post->ID, 'price_data', true) . '" size="50">
        <br>
        <p>数値のみ(金額の桁区切り・コンマは記入不要です)</p>';
}
// 商品詳細用カスタムフィールドの入力エリア
function insert_goods_detail_fields()
{
  global $post;
  echo  '<table>
          <tr>
            <td>SIZE:</td>
            <td><textarea name="goods_data1" id="" cols="50" rows="3">' . get_post_meta($post->ID, 'goods_data1', true) . ' </textarea></td>
          </tr>
          <tr>
            <td>COLOR:</td>
            <td><textarea name="goods_data2" id="" cols="50" rows="3">' . get_post_meta($post->ID, 'goods_data2', true) . ' </textarea></td>
          </tr>
          <tr>
            <td>MATERIAL:</td>
            <td><textarea name="goods_data3" id="" cols="50" rows="3">' . get_post_meta($post->ID, 'goods_data3', true) . ' </textarea></td>
          </tr>
        </table>';
};
// sns用カスタムフィールドの入力エリア
function insert_sns_link_fields()
{
  global $post;
  echo '<p>アカウント名ではなく、アカウントページのURLを直接入力してください。</p>
  <input type="text" name="sns_data" placeholder="例) https://https://twitter.com/" value="' . get_post_meta($post->ID, 'sns_data', true) . '" size="50">';
};

// 金額用カスタムフィールドの値を保存
function save_custom_fields($post_id)
{
  $price = '';
  $goods_detail = '';
  $sns = '';

  // 商品用金額カスタムフィールドの値を保存
  if (isset($_POST['price_data'])) {
    $price = $_POST['price_data'];
  }
  if ($price != get_post_meta($post_id, 'price_data', true)) {
    update_post_meta($post_id, 'price_data', $price);
  } else {
    delete_post_meta($post_id, 'price_data', get_post_meta($post_id, 'price_data', true));
  }

  // 商品用カスタムフィールドの値を保存
  for ($i = 1; $i <= 3; $i++) {
    if (isset($_POST['goods_data' . $i])) {
      $goods_detail = $_POST['goods_data' . $i];
    }
    if ($goods_detail != get_post_meta($post_id, 'goods_data' . $i, true)) {
      update_post_meta($post_id, 'goods_data' . $i, $goods_detail);
    } elseif ($goods_detail == '') {
      delete_post_meta($post_id, 'goods_data' . $i, get_post_meta($post_id, 'goods_data' . $i, true));
    }
  }

  // snsリンク用カスタムフィールドの値を保存
  if (isset($_POST['sns_data'])) {
    $sns = $_POST['sns_data'];
  }
  if ($sns != get_post_meta($post_id, 'sns_data', true)) {
    update_post_meta($post_id, 'sns_data', $sns);
  } else {
    delete_post_meta($post_id, 'sns_data', get_post_meta($post_id, 'sns_data', true));
  }
}
add_action('save_post', 'save_custom_fields');



/* ---------- /カスタム投稿一覧にカテゴリーなどを表示 ---------- */
//カスタム投稿の一覧にカテゴリを表示
function add_custom_column($columns)
{
  $columns['item_category_taxonomy'] = '商品登録形式';
  $columns['thumbnail'] = 'アイキャッチ';
  return $columns;
}
add_filter('manage_item_posts_columns', 'add_custom_column');
function add_custom_column_id($column_name, $post_id)
{
  if ($column_name == 'item_category_taxonomy') {
    echo get_the_term_list($post_id, 'item_category_taxonomy', '', ', ');
  }
  if ($column_name == 'thumbnail') {
    echo get_the_post_thumbnail($post_id, 'small', array('style' => 'width:100px;height:auto;'));
  }
}
add_action('manage_item_posts_custom_column', 'add_custom_column_id', 10, 2);

// 表示順序を指定
function sort_posts_columns()
{
  $columns = array(
    'cb' => '<input type="checkbox" />',
    'title' => 'タイトル',
    'author' => '作成者',
    'item_category_taxonomy' => '商品登録形式',
    'thumbnail' => 'アイキャッチ画像',
    'date' => '日時',
  );
  return $columns;
}
add_filter('manage_item_posts_columns', 'sort_posts_columns');

//カスタム投稿の絞り込み検索
add_action('restrict_manage_posts', 'add_custom_taxonomies_term_filter');
function add_custom_taxonomies_term_filter()
{
  global $post_type;
  if ($post_type == 'item') {
    $taxonomy = 'item_category_taxonomy';
    wp_dropdown_categories(array(
      'show_option_all' => '商品形式一覧',
      'orderby' => 'name',
      'selected' => get_query_var($taxonomy),
      'hide_empty' => 0,
      'name' => $taxonomy,
      'taxonomy' => $taxonomy,
      'value_field' => 'slug',
    ));
  }
}
