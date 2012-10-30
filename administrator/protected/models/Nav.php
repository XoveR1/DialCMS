<?php

/**
 * Contains class Nav
 * 
 * @version	$Id: Nav.php 24.10.2012 11:55:20 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * This is the model class for table "{{nav}}".
 *
 * The followings are the available columns in table '{{nav}}':
 * @property int $id
 * @property int $name_lid
 * @property bool $admin
 * 
 * The followings are the available model relations:
 * @property Label $label
 */
class Nav extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Nav the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{nav}}';
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'label' => array(self::BELONGS_TO, 'Label', 'name_lid'),
        );
    }

    /**
     * Get list of navigation items from all available menu
     * @param   bool    $isAdmin    If flag in true load only admin navigation items, 
     *                              otherwise only front
     * @return  array               Array of navigation items
     */
    public function getNavItemsList($isAdmin = true) {
        $navsArray = self::model()->findAll('admin = ' . $isAdmin);
        if (count($navsArray) > 0) {
            $idArray = array();
            foreach ($navsArray as $navData) {
                $idArray[] = $navData->id;
            }
            $criteria = new CDbCriteria();
            $criteria->compare('nav.id', $idArray);
            return NavItem::model()->with('nav', 'parent', 'name', 'title')->findAll($criteria);
        }
    }

}

?>