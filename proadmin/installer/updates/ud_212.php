<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Creativearts - by Creativelab
 *
 * @package     Creativearts
 * @author      Creativelab Dev Team
 * @copyright   Copyright (c) 2003 - 2014, Creativelab, Inc.
 * @license     http://creativelab.com/creativearts/user-guide/license.html
 * @link        http://creativelab.com
 * @since       Version 2.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Creativearts Update Class
 *
 * @package     Creativearts
 * @subpackage  Core
 * @category    Core
 * @author      Creativelab Dev Team
 * @link        http://creativelab.com
 */
class Updater {

	var $version_suffix = '';

    function Updater()
    {
        $this->EE =& get_instance();
    }

    function do_update()
    {
		$fields = array(
			'show_sidebar' 	=> array(
				'type'			=> 'char',
				'constraint'	=> 1,
				'null'			=> FALSE,
				'default'		=> 'n'
			)
		);

		ee()->smartforge->add_column('members', $fields, 'quick_tabs');


		$fields = array(
			'm_field_cp_reg' 	=> array(
				'type'			=> 'char',
				'constraint'	=> 1,
				'null'			=> FALSE,
				'default'		=> 'n'
			)
		);

		ee()->smartforge->add_column('member_fields', $fields, 'm_field_reg');


		$fields = array(
			'member_groups' 	=> array(
				'name'			=> 'member_groups',
				'type'			=> 'varchar',
				'constraint'	=> 255,
				'null'			=> FALSE
			)
		);

		ee()->smartforge->modify_column('accessories', $fields);


		$fields = array(
			'can_edit_html_buttons' 	=> array(
				'type'			=> 'char',
				'constraint'	=> 1,
				'null'			=> FALSE,
				'default'		=> 'n'
			)
		);

		ee()->smartforge->add_column('member_groups', $fields, 'can_view_profiles');

		ee()->db->set('can_edit_html_buttons', 'y');
		ee()->db->where('can_access_cp', 'y');
		ee()->db->update('member_groups');


		if (ee()->db->table_exists('comments'))
		{
			ee()->db->set('location', '');
			ee()->db->where('location', '0');
			ee()->db->update('comments');
		}

		// Remove allow_multi_emails from config
		ee()->config->_update_config(array(), array('allow_multi_emails' => ''));

		return TRUE;
	}
}
/* END CLASS */

/* End of file ud_212.php */
/* Location: ./system/creativearts/installer/updates/ud_212.php */