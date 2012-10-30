<?php

/**
 * This is the model class for table "{{role}}".
 *
 * @property string $id
 * @property string $name
 */
class Role extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{role}}';
    }

}