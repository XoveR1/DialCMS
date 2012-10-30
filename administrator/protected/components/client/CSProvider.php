<?php

/**
 * Contains class ClientProvider
 * 
 * @version	$Id: ClientProvider.php 27.10.2012 15:03:12 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * Class for provide client side functions
 */
class CSProvider extends Singleton {

    /**
     * Create instance of client provider
     * @return CSProvider
     */
    public static function instance() {
        return parent::instance();
    }

    /**
     * Core scripts collection
     * @var UploadItemsCollection 
     */
    protected $coreScripts = null;

    /**
     * Upload scripts collection
     * @var UploadItemsCollection 
     */
    protected $uploadScripts = null;

    /**
     * Object with ini messages source
     * @var IniMessageSource 
     */
    protected $iniMessageSource = null;

    /**
     * Object with database messages source
     * @var DbMessageSource 
     */
    protected $dbMessageSource = null;

    /**
     * Object with client confifuration
     * @var ClientConfig 
     */
    protected $clientConfig = null;

    /**
     * Get core scripts collection
     * @return UploadItemsCollection
     */
    public function getCoreScripts() {
        if (is_null($this->coreScripts)) {
            $this->coreScripts = new UploadItemsCollection();
            $scriptsList = Yii::app()->params->scripts['coreScripts'];
            $pathToCoreScripts = Yii::app()->theme->baseUrl . Yii::app()->params->scripts['coreScriptsPath'];
            foreach ($scriptsList as $scriptName) {
                $this->coreScripts->addItem(new UploadItem($pathToCoreScripts . $scriptName));
            }
        }
        return $this->coreScripts;
    }

    /**
     * Get upload scripts collection
     * @return UploadItemsCollection
     */
    public function getUploadScripts() {
        if (is_null($this->uploadScripts)) {
            $this->uploadScripts = new UploadItemsCollection();
            $scriptsList = Yii::app()->params->scripts['uploadScripts'];
            $pathToCoreScripts = Yii::app()->theme->baseUrl . Yii::app()->params->scripts['uploadScriptsPath'];
            foreach ($scriptsList as $scriptName) {
                $this->uploadScripts->addItem(new UploadItem($pathToCoreScripts . $scriptName));
            }
        }
        return $this->uploadScripts;
    }

    /**
     * Create (if not created) and return message source from ini files
     * @return IniMessageSource
     */
    public function getIniFileTranslateSource() {
        if (is_null($this->iniMessageSource)) {
            $this->iniMessageSource = new IniMessageSource();
            $this->iniMessageSource->forceTranslation = true;
            $this->iniMessageSource->init();
        }
        return $this->iniMessageSource;
    }

    /**
     * Create (if not created) and return message source from database table
     * @return DbMessageSource
     */
    public function getDbTranslateSource() {
        if (is_null($this->dbMessageSource)) {
            $this->dbMessageSource = new DbMessageSource();
            $this->dbMessageSource->forceTranslation = true;
            $this->dbMessageSource->init();
        }
        return $this->dbMessageSource;
    }

    /**
     * Show or return json presentation of object
     * @param IConvertible $convertibleObject
     * @param bool $return
     * @return string
     */
    public function showJson(IConvertible $convertibleObject, $return = false) {
        $jsonCode = json_encode($convertibleObject->toPresent());
        if ($return) {
            return $jsonCode;
        }
        header('Content-Type: application/json; charset=utf-8');
        echo $jsonCode;
    }

    /**
     * Get jquery upload item
     * @return UploadItem
     */
    public function getJQueryUploadItem() {
        return new UploadItem(Yii::app()->clientScript->getCoreScriptUrl() . '/jquery.js');
    }

    /**
     * Get instanse of client configuration singleton object with loaded parameters
     * @return ClientConfig
     */
    public function getLoadedClientConfig() {
        if (is_null($this->clientConfig)) {
            $this->clientConfig = ClientConfig::instance();
            $this->clientConfig->setParams(Yii::app()->params->client);
            $this->clientConfig->setParam('sSiteUrl', Yii::app()->baseUrl);
        }
        return $this->clientConfig;
    }

}

?>