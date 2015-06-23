<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'educar2015');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'pumba2012');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'w-N-f/P3C7ph6<<^UDie-11^aY7l.V}y+d!**r<!-O=+uj^u|bovO^4An7%)&_@a');
define('SECURE_AUTH_KEY',  '|^Gat:*tMS^FWw8c}2kJCQ!s~-mp]7otelNG^!;X@YprR73TX}};(w4xK~y!iB#~');
define('LOGGED_IN_KEY',    'D<v31uj0nc-fv #s<QqilVUYna|-*6=Z8@Z hmPm}l)q?$bm+#5owHmt2^-$@.-9');
define('NONCE_KEY',        's_M6`9l/.t)[!CAe_*LUnlhIIk|aCp3-asLj-a4bPfEMIx| qL53f%v9M[S#ENN/');
define('AUTH_SALT',        'MwT|q{gO5)[U.!IfdTY&3bfY&K.&|>JQ0-fLYpi4eHcKDi.q==x5.I~^SN+.AxHH');
define('SECURE_AUTH_SALT', '-Q@M}>t;DUV~yQF+VQ)6Jrvm{9]?|W-t7|fc]P^xBTxiWOtYj=xLo7l/U~I.RIHi');
define('LOGGED_IN_SALT',   '/o[#(y1@/C_^Gm9C]QeShbvRD+~D{*bHL>Cw86v{l^~sWAl1``2m?d,@E ]+hrQ=');
define('NONCE_SALT',       '3o}H^I`_)cS.-H`1N[8^{Iw$jW^LwMvDnBp,*(1NApuL[#XR4pr6ZV~g;$[+[8 m');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
