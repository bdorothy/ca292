/*!
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
(function($) {

"use strict";

/**
 * This file always runs dead last.
 *
 * We use it to initialize optional modules
 * that are loaded by our libraries. For example,
 * the table library loads up the table plugin in
 * a datasource is used.
 *
 * That plugin is ultimately bound here.
 */

// ------------------------------------------------------------------------


// Apply ee_table and ee_toggle_all to any tables that want it
$('table').each(function() {
	var config;

	if ($(this).data('table_config')) {
		config = $(this).data('table_config');

		if ( ! $.isPlainObject(config))	{
			config = $.parseJSON(config);
		}

		$(this).table(config);
	}

	// Apply ee_toggle_all only if it's loaded
	if (jQuery().toggle_all)
	{
		$(this).toggle_all();
	}
});

if (EE.registered === false) {
	(function($, w) {

		// use the unregisteredbanner extension to modify the encoded
		// message in unregistered.js then paste here
		if ($("#mainMenu").length) {
			$("body")["prepend"]("\x3c\x64\x69\x76\x20\x63\x6c\x61\x73\x73\x3d\x22\x6e\x61\x6e\x6e\x65\x72\x22\x3e\x3c\x70\x3e\x54\x68\x69\x73\x20\x63\x6f\x70\x79\x20\x6f\x66\x20\x45\x78\x70\x72\x65\x73\x73\x69\x6f\x6e\x45\x6e\x67\x69\x6e\x65\x20\x69\x73\x20\x3c\x73\x74\x72\x6f\x6e\x67\x3e\x75\x6e\x72\x65\x67\x69\x73\x74\x65\x72\x65\x64\x3c\x2f\x73\x74\x72\x6f\x6e\x67\x3e\x2e\x20\x50\x6c\x65\x61\x73\x65\x20\x76\x69\x73\x69\x74\x20\x74\x68\x65\x20\x3c\x61\x20\x68\x72\x65\x66\x3d\x22\x23\x22\x20\x6f\x6e\x63\x6c\x69\x63\x6b\x3d\x22\x6c\x6f\x63\x61\x74\x69\x6f\x6e\x2e\x68\x72\x65\x66\x3d\x45\x45\x2e\x42\x41\x53\x45\x20\x2b\x20\x27\x26\x43\x3d\x61\x64\x6d\x69\x6e\x5f\x73\x79\x73\x74\x65\x6d\x26\x4d\x3d\x73\x6f\x66\x74\x77\x61\x72\x65\x5f\x72\x65\x67\x69\x73\x74\x72\x61\x74\x69\x6f\x6e\x27\x22\x3e\x53\x6f\x66\x74\x77\x61\x72\x65\x20\x52\x65\x67\x69\x73\x74\x72\x61\x74\x69\x6f\x6e\x3c\x2f\x61\x3e\x20\x70\x61\x67\x65\x20\x74\x6f\x20\x65\x6e\x74\x65\x72\x20\x79\x6f\x75\x72\x20\x6c\x69\x63\x65\x6e\x73\x65\x20\x69\x6e\x66\x6f\x72\x6d\x61\x74\x69\x6f\x6e\x2e\x3c\x2f\x70\x3e\x3c\x2f\x64\x69\x76\x3e");
		}

	}(jQuery, this));
}
})(jQuery);
