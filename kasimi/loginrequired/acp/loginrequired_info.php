<?php

/**
 *
 * @package phpBB Extension - Login Required
 * @copyright (c) 2015 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace kasimi\loginrequired\acp;

class loginrequired_info
{
	function module()
	{
		return [
			'filename'	=> '\kasimi\loginrequired\acp\loginrequired_module',
			'title'		=> 'LOGINREQUIRED_TITLE',
			'modes'		=> [
				'settings' => [
					'title'	=> 'LOGINREQUIRED_CONFIG',
					'auth'	=> 'ext_kasimi/loginrequired && acl_a_board',
					'cat'	=> ['LOGINREQUIRED_TITLE'],
				],
			],
		];
	}
}
