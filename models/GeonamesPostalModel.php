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


use Contao\Database;
use Contao\Model;
use Contao\Model\Collection;

class GeonamesPostalModel extends Model
{
	protected static $strTable = 'tl_geonames_postal';

	/**
	 * Find all items by city
	 *
	 * @param string  $varValue   The city value
	 * @param array   $arrOptions An optional options array
	 *
	 * @return Collection|null A collection of models or null if the title was not found
	 */
	public static function findByCity($varValue, array $arrOptions= [])
	{
		$t = static::$strTable;

		return static::findBy(array("LOWER($t.city) LIKE '" . strval(strtolower($varValue)) . "'"), $arrOptions);
	}

	public static function findDistinctCitiesByCountries(array $arrCountries = ['DE'], array $arrOptions = [])
	{
		$t = static::$strTable;

                $objResult = Database::getInstance()
                    ->prepare("SELECT CAST(city as BINARY) AS city FROM $t WHERE country IN('" . implode("','", $arrCountries) . "') GROUP BY city ORDER BY city")
                    ->execute();

		$arrResult = array();

		if($objResult->numRows < 1) return $arrResult;

		while($objResult->next())
		{
			$arrResult[] = $objResult->city;
		}

		return $arrResult;
	}

}
