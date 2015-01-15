<?php

/**
 *
 * @package phpBB Extension - Login Required
 * @copyright (c) 2015 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace kasimi\loginrequired\migrations;

/**
 * @ignore
 */
if (!defined('IN_PHPBB'))
{
    exit;
}

class v1_0_0 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\alpha1');
	}

	public function effectively_installed()
	{
		return isset($this->config['loginrequired_version']) && version_compare($this->config['loginrequired_version'], '1.0.0', '>=');
	}

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

	public function revert_data()
	{
		return array(
			// Remove config entries
			array('config.remove', array('kasimi.loginrequired.version')),
			array('config.remove', array('kasimi.loginrequired.enabled')),
			array('config.remove', array('kasimi.loginrequired.exceptions')),

			// Remove ACP module
			array('module.remove', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'LOGINREQUIRED_TITLE'
			)),
			array('module.remove', array(
				'acp',
				'LOGINREQUIRED_TITLE',
				array(
					'module_basename'	=> '\kasimi\loginrequired\acp\loginrequired_module',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}
