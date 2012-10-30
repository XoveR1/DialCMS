<?php

/**
 * Contains class Label
 * 
 * @version	$Id: Label.php 24.10.2012 11:20:34 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * This is the model class for table "{{label}}".
 *
 * The followings are the available columns in table '{{label}}':
 * @property int $id
 * @property string $controller_id
 * @property string $key
 * 
 * The followings are the available model relations:
 * @property Controller $controller
 */
class Label extends CActiveRecord {
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Label the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{label}}';
    }
    
    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'controller' => array(self::BELONGS_TO, 'Controller', 'controller_id')
        );
    }
    
}

?>