<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package tl_geonames_postal
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

/**
 * Table tl_geonames_postal
 */
$GLOBALS['TL_DCA']['tl_geonames_postal'] = array
(

	// Config
	'config'      => array
	(
		'dataContainer'    => 'Table',
		'switchToEdit'     => true,
		'enableVersioning' => true,
		'onload_callback'  => array
		(
			array('tl_geonames_postal', 'checkPermission'),
		),
		'sql'              => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),

	// List
	'list'        => array
	(
		'sorting'           => array
		(
			'mode'        => 1,
			'fields'      => array('postal', 'city'),
			'flag'        => 1,
			'panelLayout' => 'filter;search,limit'
		),
		'label'             => array
		(
			'fields' => array('postal', 'city'),
			'format' => '%s – %s'
		),
		'global_operations' => array
		(
			'importPostal' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_geonames_postal']['importPostal'],
				'href'                => 'key=importPostal',
				'class'               => 'header_theme_import',
				'button_callback'     => array('tl_geonames_postal', 'importPostal')
			),
			'all' => array
			(
				'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'       => 'act=select',
				'class'      => 'header_edit_all',
				'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			),
		),
		'operations'        => array
		(
			'edit'   => array
			(
				'label'           => &$GLOBALS['TL_LANG']['tl_geonames_postal']['edit'],
				'href'            => 'act=edit',
				'icon'            => 'edit.gif',
				'button_callback' => array('tl_geonames_postal', 'editItem')
			),
			'copy'   => array
			(
				'label'           => &$GLOBALS['TL_LANG']['tl_geonames_postal']['copy'],
				'href'            => 'act=copy',
				'icon'            => 'copy.gif',
				'button_callback' => array('tl_geonames_postal', 'copyItem')
			),
			'delete' => array
			(
				'label'           => &$GLOBALS['TL_LANG']['tl_geonames_postal']['delete'],
				'href'            => 'act=delete',
				'icon'            => 'delete.gif',
				'attributes'      => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
				'button_callback' => array('tl_geonames_postal', 'deleteItem')
			),
			'toggle' => array
			(
				'label'           => &$GLOBALS['TL_LANG']['tl_geonames_postal']['toggle'],
				'icon'            => 'visible.gif',
				'attributes'      => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
				'button_callback' => array('tl_geonames_postal', 'toggleIcon')
			),
			'show'   => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_geonames_postal']['show'],
				'href'  => 'act=show',
				'icon'  => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes'    => array
	(
		'default' => '{config_legend},country,postal,city,state,stateCode,county,countyCode,community,communityCode,latitude,longitude,accuracy;{publish_legend},published'
	),

	// Subpalettes
	'subpalettes' => array
	(),

	// Fields
	'fields'      => array
	(
		'id'            => array
		(
			'sql' => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp'        => array
		(
			'sql' => "int(10) unsigned NOT NULL default '0'"
		),
		'country'       => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_geonames_postal']['country'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'text',
			'eval'      => array('mandatory' => true, 'maxlength' => 2),
			'sql'       => "varchar(2) NOT NULL default ''"
		),
		'postal'        => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_geonames_postal']['postal'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'text',
			'eval'      => array('mandatory' => true, 'maxlength' => 20),
			'sql'       => "varchar(20) NOT NULL default ''"
		),
		'city'          => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_geonames_postal']['city'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'text',
			'eval'      => array('mandatory' => true, 'maxlength' => 180),
			'sql'       => "varchar(180) NOT NULL default ''"
		),
		'state'         => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_geonames_postal']['state'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'text',
			'eval'      => array('mandatory' => true, 'maxlength' => 100),
			'sql'       => "varchar(100) NOT NULL default ''"
		),
		'stateCode'     => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_geonames_postal']['stateCode'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'text',
			'eval'      => array('mandatory' => true, 'maxlength' => 20),
			'sql'       => "varchar(20) NOT NULL default ''"
		),
		'county'        => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_geonames_postal']['county'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'text',
			'eval'      => array('maxlength' => 100),
			'sql'       => "varchar(100) NOT NULL default ''"
		),
		'countyCode'    => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_geonames_postal']['countyCode'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'text',
			'eval'      => array('maxlength' => 20),
			'sql'       => "varchar(20) NOT NULL default ''"
		),
		'community'     => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_geonames_postal']['community'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'text',
			'eval'      => array('maxlength' => 100),
			'sql'       => "varchar(100) NOT NULL default ''"
		),
		'communityCode' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_geonames_postal']['communityCode'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'text',
			'eval'      => array('maxlength' => 20),
			'sql'       => "varchar(20) NOT NULL default ''"
		),
		'latitude'      => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_geonames_postal']['latitude'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'text',
			'eval'      => array('mandatory' => true, 'maxlength' => 16, 'rgxp' => 'digit'),
			'sql'       => "float(10,6) unsigned NOT NULL default '0.000000'",
		),
		'longitude'     => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_geonames_postal']['longitude'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'text',
			'eval'      => array('mandatory' => true, 'maxlength' => 16, 'rgxp' => 'digit'),
			'sql'       => "float(10,6) unsigned NOT NULL default '0.000000'",
		),
		'accuracy'      => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_geonames_postal']['accuracy'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'text',
			'eval'      => array('maxlength' => 1, 'rgxp' => 'digit'),
			'sql'       => "int(1) unsigned NOT NULL default '0'"
		),
		'published'     => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_geonames_postal']['published'],
			'exclude'   => true,
			'filter'    => true,
			'flag'      => 2,
			'inputType' => 'checkbox',
			'eval'      => array('doNotCopy' => true),
			'sql'       => "char(1) NOT NULL default ''"
		),
	)
);


