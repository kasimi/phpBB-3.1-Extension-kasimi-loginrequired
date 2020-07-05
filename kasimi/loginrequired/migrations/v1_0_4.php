<?php

/**
 *
 * @package phpBB Extension - Login Required
 * @copyright (c) 2015 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace kasimi\loginrequired\migrations;

class v1_0_4 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return ['\kasimi\loginrequired\migrations\v1_0_3'];
	}

	public function update_data()
	{
		return [
			['config.update', ['kasimi.loginrequired.version', '1.0.4']],
			['config.add', ['kasimi.loginrequired.regex', 0]],
		];
	}
}
