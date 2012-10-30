<?php

/**
 * Contains class ClientController
 * 
 * @version	$Id: ClientController.php 22.10.2012 11:06:35 Z slava.poddubsky $
 * @package	DialCMS
 * @subpackage	App
 * @copyright	Copyright (C) 2012, Inc. All rights reserved.
 * @license	see LICENSE.txt
 */

/**
 * Class for server side control of client application
 */
class ClientController extends JsonController {

    public function actionInit() {
        $this->render('init');
    }

    public function actionQuery() {
        
        echo '<pre>';
        print_r($tree);
        echo '</pre>';
    }

}

?>