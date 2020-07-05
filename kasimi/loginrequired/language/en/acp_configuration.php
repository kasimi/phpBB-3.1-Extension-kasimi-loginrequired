<?php

/**
 *
 * @package phpBB Extension - Login Required
 * @copyright (c) 2015 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters for use
// ’ » “ ” …


$lang = array_merge($lang, array(
	'LOGINREQUIRED_ENABLED'				=> 'Enable extension',
	'LOGINREQUIRED_ENABLED_EXP'			=> 'Globally enable or disable the requirement for users to login.',
	'LOGINREQUIRED_REGEX'				=> 'The exceptions listed below are regular expressions',
	'LOGINREQUIRED_EXCEPTIONS'			=> 'Exceptions',
	'LOGINREQUIRED_EXCEPTIONS_EXP'		=> 'By default all pages require users to login to access them. If you want to allow access to specific pages without logging in, list them here, one per line. Examples:<ul><li style="font-size:0.95em">To grant guests access to the FAQ, use "faq.php" (for phpBB 3.1.x) or "app.php/help/faq" (for phpBB 3.2.x and later) without quotes.</li><li style="font-size:0.95em">To grant guests access to an extension’s route at /coolextension, use "app.php/coolextension" without quotes.</li><li style="font-size:0.95em">To grant guests access to a custom page located at /custom/page.php, use "custom/page.php" without quotes.</li></ul>',
));
