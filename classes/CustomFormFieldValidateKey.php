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
 * Run in a custom namespace, so the class can be replaced
 */
namespace MCupic;

/**
 * Class CustomFormFieldValidateKey 
 *
 * @copyright  Marko Cupic 2013 
 * @author     Marko Cupic 
 * @package    CustomFormField
 */
class CustomFormFieldValidateKey extends \System
{
       /**
        * Prüfziffer
	 * @var string
	 */
       protected $strPruefziffer;
       
	public function validateFormField(\Widget $objWidget, $intId)
	{ 
		// get the db-entry from database, because $objWidget->rgxp is sometimes! empty if the formfield-type is a calendarfield
              $objDb = \Database::getInstance()->prepare("SELECT * FROM tl_form_field WHERE id=?")->execute((int)$objWidget->id);
 
		if ($objDb->numRows > 0)
		{
			if ($objDb->rgxp == 'validate_key')
                     {
                     	$this->strPruefziffer =  strlen((string) $GLOBALS['TL_CONFIG']['custom_formfield_validate_key']) ? (string) $GLOBALS['TL_CONFIG']['custom_formfield_validate_key'] : '';
                     	if ($this->strPruefziffer == '')
                            {
                                   return $objWidget; 
                            }
                            
                            if ($this->strPruefziffer !== (string) $objWidget->value) 
                     	{ 
                            	$objWidget->addError($GLOBALS['TL_LANG']['custom_formfield']['invalid_key'] ); 
                     	} 
              	}
		}
              return $objWidget; 
       }
}