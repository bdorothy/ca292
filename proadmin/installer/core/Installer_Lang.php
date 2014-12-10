<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Creativearts - by Creativelab
 *
 * @package		Creativearts
 * @author		Creativelab Dev Team
 * @copyright	Copyright (c) 2003 - 2014, Creativelab, Inc.
 * @license		http://creativelab.com/creativearts/user-guide/license.html
 * @link		http://creativelab.com
 * @since		Version 2.0
 * @filesource
 */

// ------------------------------------------------------------------------


// We've already extended this library in the other app,
// so instead of maintaining the code in both, we'll just
// do an include and create a small meta class that
// CI can instantiate using the proper prefix.

require_once(EE_APPPATH.'core/EE_Lang'.EXT);


// ------------------------------------------------------------------------

/**
 * Creativearts Language Class
 *
 * @package		Creativearts
 * @subpackage	Core
 * @category	Core
 * @author		Creativelab Dev Team
 * @link		http://creativelab.com
 */

class Installer_Lang Extends EE_Lang {

	/**
	 *   Fetch a specific line of text
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	string
	 */
	public function line($which = '', $label = '')
	{
		$line = parent::line($which, $label);

		if (IS_CORE)
		{
			$line = str_replace('Creativearts', 'Creativearts Core', $line);
		}

		return $line;
	}
}


/* End of file Installer_Lang.php */
/* Location: ./system/creativearts/installer/libraries/Installer_Lang.php */