<?php

namespace app\controllers;
use Yii;

class MongoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        echo 'index';
    }

    public function actionAdd()
    {
        //return $this->render('index');
        $collection = Yii::$app->mongodb->getCollection('country');
        $collection->insert(['id' => '2', 'name' => '美国']);
        echo 'add success';

    }

    public function actionUpdate()
    {
        $collection = Yii::$app->mongodb->getCollection('country');
        $collection->update(['id' => '2'], ['name' => '日本']);
        echo 'update success';
    }

}
