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
        $request = Yii::$app->request;
        $id = $request->get('id');
        $name = $request->get('name');
        $collection = Yii::$app->mongodb->getCollection('country');
        $_id = $collection->insert(['id' => $id, 'name' => $name]);
        echo 'add success _id='.$_id;

    }

    public function actionUpdate()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $name = $request->get('name');
        $collection = Yii::$app->mongodb->getCollection('country');
        $collection->update(['id' => $id], ['name' => $name]);
        echo 'update success id='.$id;
    }

    public function actionDelete()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $collection = Yii::$app->mongodb->getCollection('country');
        $collection->remove(['id' => $id]);
        echo 'delete success id='.$id;
    }

    public function actionGet()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $collection = Yii::$app->mongodb->getCollection('country');
        $country = $collection->find(['id' => $id])->toArray();
        var_dump($country);

    }

}
