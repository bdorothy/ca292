<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

/**
 * Creativearts Installation and Update Javascript Class
 *
 * @package		Creativearts
 * @subpackage	Core
 * @category	Core
 * @author		Creativelab Dev Team
 * @link		http://creativelab.com
 */
class Javascript {

	/**
	 * Constructor
	 */
	function __construct()
	{
		$file = EE_APPPATH.'javascript/compressed/jquery/jquery.js';

		$contents = file_get_contents($file);

		header('Content-Length: '.strlen($contents));
		header("Content-type: text/javascript");
		exit($contents);
	}

	// --------------------------------------------------------------------

}

// END Javascript class


/* End of file javascript.php */
/* Location: ./system/creativearts/installer/controllers/javascript.php */