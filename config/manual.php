<?php defined('SYSPATH') OR die('Direct access is never permitted.');

return array(
	'modules' => array(
		/** 
		 * This should be the path to this modules manual pages, 
		 * without the 'manual/'. Ex: '/manual/modulename/' would be 'modulename'.
		 */
		'mustache' => array(
			// Whether this modules manual pages should be shown.
			'enabled' => TRUE,

			// The name that should show up on the manual index page.
			'name' => 'Mustache',

			// A short description of this module, shown on the index page.
			'description' => 'Utilizing mustache.',

			// Icon file.
			'icon' => '/gfx/modules/mustache.gif',

			// Version of this module.
			'version' => '1.0.0',

			// Copyright message, shown in the footer for this module.
			'copyright' => '&copy; '.date('Y').' Viper Framework',
		),
	),
);
