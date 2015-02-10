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
$GLOBALS['TL_LANG']['tl_geonames_postal']['country'] = array('Land', 'Geben Sie ein Land an (ISO-Format).');
$GLOBALS['TL_LANG']['tl_geonames_postal']['postal'] = array('Postleitzahl', 'Geben Sie eine Postleitzahl an.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['city'] = array('Stadt', 'Geben Sie eine Stadt an.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['state'] = array('Bundesland', 'Geben Sie ein Bundesland an.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['stateCode'] = array('Bundesland Code', 'Geben Sie den Code des Bundeslandes an.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['county'] = array('Landkreis', 'Geben Sie einen Landkreis an.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['countyCode'] = array('Landkreis Code', 'Geben Sie den Code des Landkreises an.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['community'] = array('Gemeinde', 'Geben Sie eine Gemeinde an.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['communityCode'] = array('Gemeinde Code', 'Geben Sie den Code der Gemeinde an.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['latitude'] = array('Breitengrad', 'Geben Sie den Breitengrad an.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['longitude'] = array('Längengrad', 'Geben Sie den Längengrad an.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['accuracy'] = array('Genauigkeit', 'Geben Sie die Genauigkeit von Längen- und Breitengrad an (1 (geschätzt) - 6 (Schwerpunkt).');
$GLOBALS['TL_LANG']['tl_geonames_postal']['published'] = array('Datensatz veröffentlichen', 'Den Datensatz auf der Webseite anzeigen.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_geonames_postal']['config_legend'] = 'Konfiguration';
$GLOBALS['TL_LANG']['tl_geonames_postal']['publish_legend'] = 'Veröffentlichung';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_geonames_postal']['new']    = array('Neuer Datensatz', 'Einen neuen Datensatz erstellen.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['show']   = array('Datensatzdetails', 'Details des Datensatzes ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_geonames_postal']['edit']   = array('Datensatz bearbeiten ', 'Datensatz ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_geonames_postal']['cut']    = array('Datensatz verschieben', 'Verschieben des Datensatzes ID %s');
$GLOBALS['TL_LANG']['tl_geonames_postal']['copy']   = array('Datensatz kopieren ', 'Kopieren des Datensatzes ID %s');
$GLOBALS['TL_LANG']['tl_geonames_postal']['delete'] = array('Datensatz löschen', 'Löschen des Datensatzes ID %s');
$GLOBALS['TL_LANG']['tl_geonames_postal']['importPostal'] = array('Datensätze Importieren', 'Neue Datensätze importieren (http://download.geonames.org/export/zip/).');

/**
 * Import
 */
$GLOBALS['TL_LANG']['tl_geonames_postal']['postalSource'] = array('Postleitzahlen Quelldatei', 'Bitte laden Sie die zu importierenden CSV-Dateien hoch.');
$GLOBALS['TL_LANG']['tl_geonames_postal']['import'] = array('CSV-Import', 'Postleitzahlen aus einer CSV-Datei importieren');
$GLOBALS['TL_LANG']['tl_geonames_postal']['importDownloadInfoText'] = 'Hinweis: Bitte besuchen Sie folgende Seite <a href="http://download.geonames.org/export/zip/" target="_blank">http://download.geonames.org/export/zip/</a> und laden Sie den Postleitzahlen-Export für das entsprechende Land herunter.';


// Import Messages
$GLOBALS['TL_LANG']['tl_calendar_events']['confirmEvents'] = "%s Datensätze wurden importiert.";
$GLOBALS['TL_LANG']['tl_calendar_events']['invalidEvents'] = "%s ungültige Datensätze wurden übersprungen.";
$GLOBALS['TL_LANG']['tl_calendar_events']['insertedEvents'] = "%s Datensätze wurden neu erstellt.";