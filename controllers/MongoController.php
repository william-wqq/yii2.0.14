<?php

namespace app\controllers;
use Yii;

class MongoController extends \yii\web\Controller
{
    public $collection;
    public function __construct()
    {
        $this->collection = Yii::$app->mongodb->getCollection('country');
        //parent::__construct($id, $module, $config);
    }

    public function actionAdd()
    {
        //return $this->render('index');

        $this->collection->insert(['id' => '2', 'name' => '美国']);
        echo 'add success';

    }

    public function actionUpdate()
    {
        $this->collection->update(['id' => '2'], ['name' => '日本']);
        echo 'update success';
    }

}
