<?php

Yii::import('application.components.client.*');
Yii::import('application.components.client.label.*');
Yii::import('application.components.client.navigation.*');
Yii::import('application.components.client.response.*');
Yii::import('application.components.client.upload.*');

class JsonController extends CController {
    
    protected $isInitCall = true;

    public function render($view, $data = null, $return = false) {
        $return = true;
        $viewModelHtml = $this->renderPartial($view, $data, $return);
        $responseBuilder = new ResponseBuilder($viewModelHtml);
        CSProvider::instance()->showJson($responseBuilder->buildInitResponse());
    }

}