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

	/* @var \phpbb\request\request_interface */
	protected $request;

	/* @var string */
	protected $php_ext;

	/* @var boolean */
	protected $is_first_user_setup = true;

	/**
 	 * Constructor
	 *
	 * @param \phpbb\user							$user
	 * @param \phpbb\config\config					$config
	 * @param \phpbb\request\request_interface		$request
	 * @param string								$php_ext
	 */
	public function __construct(
		\phpbb\user $user,
		\phpbb\config\config $config,
		\phpbb\request\request_interface $request,
		$php_ext
	)
	{
		$this->user		= $user;
		$this->config	= $config;
		$this->request	= $request;
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
		if ($this->is_first_user_setup && $this->user->data['user_id'] == ANONYMOUS && $this->config['kasimi.loginrequired.enabled'] == 1)
		{
			$page = $this->user->page['page'];

			// Remove query string
			if (strlen($this->user->page['query_string']))
			{
				$page = substr($page, 0, -(strlen($this->user->page['query_string']) + 1));
			}

			// If the user is not browsing any of the whitelisted pages, we redirect to login page
			if (!$this->is_exception($page))
			{
				// login_box() calls $user->setup() and therefore this method again,
				// let's make sure we don't handle the next call.
				$this->is_first_user_setup = false;
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
			if (strlen($exception) && $page === $exception)
			{
				return true;
			}
		}

		return false;
	}
}
