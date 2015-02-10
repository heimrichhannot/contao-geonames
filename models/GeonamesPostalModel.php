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


class GeonamesPostalModel extends \Model
{
	protected static $strTable = 'tl_geonames_postal';

	/**
	 * Find all items by city
	 *
	 * @param string  $varValue   The city value
	 * @param array   $arrOptions An optional options array
	 *
	 * @return \Model\Collection|null A collection of models or null if the title was not found
	 */
	public static function findByCity($varValue, array $arrOptions=array())
	{
		$t = static::$strTable;

		return static::findBy(array("LOWER($t.city) LIKE '" . strval(strtolower($varValue)) . "'"), $arrOptions);
	}

}