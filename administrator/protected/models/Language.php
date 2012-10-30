<?php

/**
 * Contains class Language
 * 
 * @version	$Id: Language.php 22.10.2012 14:07:57 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * This is the model class for table "{{language}}".
 *
 * The followings are the available columns in table '{{language}}':
 * @property int $id
 * @property string $code
 * @property int $name_lid
 * @property bool $default
 * @property int $priority
 *
 * The followings are the available model relations:
 * @property Label $name
 */
class Language extends CActiveRecord {
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Language the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{language}}';
    }
    
    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'name' => array(self::BELONGS_TO, 'Label', 'name_lid'),
        );
    }
    
}

?>