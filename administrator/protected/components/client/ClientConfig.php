<?php

/**
 * Contains class ClientConfig
 * 
 * @version	$Id: ClientConfig.php 28.10.2012 9:49:19 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * Class for client configuration
 */
class ClientConfig extends Singleton implements IConvertible {

    /**
     * Create instance of client provider
     * @return ClientConfig
     */
    public static function instance() {
        return parent::instance();
    }

    /**
     * Array with configuration parametrs
     * @var array
     */
    protected $paramsArray = array();

    /**
     * Create or update configuration parametr by key and value
     * @param string $paramKey
     * @param mixed $paramValue
     * @return \ClientConfig
     */
    public function setParam($paramKey, $paramValue) {
        $this->paramsArray[$paramKey] = $paramValue;
        return $this;
    }

    /**
     * Merge configuration parameters with key-value array
     * @param array $paramsArray
     * @return \ClientConfig
     */
    public function setParams($paramsArray) {
        $this->paramsArray = array_merge($paramsArray, $this->paramsArray);
        return $this;
    }

    /**
     * Get configuration parametr by key
     * @param string $paramKey
     * @return mixed
     */
    public function getParam($paramKey) {
        return $this->paramsArray[$paramKey];
    }

    /**
     * Remove configuration parametr by key
     * @param string $paramKey
     * @return string
     */
    public function removeParam($paramKey) {
        $paramValue = $this->paramsArray[$paramKey];
        unset($this->paramsArray[$paramKey]);
        return $paramValue;
    }

    /**
     * Convert to configuration object
     * @return \stdClass
     */
    public function toPresent() {
        return $this->toObject($this->paramsArray);
    }

    /**
     * Convert key-value array to object.
     * If name of key in first symbol contains letter 'o' value will convert to object.
     * @param array $paramsArray
     * @return \stdClass
     */
    protected function toObject($paramsArray) {
        $returnObject = new stdClass();
        foreach ($paramsArray as $paramKey => $paramValue) {
            if ($paramKey[0] == 'o') {
                $returnObject->$paramKey = $this->toObject($paramValue);
            } else {
                $returnObject->$paramKey = $paramValue;
            }
        }
        return $returnObject;
    }

}

?>