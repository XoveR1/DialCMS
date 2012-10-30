<?php

/**
 * Contains class IniMessageSource
 * 
 * @version	$Id: IniMessageSource.php 24.10.2012 12:57:51 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * Class for load messages from file
 */
class IniMessageSource extends CMessageSource {
    
    public function __construct() {
        $this->basePath = Yii::app()->basePath . DIRECTORY_SEPARATOR . 'messages';
    }

    const CACHE_KEY_PREFIX = 'Yii.IniMessageSource.';

    /**
     * @var integer the time in seconds that the messages can remain valid in cache.
     * Defaults to 0, meaning the caching is disabled.
     */
    public $cachingDuration = 0;

    /**
     * @var string the ID of the cache application component that is used to cache the messages.
     * Defaults to 'cache' which refers to the primary cache application component.
     * Set this property to false if you want to disable caching the messages.
     */
    public $cacheID = 'cache';

    /**
     * @var string the base path for all translated messages. Defaults to null, meaning
     * the "messages" subdirectory of the application directory (e.g. "protected/messages").
     */
    public $basePath = '';
    private $_files = array();

    /**
     * Get path to translate file
     * @param string $category
     * @param string $language
     * @return string
     */
    protected function getMessageFile($category, $language) {
        if (!isset($this->_files[$category][$language])) {
            $this->_files[$category][$language] = $this->basePath . DIRECTORY_SEPARATOR . $language . DIRECTORY_SEPARATOR . $category . '.ini';
        }
        return $this->_files[$category][$language];
    }

    /**
     * Load messages from ini file
     * @param string $category Category name (controller name)
     * @param string $language Language code like 'ru-RU', 'en-EN', ...
     * @return array Array with category messages
     */
    protected function loadMessages($category, $language) {
        $messageFile = $this->getMessageFile($category, $language);

        if ($this->cachingDuration > 0 && $this->cacheID !== false && ($cache = Yii::app()->getComponent($this->cacheID)) !== null) {
            $key = self::CACHE_KEY_PREFIX . $messageFile;
            if (($data = $cache->get($key)) !== false)
                return unserialize($data);
        }

        if (is_file($messageFile)) {
            $messages = parse_ini_file($messageFile);
            if (!is_array($messages))
                $messages = array();
            if (isset($cache)) {
                $dependency = new CFileCacheDependency($messageFile);
                $cache->set($key, serialize($messages), $this->cachingDuration, $dependency);
            }
            return $messages;
        } else {
            return array();
        }
    }

}

?>