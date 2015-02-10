<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package calendar_dav
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

namespace HeimrichHannot\Geonames;

define('GEONAMES_POSTAL_COL_COUNTRY', 'country code');
define('GEONAMES_POSTAL_COL_POSTAL', 'postal code');
define('GEONAMES_POSTAL_COL_CITY', 'place name');
define('GEONAMES_POSTAL_COL_STATE', 'admin name1');
define('GEONAMES_POSTAL_COL_STATE_CODE', 'admin code1');
define('GEONAMES_POSTAL_COL_COUNTY', 'admin name2');
define('GEONAMES_POSTAL_COL_COUNTY_CODE', 'admin code2');
define('GEONAMES_POSTAL_COL_COMMUNITY', 'admin name3');
define('GEONAMES_POSTAL_COL_COMMUNITY_CODE', 'admin code3');
define('GEONAMES_POSTAL_COL_LATITUDE', 'latitude');
define('GEONAMES_POSTAL_COL_LONGITUDE', 'longitude');
define('GEONAMES_POSTAL_COL_ACCURACY', 'accuracy');


class GeonamesPostalImporter extends GeonamesImporterEntity
{
	protected $arrColumns = array
	(
		GEONAMES_POSTAL_COL_COUNTRY,
		GEONAMES_POSTAL_COL_POSTAL,
		GEONAMES_POSTAL_COL_CITY,
		GEONAMES_POSTAL_COL_STATE,
		GEONAMES_POSTAL_COL_STATE_CODE,
		GEONAMES_POSTAL_COL_COUNTY,
		GEONAMES_POSTAL_COL_COUNTY_CODE,
		GEONAMES_POSTAL_COL_COMMUNITY,
		GEONAMES_POSTAL_COL_COMMUNITY_CODE,
		GEONAMES_POSTAL_COL_LATITUDE,
		GEONAMES_POSTAL_COL_LONGITUDE,
		GEONAMES_POSTAL_COL_ACCURACY
	);

	protected $arrRequired = array
	(
		GEONAMES_POSTAL_COL_COUNTRY,
		GEONAMES_POSTAL_COL_POSTAL,
		GEONAMES_POSTAL_COL_CITY,
		GEONAMES_POSTAL_COL_STATE,
		GEONAMES_POSTAL_COL_STATE_CODE,
		GEONAMES_POSTAL_COL_LATITUDE,
		GEONAMES_POSTAL_COL_LONGITUDE,
	);

	protected $strLogFile = 'geonames_postal_import.log';

	protected function getValidValue($arrData, $column, $rowIndex)
	{
		$return = false;

		switch($column)
		{
			default:
				$return = $arrData[$column];
		}

		return $return;
	}

	protected function itemSaved($arrData, $rowIndex)
	{
		$objItem = new \HeimrichHannot\Geonames\GeonamesPostalModel();

		// default values
		$objItem->tstamp = time();
		$objItem->published = 1;

		$objItem->country = $arrData[GEONAMES_POSTAL_COL_COUNTRY];
		$objItem->postal = $arrData[GEONAMES_POSTAL_COL_POSTAL];
		$objItem->city = $this->getValidValue($arrData, GEONAMES_POSTAL_COL_CITY, $rowIndex);
		$objItem->state = $this->getValidValue($arrData, GEONAMES_POSTAL_COL_STATE, $rowIndex);
		$objItem->stateCode = $this->getValidValue($arrData, GEONAMES_POSTAL_COL_STATE_CODE, $rowIndex);
		$objItem->county = $this->getValidValue($arrData, GEONAMES_POSTAL_COL_COUNTY, $rowIndex);
		$objItem->countyCode = $this->getValidValue($arrData, GEONAMES_POSTAL_COL_COUNTY_CODE, $rowIndex);
		$objItem->community = $this->getValidValue($arrData, GEONAMES_POSTAL_COL_COMMUNITY, $rowIndex);
		$objItem->communityCode = $this->getValidValue($arrData, GEONAMES_POSTAL_COL_COMMUNITY_CODE, $rowIndex);
		$objItem->latitude = $arrData[GEONAMES_POSTAL_COL_LATITUDE];
		$objItem->longitude = $arrData[GEONAMES_POSTAL_COL_LONGITUDE];
		$objItem->accuracy = $arrData[GEONAMES_POSTAL_COL_ACCURACY];

		$this->arrInserted[] = array
		(
			'msg'  => 'Inserted item ID ' . $objItem->id . ' (' . $objItem->postal . ' – ' . $objItem->city . ')' ,
			'row'  => $rowIndex,
			'item' => $arrData
		);

		return $objItem->save();
	}



}