<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package Geonames
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'HeimrichHannot',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Models
	'HeimrichHannot\Geonames\GeonamesPostalModel'    => 'system/modules/geonames/models/GeonamesPostalModel.php',

	// Classes
	'HeimrichHannot\Geonames\GeonamesImporter'       => 'system/modules/geonames/classes/GeonamesImporter.php',
	'HeimrichHannot\Geonames\GeonamesPostalImporter' => 'system/modules/geonames/classes/GeonamesPostalImporter.php',
	'HeimrichHannot\Geonames\GeonamesImporterEntity' => 'system/modules/geonames/classes/GeonamesImporterEntity.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'be_geonames_import_postal' => 'system/modules/geonames/templates',
));
