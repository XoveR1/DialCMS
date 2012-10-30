<?php

/**
 * Contains class LabelItem
 * 
 * @version	$Id: LabelItem.php 19.10.2012 11:24:38 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * Class for label data contain
 */
class LabelItem implements IConvertible {

    /**
     * Create new label
     * @param string $sKey
     * @param string $sValue
     */
    function __construct($sKey, $sValue) {
        $this->sKey = $sKey;
        $this->sValue = $sValue;
    }

    /**
     * Key of label in uppercase 
     * @var string 
     */
    protected $sKey;

    /**
     * Value of label
     * @var type 
     */
    protected $sValue;
    
    /**
     * Get key of label
     * @return string
     */
    public function getKey() {
        return $this->sKey;
    }

    /**
     * Set key of label
     * @param string $sKey
     * @return \LabelItem
     */
    public function setKey($sKey) {
        $this->sKey = $sKey;
        return $this;
    }

    /**
     * Get value of label
     * @return string
     */
    public function getSValue() {
        return $this->sValue;
    }

    /**
     * Set value of label
     * @param string $sValue
     * @return \LabelItem
     */
    public function setSValue($sValue) {
        $this->sValue = $sValue;
        return $this;
    }
    
    /**
     * Convert to object
     * @return \stdClass
     */
    public function toPresent() {
        $object = new stdClass();
        $object->sKey = $this->sKey;
        $object->sValue = $this->sValue;
        return $object;
    }

}

?>