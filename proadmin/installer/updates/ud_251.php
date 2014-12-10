<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Creativearts - by Creativelab
 *
 * @package		Creativearts
 * @author		Creativelab Dev Team
 * @copyright	Copyright (c) 2003 - 2014, Creativelab, Inc.
 * @license		http://creativelab.com/creativearts/user-guide/license.html
 * @link		http://creativelab.com
 * @since		Version 2.5
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Creativearts Update Class
 *
 * @package		Creativearts
 * @subpackage	Core
 * @category	Core
 * @author		Creativelab Dev Team
 * @link		http://creativelab.com
 */
class Updater {

	var $version_suffix = '';

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();
	}

	// --------------------------------------------------------------------

	/**
	 * Do Update
	 *
	 * @return TRUE
	 */
	public function do_update()
	{
		$steps = new ProgressIterator(
			array(
				'_update_ip_address_length',
			)
		);

		foreach ($steps as $k => $v)
		{
			$this->$v();
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	private function _update_ip_address_length()
	{
		ee()->load->dbforge();

		$tables = array('sessions', 'throttle', 'online_users',
			'security_hashes', 'captcha', 'password_lockout',
			'email_console_cache', 'members', 'channel_titles',
			'channel_entries_autosave', 'cp_log', 'member_search',
			'remember_me');

		foreach ($tables as $table)
		{
			$column_settings = array(
				'ip_address' => array(
					'name' 			=> 'ip_address',
					'type' 			=> 'varchar',
					'constraint' 	=> 45,
					'default'		=> '0',
					'null'			=> FALSE
				)
			);

			if ($table == 'remember_me')
			{
				unset($column_settings['ip_address']['null']);
			}

			ee()->smartforge->modify_column($table, $column_settings);
		}
	}
}
/* END CLASS */

/* End of file ud_251.php */
/* Location: ./system/creativearts/installer/updates/ud_251.php */