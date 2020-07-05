<?php declare(strict_types=1);

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
	public function update_data(): array
	{
		return [
			// Add config entries
			['config.add', ['kasimi.loginrequired.version', '1.0.0']],
			['config.add', ['kasimi.loginrequired.enabled', 0]],
			['config.add', ['kasimi.loginrequired.exceptions', '']],

			// Add ACP category
			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				'LOGINREQUIRED_TITLE'
			]],

			// Add ACP module
			['module.add', [
				'acp',
				'LOGINREQUIRED_TITLE',
				[
					'module_basename'	=> '\kasimi\loginrequired\acp\loginrequired_module',
					'modes'				=> ['settings'],
				],
			]],
		];
	}
}
