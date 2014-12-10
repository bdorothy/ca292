<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Creativearts - by Creativelab
 *
 * @package		Creativearts
 * @author		Creativelab Dev Team
 * @copyright	Copyright (c) 2003 - 2014, Creativelab, Inc.
 * @license		http://creativelab.com/creativearts/user-guide/license.html
 * @link		http://creativelab.com
 * @since		Version 2.7.3
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
	 * Do Update
	 *
	 * @return TRUE
	 */
	public function do_update()
	{
		ee()->load->dbforge();

		$steps = new ProgressIterator(
			array(
				'_update_email_db_columns',
			)
		);

		foreach ($steps as $k => $v)
		{
			$this->$v();
		}
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Change email columns to varchar(75)
	 * @return void
	 */
	private function _update_email_db_columns()
	{
		$changes = array(
			'members' => 'email',
			'email_cache' => 'from_email',
			'email_console_cache' => 'recipient',
		);

		foreach ($changes as $table => $column)
		{
			ee()->smartforge->modify_column(
				$table,
				array(
					$column => array(
						'name' 			=> $column,
						'type' 			=> 'VARCHAR',
						'constraint' 	=> 75,
						'null' 			=> FALSE
					)
				)
			);
		}
	}
}
/* END CLASS */

/* End of file ud_273.php */
/* Location: ./system/creativearts/installer/updates/ud_273.php */