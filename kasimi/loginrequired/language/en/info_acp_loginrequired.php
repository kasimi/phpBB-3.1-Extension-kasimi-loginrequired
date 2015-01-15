<?php

/**
 *
 * @package phpBB Extension - Login Required
 * @copyright (c) 2015 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * @ignore
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'LOGINREQUIRED_TITLE'				=> 'Login Required',
	'LOGINREQUIRED_CONFIG'				=> 'Configuration',
	'LOGINREQUIRED_CONFIG_UPDATED'		=> '<strong>Login Required Extension</strong><br />» Configuration updated',
	'LOGINREQUIRED_ENABLED'				=> 'Enable extension',
	'LOGINREQUIRED_ENABLED_EXP'			=> 'Globally enable or disable the requirement for users to login.',
	'LOGINREQUIRED_EXCEPTIONS'			=> 'Exceptions',
	'LOGINREQUIRED_EXCEPTIONS_EXP'		=> 'By default all pages require users to login to access them. If you want to allow access to specific pages without logging in, list them here, one per line. For example, to allow guests to access:<ul><li style="font-size:0.95em">the FAQ, add "faq.php" (without quotes) to the list.</li><li style="font-size:0.95em">an extension\'s route at /coolextension, add "app.php/coolextension" (without quotes) to the list.</li><li style="font-size:0.95em">a custom page located at /custom/page.php, add "custom/page.php" (without quotes) to the list.</li></ul>',
));
