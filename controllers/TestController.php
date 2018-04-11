<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\EntryForm;
use app\models\Country;
use app\models\IndexSystem;
use yii\debug\actions\db;
use yii\db\Query;
//use yii\redis\Connection;

class TestController extends Controller
{
    public function actionIndex()
    {
        echo "this is a test!!!";
        //return $this->render('index');
    }

    public function actionEntry()
    {
        $entryForm = new EntryForm;
        if ($entryForm->load(Yii::$app->request->post()) && $entryForm->validate()) {
            return $this->render('entry-confirm', ['entryForm' => $entryForm]);
        } else {
            return $this->render('entry', ['entryForm' => $entryForm]);
        }
    }

    public function actionCountry()
    {
        // 获取 country 表的所有行并以 name 排序
        //$countries = Country::find()->orderBy('name')->all();
        //print_r($countries);die;

        // 获取主键为 “US” 的行
        $country = Country::findOne('US');
        //var_dump($country->code);

        // 输出 “United States”
        echo $country->name;

        // 修改 name 为 “U.S.A.” 并在数据库中保存更改
        $country->name = 'U.S.A.';
        $country->save();
    }

    public function actionMatch()
    {
        //var_dump(Yii::$app->basePath);die;
        $basePath = Yii::$app->basePath;
        $content = file_get_contents($basePath . '/file/city.txt');

        //preg_match_all('/<s><\/s>(.*)<\/h5>/', $content, $match);
        //print_r($match);die;

        //preg_match_all('/<h3><s><\/s>(.*)<\/h3>/', $content, $match);
        //print_r($match);die;

        preg_match_all('/data-id=(.*)><a>(.*)<\/a>/', $content, $match);
        array_shift($match);


        //$array = array_slice($match[0], 429, 6);
        //$str = implode(',', $array);
        //print_r($array);die;
        //IndexSystem::updateAll(['parent_id'=>'60000011-ec35-e711-bac2-eca86b3affee'], 'id in ('.$str.')');
        //print_r($array);die;

        $array = array_combine($match[0], $match[1]);
        //print_r($array);die;

        Yii::$app->db->transaction(function () use ($array) {
            array_walk($array, function ($element, $k){
                $index = new IndexSystem;
                $index->id = $k;
                $index->name = $element;
                $index->save();
            });
        });
    }

    public function actionRedis()
    {
        //var_dump(Yii::$app->cache->set('name', 'william'));
        $redis = Yii::$app->redis;
        var_dump($redis->get('sex'));
        Yii::$app->cache;
    }


}
