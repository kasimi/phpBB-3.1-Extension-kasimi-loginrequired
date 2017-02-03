<?php

/**
 *
 * @package phpBB Extension - Login Required
 * @copyright (c) 2015 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace kasimi\loginrequired\migrations;

class v1_1_0 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\kasimi\loginrequired\migrations\v1_0_4');
	}

	public function update_data()
	{
		return array(
			array('config.remove', array('kasimi.loginrequired.version')),
		);
	}
}
