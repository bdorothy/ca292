<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Creativearts - by Creativelab
 *
 * @package		Creativearts
 * @author		Creativelab Dev Team
 * @copyright	Copyright (c) 2003 - 2014, Creativelab, Inc.
 * @license		http://creativelab.com/creativearts/user-guide/license.html
 * @link		http://creativelab.com
 * @since		Version 2.7.2
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
				'_clean_quick_tabs',
			)
		);

		foreach ($steps as $k => $v)
		{
			$this->$v();
		}

		return TRUE;
	}

	/**
	 * Clean up the quick tab links so they no longer have index.php and session
	 * ID in them
	 *
	 * NOTE: This is duplicated from the 2.7.0 updater because it originally
	 * only checked for index.php, but the user could be using admin.php or
	 * anything-else-in-the-world.php
	 *
	 * @return void
	 */
	protected function _clean_quick_tabs()
	{
		$members = ee()->db->select('member_id, quick_tabs')
			->where('quick_tabs IS NOT NULL')
			->like('quick_tabs', '.php')
			->get('members')
			->result_array();

		if ( ! empty($members))
		{
			foreach ($members as $index => $member)
			{
				$members[$index]['quick_tabs'] = $this->_clean_quick_tab_links($member['quick_tabs']);
			}

			ee()->db->update_batch('members', $members, 'member_id');
		}
	}

	// -------------------------------------------------------------------

	/**
	 * Remove the index.php and Session ID from quick tabs
	 * @param  string $string Quick Tab string
	 * @return string         Cleaned up quick tab string
	 */
	private function _clean_quick_tab_links($string)
	{
		// Each string is comprised of multiple links broken up by newlines
		$lines = explode("\n", $string);

		foreach ($lines as $index => $line)
		{
			// Each link is three parts, the first being the name (which is
			// where we're concerned about XSS cleaning), the link, the order
			$links = explode('|', $line);
			$links[1] = substr($links[1], stripos($links[1], 'C='));
			$lines[$index] = implode('|', $links);
		}

		return implode("\n", $lines);
	}
}
/* END CLASS */

/* End of file ud_272.php */
/* Location: ./system/creativearts/installer/updates/ud_272.php */