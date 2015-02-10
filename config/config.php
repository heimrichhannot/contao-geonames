<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package opengeodb
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */


/**
 * Back end modules
 */
array_insert($GLOBALS['BE_MOD']['system'], 1, array
(
	'geonames' => array
	(
		'tables'       => array('tl_geonames_postal'),
		'icon'         => 'system/modules/geonames/assets/img/icons/world.png',
		'importPostal' => array('HeimrichHannot\Geonames\GeonamesImporter', 'importPostal'),
	)
));

/**
 * Model
 */
$GLOBALS['TL_MODELS']['tl_geonames_postal'] = 'HeimrichHannot\Geonames\GeonamesPostalModel';