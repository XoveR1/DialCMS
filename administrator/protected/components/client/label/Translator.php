<?php

/**
 * Contains class Translator
 * 
 * @version	$Id: Translator.php 22.10.2012 10:26:18 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * Class for calculate translate labels for client side
 */
class Translator {

    protected function __construct() {
        
    }

    /**
     * Array with labels for translate from database
     * @var array 
     */
    protected static $tFromDBArray = array();

    /**
     * Array with labels for translate from file
     * @var array 
     */
    protected static $tFromFileArray = array();

    /**
     * Translate from ini file source
     * @param string $labelName Uppercase label value
     * @param array $params Array with params see here
     * @see Yii::t()
     * @return string Value of label from ini file
     */
    public static function _($labelName, $params = array(), $categoryName = null) {
        if (is_null($categoryName)) {
            $categoryName = Yii::app()->controller->id;
        }
        return Yii::t($categoryName, $labelName, $params, 'IniMessageSource'); 
               // CSProvider::instance()->getIniFileTranslateSource());
    }

    /**
     * Adds label in array for translate from file
     * @param string $labelName Label in appercase
     * @return string
     */
    public static function TFromFile($labelName) {
        self::$tFromFileArray[] = $labelName;
        return $labelName;
    }

    /**
     * Adds label in array for translate from database
     * @param string $labelName Label in appercase
     * @return string
     */
    public static function TFromDb($labelName) {
        self::$tFromDBArray[] = $labelName;
        return $labelName;
    }

    /**
     * Load all registred labels from ini file
     * @return array
     */
    public static function loadFromFile() {
        $translatedArray = array();
        $categoryName = Yii::app()->controller->id;
        $selectedLang = Yii::app()->language;
        if (count(self::$tFromFileArray) > 0) {
            $iniFileTranslateSource = CSProvider::instance()->getIniFileTranslateSource();
            foreach (self::$tFromFileArray as $labelKey) {
                $translatedArray[$labelKey] = $iniFileTranslateSource
                        ->translate($categoryName, $labelKey, $selectedLang);
            }
        }
        return $translatedArray;
    }

    /**
     * Load all registred labels from database
     * @return array
     */
    public static function loadFromDb() {
        $translatedArray = array();
        $categoryName = Yii::app()->controller->id;
        $selectedLang = Yii::app()->language;
        if (count(self::$tFromDBArray) > 0) {
            $dbTranslateSource = CSProvider::instance()->getDbTranslateSource();
            foreach (self::$tFromDBArray as $labelKey) {
                $translatedArray[$labelKey] = $dbTranslateSource
                        ->translate($categoryName, $labelKey, $selectedLang);
            }
        }
        return $translatedArray;
    }

}

?>