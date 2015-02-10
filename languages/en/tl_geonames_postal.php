<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package geonames
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_geonames_postal']['country'] = array('Country code', 'Enter the iso country-code, 2 characters.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['postal'] = array('Postal code', 'Enter the postal code.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['city'] = array('City', 'Enter the place name.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['state'] = array('State', 'Enter the state name.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['stateCode'] = array('State code', 'Enter the state code.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['county'] = array('County', 'Enter the county/province name.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['countyCode'] = array('County code', 'Enter the county/province code.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['community'] = array('Community', 'Enter the community name.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['communityCode'] = array('Community code', 'Enter the community code.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['latitude'] = array('Latitude', 'Enter the estimated latitude (wgs84).');
$GLOBALS['TL_LANG']['tl_geonames_postal']['longitude'] = array('Longitude', 'Enter the estimated longitude (wgs84).');
$GLOBALS['TL_LANG']['tl_geonames_postal']['accuracy'] = array('Accuracy', 'Enter the accuracy of lat/lng from 1=estimated to 6=centroid.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['published'] = array('Publish record', 'Publish record on the website.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_geonames_postal']['config_legend'] = 'Configuration';
$GLOBALS['TL_LANG']['tl_geonames_postal']['publish_legend'] = 'Publication';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_geonames_postal']['new']    = array('New Record', 'Create a new record.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['show']   = array('Record details', 'Show details for record ID %s');
$GLOBALS['TL_LANG']['tl_geonames_postal']['edit']   = array('Edit record ', 'Edit record ID %s');
$GLOBALS['TL_LANG']['tl_geonames_postal']['cut']    = array('Move record', 'Move record ID %s');
$GLOBALS['TL_LANG']['tl_geonames_postal']['copy']   = array('Copy record ', 'Copy record ID %s');
$GLOBALS['TL_LANG']['tl_geonames_postal']['delete'] = array('Delete record', 'Delete record ID %s');
$GLOBALS['TL_LANG']['tl_geonames_postal']['importPostal'] = array('Import records', 'Import new records (http://download.geonames.org/export/zip/).');

/**
 * Import
 */
$GLOBALS['TL_LANG']['tl_geonames_postal']['postalSource'] = array('Postal source file', 'Please upload the csv-file source file for import.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['import'] = array('CSV-import', 'Import postal codes from a csv-file');
$GLOBALS['TL_LANG']['tl_geonames_postal']['importDownloadInfoText'] = 'Note: Please visit the following page <a target="_blank" href="http://download.geonames.org/export/zip/"> http://download.geonames.org/export/zip/</a> and download the proper zip-export for the country.';


// Import Messages
$GLOBALS['TL_LANG']['tl_calendar_events']['confirmEvents'] = "%s records imported.";
$GLOBALS['TL_LANG']['tl_calendar_events']['invalidEvents'] = "%s invalid records were skipped.";
$GLOBALS['TL_LANG']['tl_calendar_events']['insertedEvents'] = "%s records were inserted.";
