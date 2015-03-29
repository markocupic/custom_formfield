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
 * Class CustomFormFieldValidateVorlaufzeit
 *
 * @copyright  Marko Cupic 2013 
 * @author     Marko Cupic 
 * @package    CustomFormField
 */
class CustomFormFieldValidateVorlaufzeit extends \System
{
       /**
	 * Vorlauzeit in Tagen
	 * @var integer
	 */
       protected $intVorlaufzeit = 0;
       
       
       public function validateFormField(\Widget $objWidget, $intId)
       { 
              // get the db-entry from database, because $objWidget->rgxp is always! empty if the formfield-type is a calendarfield
              $objDb = \Database::getInstance()->prepare("SELECT * FROM tl_form_field WHERE id=?")->execute((int)$objWidget->id);
 
		if ($objDb->numRows > 0)
		{
                     if ($objDb->rgxp == 'date_validate_vorlaufzeit')
                     {
                            $this->intVorlaufzeit = $GLOBALS['TL_CONFIG']['custom_formfield_vorlaufzeit'] > 0 ? $GLOBALS['TL_CONFIG']['custom_formfield_vorlaufzeit'] : $this->intVorlaufzeit;
       
                            // Validate the date (see #5086)
                            if (!\Validator::isDate($objWidget->value))
                            {
                                   $objWidget->addError($GLOBALS['TL_LANG']['custom_formfield']['invalid_date']);
                                   return $objWidget; 
                            }
                            try
                            {
                                   $objDateInput = new \Date($objWidget->value);
                            }
                            catch (\OutOfBoundsException $e)
                            {
                                   $objWidget->addError($GLOBALS['TL_LANG']['custom_formfield']['invalid_date']);
                                   return $objWidget; 
                            }
                            
                            $objToday = new \Date();
                            $intVorlaufzeit = $this->intVorlaufzeit * 24 * 60 * 60;
                            if ((int) $objDateInput->dayBegin - (int) $objToday->dayBegin < $intVorlaufzeit)
                            {
                                   $objWidget->addError(sprintf($GLOBALS['TL_LANG']['custom_formfield']['invalid_date_2'], $this->intVorlaufzeit));
                                   return $objWidget; 
                            }
                     }
              }
       
              return $objWidget; 
       }
}
