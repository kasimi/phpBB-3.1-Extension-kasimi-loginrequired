<?php declare(strict_types=1);

/**
 *
 * @package phpBB Extension - Login Required
 * @copyright (c) 2015 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace kasimi\loginrequired\migrations;

class v1_0_3 extends \phpbb\db\migration\migration
{
	static public function depends_on(): array
	{
		return ['\kasimi\loginrequired\migrations\v1_0_2'];
	}

	public function update_data(): array
	{
		return [
			['config.update', ['kasimi.loginrequired.version', '1.0.3']],
		];
	}
}
