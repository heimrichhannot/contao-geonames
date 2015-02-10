<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package geonames
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

namespace HeimrichHannot\Geonames;


class GeonamesImporter extends \Backend
{
	public function importPostal(\DataContainer $dc)
	{
		if (\Input::get('key') != 'importPostal') {
			return '';
		}

		$strTemplate = 'be_geonames_import_postal';
		$strFormID   = 'tl_geonames_import_postal';

		$this->import('BackendUser', 'User');
		$class = $this->User->uploader;

		// See #4086 and #7046
		if (!class_exists($class) || $class == 'DropZone') {
			$class = 'FileUpload';
		}

		$objUploader = new $class();

		// Import CSS
		if (\Input::post('FORM_SUBMIT') == $strFormID) {
			$arrUploaded = $objUploader->uploadTo('system/tmp');


			if (empty($arrUploaded)) {
				\Message::addError($GLOBALS['TL_LANG']['ERR']['all_fields']);
				$this->reload();
			}

			$intTotal   = 0;
			$intInvalid = 0;
			$intInserted = 0;

			$arrInvalid = array();
			$arrInserted = array();

			foreach ($arrUploaded as $strCsvFile) {
				$objFile = new \File($strCsvFile, true);

				if (!in_array($objFile->extension, array('csv', 'txt'))) {
					\Message::addError(sprintf($GLOBALS['TL_LANG']['ERR']['filetype'], $objFile->extension));
					continue;
				}

				$arrItems = $this->getItemsFromCsvFile($objFile ,\Input::post('separator'));

				$objImporter = new GeonamesPostalImporter($arrItems);
				$objImporter->run();

				$intTotal += $objImporter->getValidCount();
				$intInvalid += $objImporter->getInvalidCount();
				$intInserted += $objImporter->getInsertedCount();

				$arrInserted = array_merge($arrInserted, $objImporter->getInsertedItems());
				$arrInvalid = array_merge($arrInvalid, $objImporter->getInvalidItems());
			}

			\Message::addConfirmation(sprintf($GLOBALS['TL_LANG']['tl_geonames_postal']['confirmPromoters'], $intTotal));

			if ($intInvalid > 0) {
				\Message::addError(sprintf($GLOBALS['TL_LANG']['tl_geonames_postal']['invalidPromoters'], $intInvalid));

				foreach($arrInvalid as $arrEntry)
				{
					\Message::addError('Row: '. $arrEntry['row'] . ' – ' . $arrEntry['msg']);
				}
			}

			if ($intInserted > 0) {
				\Message::addConfirmation(sprintf($GLOBALS['TL_LANG']['tl_geonames_postal']['insertedPromoters'], $intInserted));

				foreach($arrInserted as $arrEntry)
				{
					\Message::addConfirmation('Row: '. $arrEntry['row'] . ' – ' . $arrEntry['msg']);
				}
			}


			\System::setCookie('BE_PAGE_OFFSET', 0, 0);
			$this->reload();
		}


		$objT              = new \BackendTemplate($strTemplate);
		$objT->action      = ampersand(\Environment::get('request'), true);
		$objT->formID      = $strFormID;
		$objT->objUploader = $objUploader;
		$objT->back        = ampersand(str_replace('&key=importPostal', '', \Environment::get('request')));
		$objT->submitText  = specialchars($GLOBALS['TL_LANG']['tl_geonames_postal']['import'][0]);

		// Return form
		return $objT->parse();
	}

	protected function getItemsFromCsvFile(\File $objFile, $strDelimiter)
	{
		// Get separator
		switch ($strDelimiter) {
			case 'semicolon':
				$strSeparator = ';';
				break;

			case 'tabulator':
				$strSeparator = "\t";
				break;

			case 'linebreak':
				$strSeparator = "\n";
				break;

			default:
				$strSeparator = ',';
				break;
		}

		$arrItems = array();
		$resFile  = $objFile->handle;

		while (($arrRow = @fgetcsv($resFile, null, $strSeparator)) !== false) {
			$arrItems[] = $arrRow;
		}

		return $arrItems;
	}

}