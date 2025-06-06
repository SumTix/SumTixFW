<?php
/**
*
* This file is part of the phpBB Forum Software package.
*
* @copyright (c) phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* For full copyright and license information, please see
* the docs/CREDITS.txt file.
*
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
require($phpbb_root_path . 'common.' . $phpEx);
require($phpbb_root_path . 'includes/functions_user.' . $phpEx);
require($phpbb_root_path . 'includes/functions_module.' . $phpEx);

// Basic parameter data
$id 	= $request->variable('i', '');
$mode	= $request->variable('mode', '');

if (in_array($mode, array('login', 'login_link', 'logout', 'confirm', 'sendpassword', 'activate')))
{
	define('IN_LOGIN', true);
}

if ($mode === 'delete_cookies')
{
	define('SKIP_CHECK_BAN', true);
	define('SKIP_CHECK_DISABLED', true);
}

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('ucp');

// Setting a variable to let the style designer know where he is...
$template->assign_var('S_IN_UCP', true);

$module = new p_master();
$default = false;

// Basic "global" modes
switch ($mode)
{
	case 'activate':
		$module->load('ucp', 'activate');
		$module->display($user->lang['UCP_ACTIVATE']);

		redirect(append_sid("../"));
	break;

	case 'resend_act':
		$module->load('ucp', 'resend');
		$module->display($user->lang['UCP_RESEND']);
	break;

	case 'sendpassword':
		/** @var \phpbb\controller\helper $controller_helper */
		$controller_helper = $phpbb_container->get('controller.helper');

		redirect($controller_helper->route('phpbb_ucp_forgot_password_controller'));
	break;

	case 'register':
		if ($user->data['is_registered'] || isset($_REQUEST['not_agreed']))
		{
			redirect(append_sid("../"));
		}

		$module->load('ucp', 'register');
		$module->display($user->lang['REGISTER']);
	break;

	case 'confirm':
		$module->load('ucp', 'confirm');
	break;

	case 'login':
		if ($user->data['is_registered'])
		{
			redirect(append_sid("../"));
		}

		login_box($request->variable('redirect', "../"));
	break;

	case 'login_link':
		if ($user->data['is_registered'])
		{
			redirect(append_sid("../"));
		}

		$module->load('ucp', 'login_link');
		$module->display($user->lang['UCP_LOGIN_LINK']);
	break;

	case 'logout':
		if ($user->data['user_id'] != ANONYMOUS && $request->is_set('sid') && $request->variable('sid', '') === $user->session_id)
		{
			$user->session_kill();
		}
		else if ($user->data['user_id'] != ANONYMOUS)
		{
			meta_refresh(3, append_sid("../"));

			$message = $user->lang['LOGOUT_FAILED'] . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("../") . '">', '</a> ');
			trigger_error($message);
		}

		redirect(append_sid("../"));
	break;

	case 'terms':
	case 'privacy':

		$message = ($mode == 'terms') ? 'TERMS_OF_USE_CONTENT' : 'PRIVACY_POLICY';
		$title = ($mode == 'terms') ? 'TERMS_USE' : 'PRIVACY';

		if (empty($user->lang[$message]))
		{
			if ($user->data['is_registered'])
			{
				redirect(append_sid("../"));
			}

			login_box();
		}

		$template->set_filenames(array(
			'body'		=> 'ucp_agreement.html')
		);

		// Disable online list
		page_header($user->lang[$title]);

		$template->assign_vars(array(
			'S_AGREEMENT'			=> true,
			'AGREEMENT_TITLE'		=> $user->lang[$title],
			'AGREEMENT_TEXT'		=> sprintf($user->lang[$message], $config['sitename'], generate_board_url()),
			'U_BACK'				=> append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=login'),
			'L_BACK'				=> $user->lang['BACK_TO_PREV'],
		));

		page_footer();

	break;

	case 'delete_cookies':
		/** @var \phpbb\controller\helper $controller_helper */
		$controller_helper = $phpbb_container->get('controller.helper');

		// Redirect to controller
		redirect($controller_helper->route('phpbb_ucp_delete_cookies_controller'));
	break;

	case 'switch_perm':

		$user_id = $request->variable('u', 0);

		$sql = 'SELECT *
			FROM ' . USERS_TABLE . '
			WHERE user_id = ' . (int) $user_id;
		$result = $db->sql_query($sql);
		$user_row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		if (!$auth->acl_get('a_switchperm') || !$user_row || $user_id == $user->data['user_id'] || !check_link_hash($request->variable('hash', ''), 'switchperm'))
		{
			redirect(append_sid("../"));
		}

		include($phpbb_root_path . 'includes/acp/auth.' . $phpEx);

		$auth_admin = new auth_admin();
		if (!$auth_admin->ghost_permissions($user_id, $user->data['user_id']))
		{
			redirect(append_sid("../"));
		}

		$phpbb_log->add('admin', $user->data['user_id'], $user->ip, 'LOG_ACL_TRANSFER_PERMISSIONS', false, array($user_row['username']));

		$message = sprintf($user->lang['PERMISSIONS_TRANSFERRED'], $user_row['username']) . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("../") . '">', '</a>');

		/**
		* Event to run code after permissions are switched
		*
		* @event core.ucp_switch_permissions
		* @var	int		user_id		User ID to switch permission to
		* @var	array	user_row	User data
		* @var	string	message		Success message
		* @since 3.1.11-RC1
		*/
		$vars = array('user_id', 'user_row', 'message');
		extract($phpbb_dispatcher->trigger_event('core.ucp_switch_permissions', compact($vars)));

		trigger_error($message);

	break;

	case 'restore_perm':

		if (!$user->data['user_perm_from'] || !$auth->acl_get('a_switchperm'))
		{
			redirect(append_sid("../"));
		}

		$auth->acl_cache($user->data);

		$sql = 'SELECT username
			FROM ' . USERS_TABLE . '
			WHERE user_id = ' . $user->data['user_perm_from'];
		$result = $db->sql_query($sql);
		$username = $db->sql_fetchfield('username');
		$db->sql_freeresult($result);

		$phpbb_log->add('admin', $user->data['user_id'], $user->ip, 'LOG_ACL_RESTORE_PERMISSIONS', false, array($username));

		$message = $user->lang['PERMISSIONS_RESTORED'] . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("../") . '">', '</a>');

		/**
		* Event to run code after permissions are restored
		*
		* @event core.ucp_restore_permissions
		* @var	string	username	User name
		* @var	string	message		Success message
		* @since 3.1.11-RC1
		*/
		$vars = array('username', 'message');
		extract($phpbb_dispatcher->trigger_event('core.ucp_restore_permissions', compact($vars)));

		trigger_error($message);

	break;

	default:
		$default = true;
	break;
}

