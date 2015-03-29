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

// hooks
$GLOBALS['TL_HOOKS']['validateFormField'][] = array('CustomFormFieldValidateKey', 'validateFormField'); 
$GLOBALS['TL_HOOKS']['validateFormField'][] = array('CustomFormFieldValidateVorlaufzeit', 'validateFormField');
