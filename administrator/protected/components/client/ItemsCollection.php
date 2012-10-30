<?php

/**
 * Contains class ItemsCollection
 * 
 * @version	$Id: ItemsCollection.php 19.10.2012 10:39:35 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * Abstract class for items collection
 */
abstract class ItemsCollection implements IConvertible {

    /**
     * Array with collection data
     * @var array 
     */
    protected $collection = array();

    /**
     * Add collection item
     * @param IConvertible $item Collection item
     * @param int|string $key Name or key of item
     * @return ItemsCollection
     */
    public function addItem(IConvertible $item, $key = null) {
        if (is_null($key)) {
            $this->collection[] = $item;
        } else {
            $this->collection[$key] = $item;
        }
        return $this;
    }

    /**
     * Get item from collection by key
     * @param int|string $key
     * @return IConvertible
     */
    public function getItem($key) {
        return $this->collection[$key];
    }

    /**
     * Remove item from collection by key
     * @param int|string $key
     * @return IConvertible Removed item
     */
    public function removeItem($key) {
        $oldItem = $this->collection[$key];
        unset($this->collection[$key]);
        return $oldItem;
    }

    /**
     * Get array with collection
     * @return array
     */
    public function getCollection() {
        return $this->collection;
    }

    /**
     * Convert collection to array
     * @return array
     */
    public function toPresent() {
        $returnedArray = array();
        foreach ($this->collection as $item) {
            $returnedArray[] = $item->toPresent();
        }
        return $returnedArray;
    }

}

?>