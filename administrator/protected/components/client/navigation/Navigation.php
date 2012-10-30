<?php

/**
 * Contains class Navigation
 * 
 * @version	$Id: Navigation.php 18.10.2012 9:32:38 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * Class for navigation data
 */
class Navigation implements IConvertible {

    /**
     * Title of site
     * @var NavViewItem 
     */
    protected $oSiteTitle;

    /**
     * Collection of navigation items
     * @var NavViewItemsCollection
     */
    protected $aNavItems;

    /**
     * User profile navigation item with link to user profile
     * @var NavViewItem
     */
    protected $oUserProfile;

    /**
     * Exit link
     * @var NavViewItem 
     */
    protected $oExit;

    /**
     * Get title of site
     * @return NavViewItem
     */

    public function getSiteTitle() {
        return $this->oSiteTitle;
    }

    /**
     * Set title of site
     * @param NavViewItem $oSiteTitle
     * @return \Navigation
     */
    public function setSiteTitle(NavViewItem $oSiteTitle) {
        $this->oSiteTitle = $oSiteTitle;
        return $this;
    }

    /**
     * Get collection of navigation items
     * @return NavViewItemsCollection
     */
    public function getNavItems() {
        return $this->aNavItems;
    }

    /**
     * Set collection of navigation items
     * @param NavViewItemsCollection $aNavItems
     * @return \Navigation
     */
    public function setNavItems(NavViewItemsCollection $aNavItems) {
        $this->aNavItems = $aNavItems;
        return $this;
    }

    /**
     * Get user profile navigation item with link to user profile
     * @return NavViewItem
     */
    public function getUserProfile() {
        return $this->oUserProfile;
    }

    /**
     * Set user profile navigation item with link to user profile
     * @param NavViewItem $oUserProfile
     * @return \Navigation
     */
    public function setUserProfile(NavViewItem $oUserProfile) {
        $this->oUserProfile = $oUserProfile;
        return $this;
    }

    /**
     * Get exit link
     * @return NavViewItem
     */
    public function getExit() {
        return $this->oExit;
    }

    /**
     * Set exit link
     * @param NavViewItem $oExit
     * @return \Navigation
     */
    public function setExit(NavViewItem $oExit) {
        $this->oExit = $oExit;
        return $this;
    }

    /**
     * Convert to object
     * @return \stdClass
     */
    public function toPresent() {
        $object = new stdClass();
        $object->oSiteTitle = $this->oSiteTitle->toPresent();
        $object->aNavItems = $this->aNavItems->toPresent();
        $object->oUserProfile = $this->oUserProfile->toPresent();
        $object->oExit = $this->oExit->toPresent();
        return $object;
    }

}

?>