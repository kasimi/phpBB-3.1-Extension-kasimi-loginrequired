<?php

/**
 *
 * @package phpBB Extension - Login Required
 * @copyright (c) 2015 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace kasimi\loginrequired\acp;

/**
 * @ignore
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

class loginrequired_module
{
	public $u_action;

	function main($id, $mode)
	{
		global $config, $request, $template, $user;

		$user->add_lang('acp/common');
		$this->tpl_name = 'acp_loginrequired';
		$this->page_title = $user->lang('LOGINREQUIRED_TITLE');

		add_form_key('acp_loginrequired');

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('acp_loginrequired'))
			{
				trigger_error($user->lang('FORM_INVALID') . adm_back_link($this->u_action));
			}

			$loginrequired_enabled = $request->variable('loginrequired_enabled', 0);
			$config->set('kasimi.loginrequired.enabled', $loginrequired_enabled);

			$loginrequired_exceptions = $request->variable('loginrequired_exceptions', '');
			$config->set('kasimi.loginrequired.exceptions', $loginrequired_exceptions);

			global $phpbb_log;
			$user_id = (empty($user->data)) ? ANONYMOUS : $user->data['user_id'];
			$user_ip = (empty($user->ip)) ? '' : $user->ip;
			$phpbb_log->add('admin', $user_id, $user_ip, 'LOGINREQUIRED_CONFIG_UPDATED');
			trigger_error($user->lang('CONFIG_UPDATED') . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'LOGINREQUIRED_VERSION'		=> isset($config['kasimi.loginrequired.version']) ? $config['kasimi.loginrequired.version'] : '',
			'LOGINREQUIRED_ENABLED'		=> isset($config['kasimi.loginrequired.enabled']) ? $config['kasimi.loginrequired.enabled'] : '',
			'LOGINREQUIRED_EXCEPTIONS'	=> isset($config['kasimi.loginrequired.exceptions']) ? $config['kasimi.loginrequired.exceptions'] : '',
			'U_ACTION'					=> $this->u_action,
		));
	}
}
