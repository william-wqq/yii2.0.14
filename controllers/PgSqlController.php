<?php

namespace app\controllers;
use app\models\Country;
use Yii;

class PgSqlController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //return $this->render('index');
        $countries = Country::find()
            ->where(['id' => 1])
            ->one();
        print_r($countries);die;
    }

}