/**
 * Class tl_geonames_postal
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package dav_areasoflaw
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */
class tl_geonames_postal extends Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}


	/**
	 * Check permissions to edit table tl_geonames_postal
	 */
	public function checkPermission()
	{

		if ($this->User->isAdmin) {
			return;
		}

		// TODO
	}


	/**
	 * Return the edit header button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function editItem($row, $href, $label, $title, $icon, $attributes)
	{
		return $this->User->canEditFieldsOf('tl_geonames_postal') ? '<a href="' . $this->addToUrl($href . '&amp;id=' . $row['id']) . '" title="' . specialchars($title) . '"' . $attributes . '>' . Image::getHtml($icon, $label) . '</a> ' : Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)) . ' ';
	}


	/**
	 * Return the copy item button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function copyItem($row, $href, $label, $title, $icon, $attributes)
	{
		return $this->User->hasAccess('create', 'areasoflawp') ? '<a href="' . $this->addToUrl($href . '&amp;id=' . $row['id']) . '" title="' . specialchars($title) . '"' . $attributes . '>' . Image::getHtml($icon, $label) . '</a> ' : Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)) . ' ';
	}


	/**
	 * Return the delete item button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function deleteItem($row, $href, $label, $title, $icon, $attributes)
	{
		return $this->User->hasAccess('delete', 'areasoflawp') ? '<a href="' . $this->addToUrl($href . '&amp;id=' . $row['id']) . '" title="' . specialchars($title) . '"' . $attributes . '>' . Image::getHtml($icon, $label) . '</a> ' : Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)) . ' ';
	}

	/**
	 * Return the "toggle visibility" button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
	{
		if (strlen(Input::get('tid'))) {
			$this->toggleVisibility(Input::get('tid'), (Input::get('state') == 1), (@func_get_arg(12) ?: null));
			$this->redirect($this->getReferer());
		}

		// Check permissions AFTER checking the tid, so hacking attempts are logged
		if (!$this->User->hasAccess('tl_geonames_postal::published', 'alexf')) {
			return '';
		}

		$href .= '&amp;tid=' . $row['id'] . '&amp;state=' . ($row['published'] ? '' : 1);

		if (!$row['published']) {
			$icon = 'invisible.gif';
		}

		return '<a href="' . $this->addToUrl($href) . '" title="' . specialchars($title) . '"' . $attributes . '>' . Image::getHtml($icon, $label) . '</a> ';
	}


	/**
	 * Disable/enable a promoter
	 * @param integer
	 * @param boolean
	 * @param \DataContainer
	 */
	public function toggleVisibility($intId, $blnVisible, DataContainer $dc = null)
	{
		// Check permissions to edit
		Input::setGet('id', $intId);
		Input::setGet('act', 'toggle');
		$this->checkPermission();

		// Check permissions to publish
		if (!$this->User->hasAccess('tl_geonames_postal::published', 'alexf')) {
			$this->log('Not enough permissions to publish/unpublish areasoflaw ID "' . $intId . '"', __METHOD__, TL_ERROR);
			$this->redirect('contao/main.php?act=error');
		}

		$objVersions = new Versions('tl_geonames_postal', $intId);
		$objVersions->initialize();

		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA']['tl_geonames_postal']['fields']['published']['save_callback'])) {
			foreach ($GLOBALS['TL_DCA']['tl_geonames_postal']['fields']['published']['save_callback'] as $callback) {
				if (is_array($callback)) {
					$this->import($callback[0]);
					$blnVisible = $this->$callback[0]->$callback[1]($blnVisible, ($dc ?: $this));
				} elseif (is_callable($callback)) {
					$blnVisible = $callback($blnVisible, ($dc ?: $this));
				}
			}
		}

		// Update the database
		$this->Database->prepare("UPDATE tl_geonames_postal SET tstamp=" . time() . ", published='" . ($blnVisible ? 1 : '') . "' WHERE id=?")
			->execute($intId);

		$objVersions->create();
		$this->log('A new version of record "tl_geonames_postal.id=' . $intId . '" has been created' . $this->getParentEntries('tl_geonames_postal', $intId), __METHOD__, TL_GENERAL);
	}

	/**
	 * Return the "import theme" link
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function importPostal($href, $label, $title, $class, $attributes)
	{
		return $this->User->hasAccess('postal_import', 'geonamep') ? '<a href="'.$this->addToUrl($href).'" class="'.$class.'" title="'.specialchars($title).'"'.$attributes.'>'.$label.'</a> ' : '';
	}
}
