<?php

/**
 * Contains class Controller
 * 
 * @version	$Id: Controller.php 24.10.2012 13:40:23 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * This is the model class for table "{{controller}}".
 *
 * The followings are the available columns in table '{{controller}}':
 * @property int $id
 * @property string $name
 *
 */
class Controller extends CActiveRecord {
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Controller the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{controller}}';
    }
    
}

?>