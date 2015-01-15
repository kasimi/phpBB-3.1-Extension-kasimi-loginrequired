<?php

/**
 *
 * @package phpBB Extension - Login Required
 * @copyright (c) 2015 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace kasimi\loginrequired\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	/* @var string */
	protected $root_path;

	/* @var \phpbb\user */
	protected $php_ext;

	/* @var \phpbb\user */
	protected $user;

	/* @var \phpbb\config\config */
	protected $config;

	/**
 	 * Constructor
	 *
	 * @param string								$root_path
	 * @param string								$php_ext
	 * @param \phpbb\user							$user
	 * @param \phpbb\config\config					$config
	 */
	public function __construct($root_path, $php_ext, \phpbb\user $user, \phpbb\config\config $config)
	{
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
		$this->user = $user;
		$this->config = $config;
	}

	/**
	 * Register event
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
		if ($this->user->data['user_id'] == ANONYMOUS && $this->config['kasimi.loginrequired.enabled'] == 1)
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
				// We can't use login_box() here since the user's language hasn't been set up yet
				redirect(sprintf('%sucp.%s?mode=login', $this->root_path, $this->php_ext));
			}
		}
	}

	/**
	 *	Returns true if $page is whilelisted
	 */
	protected function is_exception($page)
	{
		if ($page == 'ucp.' . $this->php_ext)
		{
			return true;
		}
		foreach (explode("\n", $this->config['kasimi.loginrequired.exceptions']) as $exception)
		{
			if (strlen($exception) && $page == $exception)
			{
				return true;
			}
		}
		return false;
	}
}
