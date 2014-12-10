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

		ee()->smartforge->drop_key('channel_data', 'weblog_id');

		ee()->smartforge->add_key('channel_data', 'channel_id');

		ee()->smartforge->drop_key('channel_titles', 'weblog_id');

		ee()->smartforge->add_key('channel_titles', 'channel_id');

		return TRUE;
	}
}
/* END CLASS */

/* End of file ud_214.php */
/* Location: ./system/creativearts/installer/updates/ud_214.php */