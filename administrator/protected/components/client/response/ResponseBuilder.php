<?php

/**
 * Contains class ResponseBuilder
 * 
 * @version	$Id: ResponseBuilder.php 19.10.2012 10:01:36 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * Class for build
 */
class ResponseBuilder {

    function __construct($viewModelHtml) {
        $this->responseObject = new JsonResponse();
        $this->viewModelHtml = $viewModelHtml;
    }

    /**
     * Json response object
     * @var JsonResponse 
     */
    protected $responseObject;
    protected $viewModelHtml;

    public function buildInitResponse() {
        $this->buildPageTitle();
        $this->buildModelUrl();
        $this->buildViewModel();
        $this->buildNavigation();
        $this->buildLabelsData();
        return $this->responseObject;
    }

    protected function buildPageTitle() {
        $sPageTitle = Yii::app()->controller->pageTitle;
        $this->responseObject->setPageTitle($sPageTitle);
    }

    protected function buildViewModel() {
        $this->responseObject->setViewHtml($this->viewModelHtml);
    }

    protected function buildNavTree($navItemsList, NavViewItemsCollection $navItemsCollection, NavItem $parent = null) {
        $inTreeNavItems = array();
        foreach ($navItemsList as $navIndex => $navItem) {
            if (is_null($navItem->parent) || $navItem->parent->name->key == $parent->name->key) {
                $navViewItem = new NavViewItem($navItem->href, Translator::TFromDb($navItem->name->key));
                $navItemsCollection->addItem($navViewItem);
                $inTreeNavItems[] = $navItem;
                unset($navItemsList[$navIndex]);
            }
        }

        foreach ($inTreeNavItems as $navIndex => $navItem) {
            if (count($navItemsList) > 0) {
                $subNavItemsCollection = $navItemsCollection->getItem($navIndex)
                        ->setSubItems(new NavViewItemsCollection())
                        ->getSubItems();
                $this->buildNavTree($navItemsList, $subNavItemsCollection, $navItem);
            }
        }
    }

    protected function buildNavigation() {
        $navigation = new Navigation();
        $navItemsCollection = new NavViewItemsCollection();

        $navItemsList = Nav::model()->getNavItemsList();
        $this->buildNavTree($navItemsList, $navItemsCollection);

        $siteTitle = new NavViewItem(ClientLink::toUrl(),
                        Translator::TFromFile(Yii::app()->name));

        $userProfileLink = ClientLink::toUrl('user', 'profile', Yii::app()->user->name);
        $userProfile = new NavViewItem($userProfileLink,
                        Translator::TFromFile('GREETING_USER'));
        $userProfile->setParam('name', Yii::app()->user->name);

        $logoutItem = new NavViewItem(ClientLink::toUrl('site', 'logout'),
                        Translator::TFromFile('SIGN_OUT'));

        $navigation->setSiteTitle($siteTitle)
                ->setNavItems($navItemsCollection)
                ->setUserProfile($userProfile)
                ->setExit($logoutItem);

        $this->responseObject->setNavigation($navigation);
    }

    protected function buildModelUrl() {
        $sModelUrl = Yii::app()->theme->baseUrl . '/js/models/' .
                Yii::app()->controller->id . '/' .
                Yii::app()->controller->action->id . '.js';
        $this->responseObject->setModelUrl(new UploadItem($sModelUrl));
    }

    protected function buildLabelsData() {
        $labelsData = new LabelData();
        $labelsData->setIsDataInit(true);
        $languageArray = Language::model()->with('name')->findAll();
        $aLanguages = array();
        if (count($languageArray) > 0) {
            foreach ($languageArray as $langData) {
                $oLanguage = new LabelLanguage($langData->code, Translator::TFromDb($langData->name->key));
                if ($oLanguage->getLangCode() == Yii::app()->language) {
                    $labelsArray = array_merge(Translator::loadFromDb(), Translator::loadFromFile());
                    if (count($labelsArray) > 0) {
                        $labelsCollection = new LabelItemsCollection();
                        foreach ($labelsArray as $labelKey => $labelValue) {
                            $labelsCollection->addItem(new LabelItem($labelKey, $labelValue));
                        }
                        $oLanguage->setLabelsCollection($labelsCollection);
                    }
                }
                $aLanguages[] = $oLanguage;
            }
        }
        $labelsData->setLanguagesArray($aLanguages);
        $this->responseObject->setLabelsData($labelsData);
    }

}

?>