// We use this approach because it does not impose large code changes
if (!$default)
{
	return true;
}

// Only registered users can go beyond this point
if (!$user->data['is_registered'])
{
	if ($user->data['is_bot'])
	{
		redirect(append_sid("{$phpbb_root_path}index.$phpEx"));
	}

	if ($id == 'pm' && $mode == 'view' && isset($_GET['p']))
	{
		$redirect_url = append_sid("{$phpbb_root_path}ucp.$phpEx?i=pm&p=" . $request->variable('p', 0));
		login_box($redirect_url, $user->lang['LOGIN_EXPLAIN_UCP']);
	}

	login_box('', $user->lang['LOGIN_EXPLAIN_UCP']);
}

// Instantiate module system and generate list of available modules
$module->list_modules('ucp');

// Check if the zebra module is set
if ($module->is_active('zebra', 'friends'))
{
	// Output listing of friends online
	$update_time = $config['load_online_time'] * 60;

	$sql_ary = array(
		'SELECT'	=> 'u.user_id, u.username, u.username_clean, u.user_colour, MAX(s.session_time) as online_time, MIN(s.session_viewonline) AS viewonline',

		'FROM'		=> array(
			USERS_TABLE		=> 'u',
			ZEBRA_TABLE		=> 'z',
		),

		'LEFT_JOIN'	=> array(
			array(
				'FROM'	=> array(SESSIONS_TABLE => 's'),
				'ON'	=> 's.session_user_id = z.zebra_id',
			),
		),

		'WHERE'		=> 'z.user_id = ' . $user->data['user_id'] . '
			AND z.friend = 1
			AND u.user_id = z.zebra_id',

		'GROUP_BY'	=> 'z.zebra_id, u.user_id, u.username_clean, u.user_colour, u.username',

		'ORDER_BY'	=> 'u.username_clean ASC',
	);

	/**
	* Event to modify the SQL query before listing of friends
	*
	* @event core.ucp_modify_friends_sql
	* @var	array	sql_ary		SQL query array for listing of friends
	*
	* @since 3.2.10-RC1
	* @since 3.3.1-RC1
	*/
	$vars = [
		'sql_ary',
	];
	extract($phpbb_dispatcher->trigger_event('core.ucp_modify_friends_sql', compact($vars)));

	$sql = $db->sql_build_query('SELECT_DISTINCT', $sql_ary);
	$result = $db->sql_query($sql);

	while ($row = $db->sql_fetchrow($result))
	{
		$which = (time() - $update_time < $row['online_time'] && ($row['viewonline'] || $auth->acl_get('u_viewonline'))) ? 'online' : 'offline';

		$tpl_ary = [
			'USER_ID'		=> $row['user_id'],
			'U_PROFILE'		=> get_username_string('profile', $row['user_id'], $row['username'], $row['user_colour']),
			'USER_COLOUR'	=> get_username_string('colour', $row['user_id'], $row['username'], $row['user_colour']),
			'USERNAME'		=> get_username_string('username', $row['user_id'], $row['username'], $row['user_colour']),
			'USERNAME_FULL'	=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour'])
		];

		/**
		* Event to modify the template before listing of friends
		*
		* @event core.ucp_modify_friends_template_vars
		* @var	array	row			friend user row
		* @var	array	tpl_ary		friend template array
		* @var	string	which		friend is 'online' or 'offline'
		*
		* @since 3.2.10-RC1
		* @since 3.3.1-RC1
		*/
		$vars = [
			'row',
			'tpl_ary',
			'which',
		];
		extract($phpbb_dispatcher->trigger_event('core.ucp_modify_friends_template_vars', compact($vars)));

		$template->assign_block_vars("friends_{$which}", $tpl_ary);
	}
	$db->sql_freeresult($result);
}

// Do not display subscribed topics/forums if not allowed
if (!$config['allow_topic_notify'] && !$config['allow_forum_notify'])
{
	$module->set_display('main', 'subscribed', false);
}

/**
* Use this event to enable and disable additional UCP modules
*
* @event core.ucp_display_module_before
* @var	p_master	module	Object holding all modules and their status
* @var	mixed		id		Active module category (can be the int or string)
* @var	string		mode	Active module
* @since 3.1.0-a1
*/
$vars = array('module', 'id', 'mode');
extract($phpbb_dispatcher->trigger_event('core.ucp_display_module_before', compact($vars)));

$template->assign_block_vars('navlinks', array(
	'BREADCRUMB_NAME'	=> $user->lang('UCP'),
	'U_BREADCRUMB'		=> append_sid("{$phpbb_root_path}ucp.$phpEx"),
));

// Select the active module
$module->set_active($id, $mode);

// Load and execute the relevant module
$module->load_active();

// Assign data to the template engine for the list of modules
$module->assign_tpl_vars(append_sid("{$phpbb_root_path}ucp.$phpEx"));

// Generate the page, do not display/query online list
$module->display($module->get_page_title());
