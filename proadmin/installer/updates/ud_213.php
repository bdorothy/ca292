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
		ee()->load->library('layout');

		$layouts = ee()->db->get('layout_publish');

		if ($layouts->num_rows() === 0)
		{
			return TRUE;
		}

		$layouts = $layouts->result_array();

		foreach ($layouts as &$layout)
		{
			$old_layout = unserialize($layout['field_layout']);

			foreach ($old_layout as $tab => &$fields)
			{
				$field_keys = array_keys($fields);

				foreach ($field_keys as &$key)
				{
					if ($key == 'channel')
					{
						$key = 'new_channel';
					}
				}

				$fields = array_combine($field_keys, $fields);
			}

			$layout['field_layout'] = serialize($old_layout);

		}

		ee()->db->update_batch('layout_publish', $layouts, 'layout_id');

		return TRUE;
	}
}
/* END CLASS */

/* End of file ud_213.php */
/* Location: ./system/creativearts/installer/updates/ud_213.php */