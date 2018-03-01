<?php


/**
 * WordPress için taban ayar dosyası.
 *
 * Bu dosya şu ayarları içerir: MySQL ayarları, tablo öneki,
 * gizli anahtaralr ve ABSPATH. Daha fazla bilgi için 
 * {@link https://codex.wordpress.org/Editing_wp-config.php wp-config.php düzenleme}
 * yardım sayfasına göz atabilirsiniz. MySQL ayarlarınızı servis sağlayıcınızdan edinebilirsiniz.
 *
 * Bu dosya kurulum sırasında wp-config.php dosyasının oluşturulabilmesi için
 * kullanılır. İsterseniz bu dosyayı kopyalayıp, ismini "wp-config.php" olarak değiştirip,
 * değerleri girerek de kullanabilirsiniz.
 *
 * @package WordPress
 */

// ** MySQL ayarları - Bu bilgileri sunucunuzdan alabilirsiniz ** //
/** WordPress için kullanılacak veritabanının adı */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/pistonkaf/public_html/ikinci/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'pistonka_ikinci');


/** MySQL veritabanı kullanıcısı */
define('DB_USER', 'pistonka_dev');


/** MySQL veritabanı parolası */
define('DB_PASSWORD', '#U=mzRi9xr6h');


/** MySQL sunucusu */
define('DB_HOST', 'localhost');


/** Yaratılacak tablolar için veritabanı karakter seti. */
define('DB_CHARSET', 'utf8mb4');


/** Veritabanı karşılaştırma tipi. Herhangi bir şüpheniz varsa bu değeri değiştirmeyin. */
define('DB_COLLATE', '');

/*****Increase php limit */
define( 'WP_MEMORY_LIMIT', '256M' );

/**#@+
 * Eşsiz doğrulama anahtarları.
 *
 * Her anahtar farklı bir karakter kümesi olmalı!
 * {@link http://api.wordpress.org/secret-key/1.1/salt WordPress.org secret-key service} servisini kullanarak yaratabilirsiniz.
 * Çerezleri geçersiz kılmak için istediğiniz zaman bu değerleri değiştirebilirsiniz. Bu tüm kullanıcıların tekrar giriş yapmasını gerektirecektir.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '^UgK%YMd&X3E*]Yaf}-$/CuacEOVjYAk,Fs$EN7Jw(FF~c7lN^2SJX_df`0p&%+v');

define('SECURE_AUTH_KEY',  'NV2hW!D7WZrf!&[g{u`Kg%t?c_b_ cPQ8ngNvrj<X.pg~%jBW):pl:x~P;D75z77');

define('LOGGED_IN_KEY',    '-a5bp[y?VEg%5ep+L__We`DTZFYO(]28f )7s_nt~$af2328<QJjbZO_.)QoFrun');

define('NONCE_KEY',        'nM|)PFx_,8rPdl<yV@qc/K_`|z.42RW44-,er=f+:T,#ebIJftp7^o64X84n7Cfh');

define('AUTH_SALT',        '!N2g&Cd0v+yc.KN;ZqUI=}g3b~eHp$Wc%AhhPW,.6nWAo7j^eyoqYDk}~W+_l)EZ');

define('SECURE_AUTH_SALT', 'Z4[1OSVC|SXIyg[U38U.L0S|k~z1qL9IrF0g_teKy`TW(z *T}aQ*5{6(ZC6A&Q<');

define('LOGGED_IN_SALT',   '/qIZRR;Iwe>Vio/#V+7a0VMQoG&1Q3S gf>Azcbz 4Trmh>YNf-x/7|>;}!|-sYK');

define('NONCE_SALT',       'M{7^]53CABfiqj.aMv&`+g&Z,2D4Y.e&;<6`aYufmp,(?J~,czL:mJ`DOn]r3O-K');

/**#@-*/

/**
 * WordPress veritabanı tablo ön eki.
 *
 * Tüm kurulumlara ayrı bir önek vererek bir veritabanına birden fazla kurulum yapabilirsiniz.
 * Sadece rakamlar, harfler ve alt çizgi lütfen.
 */
$table_prefix  = 'jhfnb_';


/**
 * Geliştiriciler için: WordPress hata ayıklama modu.
 *
 * Bu değeri "true" yaparak geliştirme sırasında hataların ekrana basılmasını sağlayabilirsiniz.
 * Tema ve eklenti geliştiricilerinin geliştirme aşamasında WP_DEBUG
 * kullanmalarını önemle tavsiye ederiz.
 */
define('WP_DEBUG', false);

/* Hepsi bu kadar. Mutlu bloglamalar! */

/** WordPress dizini için mutlak yol. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** WordPress değişkenlerini ve yollarını kurar. */
require_once(ABSPATH . 'wp-settings.php');
