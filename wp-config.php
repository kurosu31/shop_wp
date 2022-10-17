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
define('AUTH_KEY',         'Rx?(6w><lxrcFK-FT#F.TM;%`}>=WCE%R!b(O]~uv#=.]6=5Rw|FjvNJXUqZ*+9`');
define('SECURE_AUTH_KEY',  '!ilmz80RfUMp1zuSPvn->zKvJFar;pzz{9&1H,dIWcI3O+yh+/cSRI{c:f6}tG<x');
define('LOGGED_IN_KEY',    'j73fgz.Q:gSCjopVVEzQz|zz3O+/|Gxu}Ur2x~yjd[W9`]M~aAhgd~C-vQCyO$xb');
define('NONCE_KEY',        '#^T7Q$Vr.#xF*h^smc4glJ)~p0ylRSwp;ez4hx.cC>{DZ|y^Cp+q0t4NOHV3TKf(');
define('AUTH_SALT',        'j!:IKT-T,*/m+)DpD5`@?e<-A<:Q4.CNtu$Ri4lynC(dJ@8a|]Agb*bAY(VmG|ST');
define('SECURE_AUTH_SALT', 'UFV+3Ow8<f?ZYAFHr)Q8m|Sb:Kk8*s!%M&%;ndd:-Zor!{UR._,<rbqvqDFj7tMM');
define('LOGGED_IN_SALT',   '4u[2K-L~^}& x$c|E-]}}xd5KmVq]gH[@%g+v-S[ck8!h-,.7<=G*:Wqr~6N{]&v');
define('NONCE_SALT',       '#Fk?H=Fm]lXCqCc3~:B( LHm>0mu6g~6.hYcL?I0[5UCMTN(->YV@3!Ki8EW-*mD');
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
define('WP_DEBUG', false);

/* カスタム値は、この行と「編集が必要なのはここまでです」の行の間に追加してください。 */



/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
