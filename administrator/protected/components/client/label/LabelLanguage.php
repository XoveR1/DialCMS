<?php

/**
 * Contains class LabelLanguage
 * 
 * @version	$Id: LabelLanguage.php 19.10.2012 11:21:32 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * Class for language data
 */
class LabelLanguage implements IConvertible {

    /**
     * Create language object with info about language
     * @param string $sLangCode
     * @param string $sLabel
     */
    function __construct($sLangCode, $sLabel) {
        $this->sLangCode = $sLangCode;
        $this->sLabel = $sLabel;
        $this->aLabels = new LabelItemsCollection();
    }

    /**
     * Language code with locale like "en-GB, ru-RU, ..."
     * @var string
     */
    protected $sLangCode;

    /**
     * Label key in uppercase with name of language
     * @var string
     */
    protected $sLabel;

    /**
     * Collection of labels with key-value pairs
     * @var LabelItemsCollection
     */
    protected $aLabels;

    /**
     * Get language code with locale like "en-GB, ru-RU, ..."
     * @return type
     */
    public function getLangCode() {
        return $this->sLangCode;
    }

    /**
     * Set language code with locale like "en-GB, ru-RU, ..."
     * @param string $sLangCode
     * @return \LabelLanguage
     */
    public function setLangCode($sLangCode) {
        $this->sLangCode = $sLangCode;
        return $this;
    }

    /**
     * Get label key in uppercase with name of language
     * @return string
     */
    public function getLabel() {
        return $this->sLabel;
    }

    /**
     * Set label key in uppercase with name of language
     * @param string $sLabel
     * @return \LabelLanguage
     */
    public function setLabel($sLabel) {
        $this->sLabel = $sLabel;
        return $this;
    }

    /**
     * Get collection of labels with key-value pairs
     * @return LabelItemsCollection
     */
    public function getLabelsCollection() {
        return $this->aLabels;
    }

    /**
     * Set collection of labels with key-value pairs
     * @param LabelItemsCollection $aLabels
     * @return \LabelLanguage
     */
    public function setLabelsCollection(LabelItemsCollection $aLabels) {
        $this->aLabels = $aLabels;
        return $this;
    }

    /**
     * Convert to object
     * @return \stdClass
     */
    public function toPresent() {
        $object = new stdClass();
        $object->sLangCode = $this->sLangCode;
        $object->sLabel = $this->sLabel;
        return $object;
    }

}

?>