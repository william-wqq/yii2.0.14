<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\Category;

/**
 * This is the model class for table "article".
 *
 * @property string $id 文章ID
 * @property string $title 文章标题
 * @property string $content 文章内容
 * @property string $category_id 分类ID
 *
 * @property Category $category
 */
class Article extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'category_id'], 'required'],
            [['category_id'], 'integer'],
            [['title', 'content'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
