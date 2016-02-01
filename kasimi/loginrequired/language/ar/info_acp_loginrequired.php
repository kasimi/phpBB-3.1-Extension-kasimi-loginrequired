<?php

/**
 *
 * @package phpBB Extension - Login Required
 * @copyright (c) 2015 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 * Translated By : Bassel Taha Alhitary - www.alhitary.net
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

$lang = array_merge($lang, array(
	'LOGINREQUIRED_TITLE'				=> 'طلب تسجيل الدخول',
	'LOGINREQUIRED_CONFIG'				=> 'الإعدادات',
	'LOGINREQUIRED_CONFIG_UPDATED'		=> '<strong>الإضافة : طلب تسجيل الدخول</strong><br />» تم تحديث الإعدادات',
	'LOGINREQUIRED_ENABLED'				=> 'تفعيل ',
	'LOGINREQUIRED_ENABLED_EXP'			=> 'تفعيل أو تعطيل الطلب من الأعضاء لتسجيل دخولهم.',
	'LOGINREQUIRED_EXCEPTIONS'			=> 'استثناء ',
	'LOGINREQUIRED_EXCEPTIONS_EXP'		=> 'يجب على الأعضاء بصورة إفتراضية تسجيل دخولهم لكي يتمكنوا من الوصول إلى جميع الصفحات. تستطيع هنا إضافة صفحات مُحددة بحيث يُمكن الوصول إليها بدون تسجيل الدخول ( كل صفحة في سطر مُستقل ). مثال : لكي تسمح للزائرين من الوصول إلى الصفحة <ul><li style="font-size:0.95em">"الأسئلة المتكررة" , اكتب في القائمة "faq.php" ( بدون علامات الإقتباس ).</li><li style="font-size:0.95em">صفحة خاصة بأحد الإضافات مثل : /coolextension , اكتب في القائمة "app.php/coolextension" ( بدون علامات الإقتباس ).</li><li style="font-size:0.95em">صفحة خاصة موجودة في المسار /custom/page.php , اكتب في القائمة "custom/page.php" ( بدون علامات الإقتباس ).</li></ul>',
));
