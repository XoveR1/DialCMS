<?php

/**
 * Contains class NavViewItem
 * 
 * @version	$Id: NavViewItem.php 18.10.2012 9:39:27 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * Class for navigation item data
 */
class NavViewItem implements IConvertible {

    /**
     * Create navigation item with href attribute and label
     * @param string $sHref
     * @param string $sLabel
     */
    function __construct($sHref, $sLabel) {
        $this->sHref = $sHref;
        $this->sLabel = $sLabel;
    }

    /**
     * Href attribute of navigation item
     * @var string 
     */
    protected $sHref = '';

    /**
     * Label text of navigation item
     * @var string 
     */
    protected $sLabel = '';

    /**
     * Is active flag of navigation item
     * @var bool 
     */
    protected $bIsActive = null;

    /**
     * Target attribute of navigation item
     * @var string 
     */
    protected $sTarget = '';

    /**
     * Navigation items collection
     * @var NavViewItemsCollection 
     */
    protected $aSubItems = null;

    /**
     * Array of additional attributes to navigation item
     * @var array 
     */
    protected $aParams = array();

    /**
     * Get href attribute of navigation item
     * @return string
     */
    public function getHref() {
        return $this->sHref;
    }

    /**
     * Set href attribute of navigation item
     * @param string $sHref
     * @return \NavViewItem
     */
    public function setHref($sHref) {
        $this->sHref = $sHref;
        return $this;
    }

    /**
     * Get label text of navigation item
     * @return string
     */
    public function getLabel() {
        return $this->sLabel;
    }

    /**
     * Set label text of navigation item
     * @param string $sLabel
     * @return \NavViewItem
     */
    public function setLabel($sLabel) {
        $this->sLabel = $sLabel;
        return $this;
    }

    /**
     * Get is active flag of navigation item
     * @return bool
     */
    public function getIsActive() {
        return $this->bIsActive;
    }

    /**
     * Set is active flag of navigation item
     * @param bool $bIsActive
     * @return \NavViewItem
     */
    public function setIsActive($bIsActive) {
        $this->bIsActive = $bIsActive;
        return $this;
    }

    /**
     * Get target attribute of navigation item
     * @return string
     */
    public function getTarget() {
        return $this->sTarget;
    }

    /**
     * Set target attribute of navigation item
     * @param string $sTarget
     * @return \NavViewItem
     */
    public function setTarget($sTarget) {
        $this->sTarget = $sTarget;
        return $this;
    }

    /**
     * Get navigation items collection
     * @return NavViewItemsCollection
     */
    public function getSubItems() {
        return $this->aSubItems;
    }

    /**
     * Set navigation items collection
     * @param NavViewItemsCollection $aSubItems
     * @return \NavViewItem
     */
    public function setSubItems(NavViewItemsCollection $aSubItems) {
        $this->aSubItems = $aSubItems;
        return $this;
    }

    /**
     * Get value of additional attribute by name
     * @param string $sParamKey Name of param
     * @return string
     */
    public function getParam($sParamKey) {
        return $this->aParams[$sParamKey];
    }

    /**
     * Get array of additional attributes to navigation item
     * @return array
     */
    public function getParams() {
        return $this->aParams;
    }

    /**
     * Set additional attributes to navigation item
     * @param string $sParamKey Name of additional attribute
     * @param string $sParamValue Value of additional attribute
     * @return \NavViewItem
     */
    public function setParam($sParamKey, $sParamValue) {
        $this->aParams[$sParamKey] = $sParamValue;
        return $this;
    }

    /**
     * Convert to object
     * @return \stdClass
     */
    public function toPresent() {
        $object = new stdClass();
        $object->sHref = $this->sHref;
        $object->sLabel = $this->sLabel;
        $object->bIsActive = $this->bIsActive;
        if ($this->sTarget !== '') {
            $object->sTarget = $this->sTarget;
        }
        if (!is_null($this->aSubItems)) {
            $object->aSubItems = $this->aSubItems->toPresent();
        }
        if (count($this->aParams) > 0) {
            foreach ($this->aParams as $key => $value) {
                $object->$key = $value;
            }
        }
        return $object;
    }
    
    public function __toString() {
        return $this->sLabel;
    }

}

?>