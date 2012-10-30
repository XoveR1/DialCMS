<?php

/**
 * Contains class ClientLink
 * 
 * @version	$Id: ClientLink.php 26.10.2012 12:32:26 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * Class for ajax client link render
 */
class ClientLink {

    /**
     * Delimeter between HTTP url and ajax part
     * @var string
     */
    public static $ajaxUrlDelimiter = '#';

    /**
     * Separator between ajax url parts
     * @var string 
     */
    public static $ajaxUrlItemSeparator = '/';

    /**
     * Convert controller and action name in ajax url.
     * If no one param of function - return empty link to main page.
     * @param string $controllerId Controller id string
     * @param string $actionId Action id string
     * @param array $paramsArray Array with additional params
     * @return string
     */
    public static function toUrl($controllerId = null, $actionId = null, $paramsArray = array()) {
        $returnUrl = self::$ajaxUrlDelimiter;
        if (!is_null($controllerId)) {
            $returnUrl .= self::$ajaxUrlItemSeparator . $controllerId;
        }
        if (!is_null($actionId)) {
            $returnUrl .= self::$ajaxUrlItemSeparator . $actionId;
            if (!is_array($paramsArray)) {
                $paramsArray = array($paramsArray);
            }
            if (count($paramsArray) > 0) {
                $returnUrl .= self::$ajaxUrlItemSeparator .
                        implode(self::$ajaxUrlItemSeparator, $paramsArray);
            }
        }
        $returnUrl .= self::$ajaxUrlItemSeparator;
        return strtolower($returnUrl);
    }

}

?>