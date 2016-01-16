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

$lang = array_merge($lang, array(
	'LOGINREQUIRED_TITLE'				=> 'Identificación Requerida',
	'LOGINREQUIRED_CONFIG'				=> 'Configuración',
	'LOGINREQUIRED_CONFIG_UPDATED'		=> '<strong>Extensión Identificación Requerida</strong><br />» Configuración actualizada',
	'LOGINREQUIRED_ENABLED'				=> 'Habilitar extensión',
	'LOGINREQUIRED_ENABLED_EXP'			=> 'A nivel global, activar o desactivar el requisito de que los usuarios inicien sesión.',
	'LOGINREQUIRED_EXCEPTIONS'			=> 'Excepciones',
	'LOGINREQUIRED_EXCEPTIONS_EXP'		=> 'Por defecto, todas las páginas requieren que los usuarios inicien sesión para acceder a ellas. Si desea permitir el acceso a determinadas páginas sin necesidad de iniciar sesión, puede enumerarlas aquí, una por línea. Por ejemplo, para que los invitados puedan acceder a:<ul><li style="font-size:0.95em">el FAQ, añada "faq.php" (sin comillas) en la lista.</li><li style="font-size:0.95em">Para la ruta de una extensión en /coolextension, añada "app.php/coolextension" (sin comillas) en la lista.</li><li style="font-size:0.95em">Una página personalizada ubicada en /custom/page.php, añada "custom/page.php" (sin comillas) en la lista.</li></ul>',
));
