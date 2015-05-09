<?php
/**
 * WordPress基础配置文件。
 *
 * 本文件包含以下配置选项：MySQL设置、数据库表名前缀、密钥、
 * WordPress语言设定以及ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 * 编辑wp-config.php}Codex页面。MySQL设置具体信息请咨询您的空间提供商。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以手动复制这个文件，并重命名为“wp-config.php”，然后填入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'sgdb');

/** MySQL数据库用户名 */
define('DB_USER', 'sg');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'test');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8mb4');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'snVA@cNRPv]z7}o;+zLs7 hntkUnIn*pX;W9I;PhZJJs<Feg-eR3W+<ryb+!S[)E');
define('SECURE_AUTH_KEY',  'jX,t,nub*fnzO4+=dku4++<*/`J_LY5Nl${|x+6>I>Lw?-JFE}wB-=[3_Ita]/S-');
define('LOGGED_IN_KEY',    ')VTF-?B;DhZr+Qfi*w_]FHc)`w.o.L>;T7PJsN}|!)-+@*wl2yKZ9JF?{Ch|HbT&');
define('NONCE_KEY',        'Jh1<H!-6&L<PVE}QCR.Q7}~deqY>%.N#dT|/#? o1r|{[Q{@:Dxwk}d2xs|8d.jq');
define('AUTH_SALT',        'vV/*[:9H<SI*`eQ}A64^3TpIjH5bSmBwwuBvA?`&qTHI[Pmo-1ASg]#y8+}}}rqL');
define('SECURE_AUTH_SALT', '^/a#0V_6e`+1XM9MXeTi.p9C{g7X8YU3=V6KZHDysf1sF1xUHR;q0%d)OWB4T1&R');
define('LOGGED_IN_SALT',   'AU<t*pVnR|h8~|bv5e8t-v4|W@<@OI-}|&Q^[vfo9B+0d|H#]!8k++VM=&~!Rqs0');
define('NONCE_SALT',       '2@Q?JIBN*`y3JTIz8*vfs]L|)8t*P4sZ/+|QvWx6)S0@:z04lQof(mJ8%2E+?z1|');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'sg_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
