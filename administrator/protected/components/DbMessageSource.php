<?php

/**
 * Contains class DbMessageSource
 * 
 * @version	$Id: IniMessageSource.php 24.10.2012 12:57:51 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * Class for load messages from db
 */
class DbMessageSource extends CMessageSource {

    const CACHE_KEY_PREFIX = 'Yii.DbMessageSource.';

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
     * Load messages from ini file
     * @param string $category Category name (controller name)
     * @param string $language Language code like 'ru-RU', 'en-EN', ...
     * @return array Array with category messages
     */
    protected function loadMessages($category, $language) {
        $messages = array();

        if ($this->cachingDuration > 0 && $this->cacheID !== false &&
                ($cache = Yii::app()->getComponent($this->cacheID)) !== null) {
            $key = self::CACHE_KEY_PREFIX . $category;
            if (($data = $cache->get($key)) !== false) {
                return unserialize($data);
            }
        }

        $labelsArray = Label::model()->with('controller')->
                findAll('controller.name = :name', array(':name' => $category));
        $labelIdArray = array();
        foreach ($labelsArray as $labelObject) {
            $labelIdArray[] = $labelObject->id;
        }
        $criteria = new CDbCriteria();
        $criteria->compare('language.code', $language);
        $criteria->compare('label_id', $labelIdArray);
        $messagesArray = Translate::model()->with('language', 'label')->findAll($criteria);
        if (count($messagesArray) > 0) {
            foreach ($messagesArray as $messageData) {
                $messages[$messageData->label->key] = $messageData->value;
            }
        }

        if (isset($cache)) {
            $dependency = new CFileCacheDependency($category . $language);
            $cache->set($key, serialize($messages), $this->cachingDuration, $dependency);
        }
        return $messages;
    }

}

?>