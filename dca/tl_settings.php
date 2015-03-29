<?php 

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * @link http://www.contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 *
 * PHP version 5
 * @copyright  Marko Cupic 2013 
 * @author     Marko Cupic 
 * @package    CustomFormField
 * @license    LGPL 
 */

/**
 * Add to palette
 */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{custom_formfield_legend:hide},custom_formfield_validate_key,custom_formfield_vorlaufzeit';

/**
 * Add fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['custom_formfield_validate_key'] = array
(
       'label' => &$GLOBALS['TL_LANG']['tl_settings']['custom_formfield_validate_key'],
       'inputType' => 'text'
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['custom_formfield_vorlaufzeit'] = array
(
       'label' => &$GLOBALS['TL_LANG']['tl_settings']['custom_formfield_vorlaufzeit'],
       'inputType' => 'text',
	'eval' => array('rgxp' => 'digit')
);
