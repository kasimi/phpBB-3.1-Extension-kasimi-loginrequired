<?php

/**
 *
 * @package phpBB Extension - Login Required
 * @copyright (c) 2015 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace kasimi\loginrequired\migrations;

class v1_0_0 extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(
			// Add config entries
			array('config.add', array('kasimi.loginrequired.version', '1.0.0')),
			array('config.add', array('kasimi.loginrequired.enabled', 0)),
			array('config.add', array('kasimi.loginrequired.exceptions', '')),

			// Add ACP module
			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'LOGINREQUIRED_TITLE'
			)),

			array('module.add', array(
				'acp',
				'LOGINREQUIRED_TITLE',
				array(
					'module_basename'	=> '\kasimi\loginrequired\acp\loginrequired_module',
					'auth'				=> 'ext_kasimi/loginrequired && acl_a_board',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}
