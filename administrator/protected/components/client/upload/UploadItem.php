<?php

/**
 * Contains class UploadItem
 * 
 * @version	$Id: UploadItem.php 19.10.2012 10:10:18 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * Class for contain data about upload item
 */
class UploadItem implements IConvertible {

    /**
     * Create object with upload item like url to css or js files
     * @param string $urlToItem Url to file for upload in client side
     * @param string $appPath Path to application root folder
     */
    function __construct($urlToItem, $appPath = '') {
        $this->urlToItem = $urlToItem;
        if ($appPath == '') {
            $appPath = $_SERVER['DOCUMENT_ROOT'];
        }
        $this->appPath = $appPath;
    }

    /**
     * Path to application root folder
     * @var string 
     */
    protected $appPath;

    /**
     * Url to file for upload in client side
     * @var string 
     */
    protected $urlToItem;

    /**
     * Calculated size of item for progress bar
     * @var int 
     */
    protected $siseOfItem;

    /**
     * Get path to application root folder
     * @return type
     */
    public function getAppPath() {
        return $this->appPath;
    }

    /**
     * Set path to application root folder
     * @param string $appPath
     * @return \UploadItem
     */
    public function setAppPath($appPath) {
        $this->appPath = $appPath;
        return $this;
    }

    /**
     * Get url to file for upload in client side
     * @return string
     */
    public function getUrlToItem() {
        return $this->urlToItem;
    }

    /**
     * Set url to file for upload in client side
     * @param string $urlToItem
     * @return \UploadItem
     */
    public function setUrlToItem($urlToItem) {
        $this->urlToItem = $urlToItem;
        return $this;
    }

    /**
     * Get calculated size of item for progress bar
     * @return type
     */
    public function getSizeOfItem() {
        if (!$this->siseOfItem) {
            $pathToFile = $this->appPath . $this->urlToItem;
            if (!file_exists($pathToFile)) {
                throw new ErrorException("File {$pathToFile} not exist!");
            }
            $this->siseOfItem = filesize($pathToFile);
        }
        return $this->siseOfItem;
    }

    /**
     * Convert to object
     * @return \stdClass
     */
    public function toPresent() {
        $object = new stdClass();
        $object->sUrl = $this->getUrlToItem();
        $object->iSize = $this->getSizeOfItem();
        return $object;
    }

}

?>