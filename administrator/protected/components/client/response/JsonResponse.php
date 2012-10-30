<?php

/**
 * Contains class JsonResponse
 * 
 * @version	$Id: JsonResponse.php 17.10.2012 16:59:22 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * Class for response to client
 */
class JsonResponse implements IConvertible {

    /**
     * Current page title
     * @var string 
     */
    protected $sPageTitle = '';

    /**
     * Html template for view model
     * @var string 
     */
    protected $sViewHtml = '';

    /**
     * Object with path to javascript view model 
     * @var UploadItem 
     */
    protected $sModelUrl = null;

    /**
     * Collection of upload items
     * @var UploadItemsCollection 
     */
    protected $aUploadItems = null;

    /**
     * Navigation object with control links
     * @var Navigation 
     */
    protected $oNavigation = null;

    /**
     * Object with language and labels data
     * @var LabelData
     */
    protected $oLabelsData = null;

    /**
     * Get current page title
     * @return string
     */
    public function getPageTitle() {
        return $this->sPageTitle;
    }

    /**
     * Set current page title
     * @param string $sPageTitle
     * @return \JsonResponse
     */
    public function setPageTitle($sPageTitle) {
        $this->sPageTitle = $sPageTitle;
        return $this;
    }

    /**
     * Get object with path to javascript view model 
     * @return UploadItem
     */
    public function getModelUrl() {
        return $this->sModelUrl;
    }

    /**
     * Set object with path to javascript view model 
     * @param UploadItem $sModelUrl
     * @return \JsonResponse
     */
    public function setModelUrl(UploadItem $sModelUrl) {
        $this->sModelUrl = $sModelUrl;
        return $this;
    }

    /**
     * Get collection of upload items
     * @return UploadItemsCollection
     */
    public function getUploadItems() {
        return $this->aUploadItems;
    }

    /**
     * Set collection of upload items
     * @param UploadItemsCollection $aUploadItems
     * @return \JsonResponse
     */
    public function setUploadItems($aUploadItems) {
        $this->aUploadItems = $aUploadItems;
        return $this;
    }

    /**
     * Get html template for view model
     * @return string
     */
    public function getViewHtml() {
        return $this->sViewHtml;
    }

    /**
     * Set html template for view model
     * @param string $sViewHtml
     * @return \JsonResponse
     */
    public function setViewHtml($sViewHtml) {
        $this->sViewHtml = $sViewHtml;
        return $this;
    }

    /**
     * Get navigation object with control links
     * @return Navigation
     */
    public function getNavigation() {
        return $this->oNavigation;
    }

    /**
     * Set navigation object with control links
     * @param Navigation $oNavigation
     * @return \JsonResponse
     */
    public function setNavigation(Navigation $oNavigation) {
        $this->oNavigation = $oNavigation;
        return $this;
    }

    /**
     * Get object with language and labels data
     * @return LabelData
     */
    public function getLabelsData() {
        return $this->oLabelsData;
    }

    /**
     * Set object with language and labels data
     * @param LabelData $oLabelsData
     * @return \JsonResponse
     */
    public function setLabelsData(LabelData $oLabelsData) {
        $this->oLabelsData = $oLabelsData;
        return $this;
    }

    /**
     * Convert to object
     * @return \stdClass
     */
    public function toPresent() {
        $object = new stdClass();
        $object->sPageTitle = $this->sPageTitle;
        $object->sViewHtml = $this->sViewHtml;

        if (!is_null($this->sModelUrl)) {
            $object->sModelUrl = $this->sModelUrl->getUrlToItem();
        }
        if (!is_null($this->aUploadItems)) {
            $object->aUploadItems = $this->aUploadItems->toPresent();
        }
        if (!is_null($this->oNavigation)) {
            $object->oNavigation = $this->oNavigation->toPresent();
        }
        if (!is_null($this->oLabelsData)) {
            $object->oLabelsData = $this->oLabelsData->toPresent();
        }
        return $object;
    }

}

?>