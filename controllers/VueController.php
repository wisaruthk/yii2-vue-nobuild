<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class VueController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionHello()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['status'=>'hello from controller > '.Yii::$app->user->identity->username];
    }

    public function actionUser()
    {
        return $this->render('user');
    }

    public function actionGetUsers()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $users = [
            ['id' => '100','username' => 'admin','email'=>'abc@email.com','firstname'=>'admin admin','code'=>'a100'],
            ['id' => '102','username' => 'user1','email'=>'user1@example.com','firstname'=>'user1 user1','code'=>'a102'],
            ['id' => '103','username' => 'user2','email'=>'user2@example.com','firstname'=>'user2 user2','code'=>'a103'],
        ];

        return [
            'users'=>$users,
            'totalItems'=>count($users)
        ];
    }

    public function actionRopa()
    {
        return $this->render('ropa');
    }

    public function actionModalWithTransitions()
    {
        return $this->render('modal-with-transitions');
    }

    public function actionVuetify()
    {
        return $this->render('vuetify');
    }

    public function actionVuetifyDatatable()
    {
        return $this->render('vuetify-datatable');
    }

    public function actionVuetifyDialog()
    {
        return $this->render('vuetify-dialog');
    }

    public function actionVuetifyDialogImportmap()
    {
        return $this->render('vuetify-dialog-importmap');
    }

    public function actionVuetifyDialogTemplate()
    {
        return $this->render('vuetify-dialog-template');
    }

    public function actionRouter()
    {
        return $this->render('router');
    }

    public function actionVuex()
    {
        return $this->render('vuex');
    }

    public function actionPinia()
    {
        return $this->render('pinia');
    }
}
