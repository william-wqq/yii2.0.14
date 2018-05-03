<?php

namespace app\controllers;
use Yii;

class MongoDBController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //return $this->render('index');
        $collection = Yii::$app->mongodb->getCollection('country');
        $collection->insert(['id' => '2', 'name' => '美国']);

    }

}
