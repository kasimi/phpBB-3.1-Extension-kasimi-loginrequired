<?php

/**
 *
 * @package phpBB Extension - Login Required
 * @copyright (c) 2015 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace kasimi\loginrequired\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/* @var \phpbb\user */
	protected $user;

	/* @var \phpbb\config\config */
	protected $config;

	/* @var string */
	protected $php_ext;

	/* @var boolean */
	protected $is_first_user_setup = true;

	/**
 	 * Constructor
	 *
	 * @param \phpbb\user							$user
	 * @param \phpbb\config\config					$config
	 * @param string								$php_ext
	 */
	public function __construct(
		\phpbb\user $user,
		\phpbb\config\config $config,
		$php_ext
	)
	{
		$this->user		= $user;
		$this->config	= $config;
		$this->php_ext	= $php_ext;
	}

	/**
	 * Register hooks
	 */
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup' => 'login_required',
		);
	}

	/**
	 * Event: core.user_setup
	 */
	public function login_required($event)
	{
		if ($this->is_first_user_setup && $this->user->data['user_id'] == ANONYMOUS && $this->config['kasimi.loginrequired.enabled'])
		{
			$page = $this->user->page['page'];

			// Remove query string
			if (utf8_strlen($this->user->page['query_string']))
			{
				$page = utf8_substr($page, 0, -(utf8_strlen($this->user->page['query_string']) + 1));
			}

			// If the user is not browsing any of the whitelisted pages, we redirect to login page
			if (!$this->is_exception($page))
			{
				// login_box() calls $user->setup() and therefore this method again,
				// let's make sure we don't handle the next call.
				$this->is_first_user_setup = false;

				// We need to force login_box() to re-initialize the $user object
				// because an extension might have added its language keys already.
				$this->user->lang = array();

				login_box();
			}
		}
	}

	/**
	 *	Returns true if $page is whilelisted
	 */
	protected function is_exception($page)
	{
		if ($page === 'ucp.' . $this->php_ext)
		{
			return true;
		}

		foreach (explode("\n", $this->config['kasimi.loginrequired.exceptions']) as $exception)
		{
			if (utf8_strlen($exception) && $page === $exception)
			{
				return true;
			}
		}

		return false;
	}
}
