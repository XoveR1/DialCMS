<?php

/**
 * Contains class NavItem
 * 
 * @version	$Id: NavItem.php 24.10.2012 12:04:43 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * This is the model class for table "{{nav_item}}".
 *
 * The followings are the available columns in table '{{nav_item}}':
 * @property int $id
 * @property int $nav_id
 * @property int $pid
 * @property int $name_lid
 * @property string $href
 * @property int $title_lid
 * @property int $priority
 * 
 * The followings are the available model relations:
 * @property Nav $nav
 * @property NavItem $parent
 * @property Label $name
 * @property Label $title
 */
class NavItem extends CActiveRecord {
    
     /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return NavItem the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{nav_item}}';
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'nav' => array(self::BELONGS_TO, 'Nav', 'nav_id'),
            'parent' => array(self::BELONGS_TO, 'NavItem', 'pid'),
            'name' => array(self::BELONGS_TO, 'Label', 'name_lid'),
            'title' => array(self::BELONGS_TO, 'Label', 'title_lid'),
        );
    }
    
}

?>