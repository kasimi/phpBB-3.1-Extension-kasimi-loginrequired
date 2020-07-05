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
	$lang = [];
}

$lang = array_merge($lang, [
	'LOGINREQUIRED_TITLE'				=> 'Login Required',
	'LOGINREQUIRED_CONFIG'				=> 'Configuration',
	'LOGINREQUIRED_CONFIG_UPDATED'		=> '<strong>Login Required Extension</strong><br>» Configuration updated',
]);
