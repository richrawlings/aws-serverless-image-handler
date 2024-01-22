<?php

namespace rebellionagency\awsserverlessimagehandler\controllers;

use yii\web\Response;
use craft\web\View;
use craft\web\Controller;

class TransformsController extends Controller
{

    public function actionIndex(): Response
    {
        return $this->renderTemplate(
            'aws-serverless-image-handler/index',
            [],
            View::TEMPLATE_MODE_CP,
        );
    }

}