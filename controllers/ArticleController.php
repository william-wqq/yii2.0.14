<?php

namespace app\controllers;
use yii\web\Controller;
use app\models\Article;

class ArticleController extends Controller
{
    public function actionIndex()
    {
        /*$article = Article::find()->with('category')->all();

        foreach ($article as $element) {
            var_dump($element->category->category_name);
        }*/

        //$article = Article::findOne(1);
        //$articleCate = $article->category;
        //$articleCate = $article->getCategory()->one();
        //print_r($articleCate);die;



        //return $this->render('index');
    }

}
