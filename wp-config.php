<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * データベース設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link https://ja.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** データベース設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
// define('DB_NAME', 'wordpress');
define('DB_NAME', 'heroku_4d7a1163f97a998');

/** MySQL データベースのユーザー名 */
// define('DB_USER', 'root');
define('DB_USER', 'b735aef22688bb');

/** MySQL データベースのパスワード */
// define('DB_PASSWORD', 'root');
define('DB_PASSWORD', '51badd66');

/** MySQL のホスト名 */
// define('DB_HOST', 'localhost');
define('DB_HOST', 'us-cdbr-east-06.cleardb.net');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8mb4');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'XDyLa~8lA+$DaVSqm}>TjU#(]%m(r+t?Er>{|OU49-w,4I+/P]6:}=TT_:jM(C3v');
define('SECURE_AUTH_KEY',  '|&kkghW-[k^Hb|`IfV&UF3:1SZelH[~nmBijR:S6&+;yPvI3(|%?*|s5G;>=8{}T');
define('LOGGED_IN_KEY',    'E~EE:n[&sl(${9ld.z;@[v0]`H39;k.{v&&O/r`h-E>v4o<N}_s>yk 3uy@3gFLV');
define('NONCE_KEY',        ';S{#l<mnN3m)Dzfv{S0BK>8JI;Nfg:Fku<Z^o)?Ihi} f{?u!qL- +z=<V4JW*2w');
define('AUTH_SALT',        'A+TE}m]/()yoj4L|JD9%W2rIRSs}TB%u-VuBSa6S!;7>b-Lwa:$#pw*aLZyfry_k');
define('SECURE_AUTH_SALT', 'p({*x.*:q|Jj!@#UT=S^@{Y[q-1Y;-Ml`h7kh{#<{.My[iShFE_a_Q<kFj~?~0qw');
define('LOGGED_IN_SALT',   'C@FB-jPJrBS[!88a||JsLCT,w0zU|6c*6:/:mb-]T[K{Aj[,mt#PZ6[`Pt-aUj7>');
define('NONCE_SALT',       'MKrxwBR>rd$~6XNk=- ISpASJI-Ogr%%b^[UVS+y+nV/c.%^jkKV:hH Nx#,[{+D');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数についてはドキュメンテーションをご覧ください。
 *
 * @link https://ja.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* カスタム値は、この行と「編集が必要なのはここまでです」の行の間に追加してください。 */



/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
