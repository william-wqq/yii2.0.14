<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "index_system".
 *
 * @property string $id 系统指标表
 * @property string $name 指标名称
 * @property string $parent_id 父级指标ID
 */
class IndexSystem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'index_system';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'parent_id'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
        ];
    }
}
