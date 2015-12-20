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
	'LOGINREQUIRED_TITLE'				=> 'Login obbligatorio',
	'LOGINREQUIRED_CONFIG'				=> 'Configurazione',
	'LOGINREQUIRED_CONFIG_UPDATED'		=> 'Configurazione <strong>Login Obbligatorio</strong> aggiornata',
	'LOGINREQUIRED_ENABLED'				=> 'Abilita estensione',
	'LOGINREQUIRED_ENABLED_EXP'			=> 'Abilitare o disabilitare l\'obbligo per gli utenti ad effettuare il login.',
	'LOGINREQUIRED_EXCEPTIONS'			=> 'Eccezioni',
	'LOGINREQUIRED_EXCEPTIONS_EXP'		=> 'Per impostazione predefinita, agli utenti è richiesto il login per accedere a tutte le pagine. Per autorizzare l\'accesso a pagine specifiche senza necessità di login, elencarle qui, una per ogni riga. Ad esempio, per consentire agli ospiti di accedere: <ul><li style="font-size:0.95em">alla pagina delle FAQ, aggiungere "faq.php" (senza virgolette) alla lista;</li><li style="font-size:0.95em">al percorso di una estensione /coolextension, aggiungere "app.php/coolextension" (senza virgolette) alla lista;</li><li style="font-size:0.95em">ad una pagina personalizzata /custom/page.php, aggiungere "custom/page.php" (senza virgolette) alla lista.</li></ul>',
));
