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


abstract class GeonamesImporterEntity extends \Controller
{

	protected $arrColumns = array();

	protected $arrRequired = array();

	protected $arrItems = array();

	protected $intValid = 0;

	protected $arrInvalid = array();

	protected $arrUpdated = array();

	protected $arrInserted = array();

	protected $strLogFile = 'geonames_import.log';

	protected $intInvalid = 0;

	protected $logFailures = true;

	protected $logUpdates = true;

	protected $logInserts = true;

	public function __construct($arrItems)
	{
		$this->arrItems = $arrItems;
	}

	public function run()
	{
		foreach ($this->arrItems as $rowIndex => $arrRow) {

			$arrData = $this->prepareRow($arrRow);

			if (!$this->validateRow($arrRow, $arrData)) continue;

			if (!$this->itemSaved($arrData, $rowIndex)) continue;

			$this->intValid++;
		}

		// log
		if ($this->logInserts) $this->writeMessagesToLog($this->arrInserted);
		if ($this->logUpdates) $this->writeMessagesToLog($this->arrUpdated);
		if ($this->logFailures) $this->writeMessagesToLog($this->arrInvalid);
	}

	protected function writeMessagesToLog($arrMessages)
	{
		foreach ($arrMessages as $arrEntry) {
			log_message('Row: ' . $arrEntry['row'] . ' – ' . $arrEntry['msg'], $this->strLogFile);
		}
	}

	protected function validateRow($arrRow, $rowIndex)
	{
		$isValid = true;

		if (count($arrRow) != count($this->arrColumns)) {
			$this->intInvalid++;
			$this->arrInvalid[] = array
			(
				'msg'  => 'Invalid count of columns',
				'row'  => $rowIndex,
				'item' => $arrRow
			);

			$isValid = false;
		}

		// ensure required fields are not empty
		foreach ($this->arrRequired as $rKey => $col) {

			if($key = array_search($col, $this->arrColumns) === false) continue;

			if (isset($arrRow[$key]) && $arrRow[$key] == '0') {
				continue;
			}

			if (!isset($arrRow[$key]) || empty($arrRow[$key]) || $arrRow[$key] == '') {
				$this->intInvalid++;
				$this->arrInvalid[] = array
				(
					'msg'  => 'Required column ' . $this->arrColumns[$key] . ' is empty',
					'row'  => $rowIndex,
					'item' => $arrRow
				);

				$isValid = false;
			}
		}

		return $isValid;
	}

	abstract protected function itemSaved($arrData, $rowIndex);

	protected function prepareRow($arrRow)
	{
		// set keys from $this->arrColumns
		foreach ($this->arrColumns as $key => $col) {
			$valueOfCol = trim($arrRow[$key]);

			if ($valueOfCol && $valueOfCol != "") {
				$arrData[$col] = $valueOfCol;
			}
		}

		return $arrData;
	}


	protected static function getConstantName($constantNumber, $category='GEONAMES_')
	{
		foreach (get_defined_constants() as $key => $value){
			if (strlen($key) > strlen($category)) {
				if (substr($key, 0, strlen($category)) == $category){
					if ($value == $constantNumber) return $key;
				}
			}
		}

		return false;
	}

	public function getInsertedItems()
	{
		return $this->arrInserted;
	}

	public function getUpdatedItems()
	{
		return $this->arrUpdated;
	}

	public function getInvalidItems()
	{
		return $this->arrInvalid;
	}

	public function getInsertedCount()
	{
		return count($this->arrInserted);
	}

	public function getUpdatedCount()
	{
		return count($this->arrUpdated);
	}

	public function getValidCount()
	{
		return $this->intValid;
	}

	public function getInvalidCount()
	{
		return $this->intInvalid;
	}
}