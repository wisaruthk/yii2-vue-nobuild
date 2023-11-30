<?php

namespace app\modules\service\controllers;

use yii\web\Controller;

/**
 * Default controller for the `service` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionApp()
    {
        return $this->render('app');
    }
}
