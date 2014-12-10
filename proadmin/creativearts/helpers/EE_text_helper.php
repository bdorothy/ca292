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
 * Creativearts Text Helper
 *
 * @package		Creativearts
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Creativelab Dev Team
 * @link		http://creativelab.com
 */

// ------------------------------------------------------------------------


 /**
 * Convert Accented Foreign Characters to ASCII
 *
 * We extend this so an EE extension hook can be used
 *
 * @access	public
 * @param	string	the text string
 * @return	string
 */
if ( ! function_exists('convert_accented_characters'))
{
	function convert_accented_characters($match)
	{
		if ( ! file_exists(APPPATH.'config/foreign_chars.php'))
		{
			return $match;
		}

		include APPPATH.'config/foreign_chars.php';

		$CI =& get_instance();

		/* -------------------------------------
		/*  'foreign_character_conversion_array' hook.
		/*  - Allows you to use your own foreign character conversion array
		/*  - Added 1.6.0
		* 	- Note: in 2.0, you can edit the foreign_chars.php config file as well
		*/
			if (isset($CI->extensions->extensions['foreign_character_conversion_array']))
			{
				$foreign_characters = $CI->extensions->call('foreign_character_conversion_array');
			}
		/*
		/* -------------------------------------*/

		if ( ! isset($foreign_characters))
		{
			return $match;
		}

		$ord = ord($match['1']);

		if (isset($foreign_characters[$ord]))
		{
			return $foreign_characters[$ord];
		}
		else
		{
			return $match['1'];
		}
	}
}

// ------------------------------------------------------------------------


/* End of file EE_text_helper.php */
/* Location: ./system/creativearts/helpers/EE_text_helper.php */