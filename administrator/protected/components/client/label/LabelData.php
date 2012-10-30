<?php

/**
 * Contains class LabelData
 * 
 * @version	$Id: LabelData.php 19.10.2012 11:11:51 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * Class for labels data
 */
class LabelData implements IConvertible {

    /**
     * Flag for require initialisation data or not
     * @var bool
     */
    protected $bIsDataInit = false;

    /**
     * Selected language code
     * @var string 
     */
    protected $sSelectedLangCode = '';

    /**
     * Array of language data
     * @var array 
     */
    protected $aLanguages = array();

    /**
     * Get flag for require initialisation data or not
     * @return bool
     */
    public function IsDataInit() {
        return $this->bIsDataInit;
    }

    /**
     * Set flag for require initialisation data or not
     * @param type $bIsDataInit
     * @return \LabelData
     */
    public function setIsDataInit($bIsDataInit) {
        $this->bIsDataInit = $bIsDataInit;
        return $this;
    }

    /**
     * Get selected language code
     * @return type
     */
    public function getSelectedLangCode() {
        return $this->sSelectedLangCode;
    }

    /**
     * Set selected language code
     * @param string $sSelectedLangCode
     * @return \LabelData
     */
    public function setSelectedLangCode($sSelectedLangCode) {
        $this->sSelectedLangCode = $sSelectedLangCode;
        return $this;
    }

    /**
     * Get array with language data objects
     * @return array
     */
    public function getLanguagesArray() {
        return $this->aLanguages;
    }

    /**
     * Set array with language data objects
     * @param array $aLanguages
     * @return \LabelData
     */
    public function setLanguagesArray($aLanguages) {
        $this->aLanguages = $aLanguages;
        return $this;
    }

    /**
     * Convert to object
     * @return \stdClass
     */
    public function toPresent() {
        $object = new stdClass();
        $object->bIsDataInit = $this->bIsDataInit;
        $object->sSelectedLangCode = $this->sSelectedLangCode;
        $object->aLanguages = array();
        $object->aLabels = new stdClass();
        foreach ($this->aLanguages as $oLanguage) {
            $langCode = $oLanguage->getLangCode();
            $object->aLanguages[] = $oLanguage->toPresent();
            $object->aLabels->$langCode = $oLanguage->getLabelsCollection()->toPresent();
        }
        return $object;
    }

}

?>