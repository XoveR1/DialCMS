<?php

/**
 * Contains class Translate
 * 
 * @version	$Id: Translate.php 24.10.2012 11:23:38 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * This is the model class for table "{{translate}}".
 *
 * The followings are the available columns in table '{{translate}}':
 * @property int $id
 * @property int $lang_id
 * @property int $label_id
 * @property string $value
 *
 * The followings are the available model relations:
 * @property Label $label
 * @property Language $language
 */
class Translate extends CActiveRecord{

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
        return '{{translate}}';
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'language' => array(self::BELONGS_TO, 'Language', 'lang_id'),
            'label' => array(self::BELONGS_TO, 'Label', 'label_id'),
        );
    }

}

?>