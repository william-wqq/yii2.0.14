<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "entry".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 */
class EntryForm extends Model
{

    public $name;
    public $email;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required', 'message' => '用户名不为空'],
            [['email'], 'required', 'message' => '邮箱不为空'],
            [['name'], 'string', 'max' => 30, 'message' => '用户名不超过30个字符'],
            [['email'],  'string', 'max' => 255, 'message' => '邮箱格式不正确'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => '姓名',
            'email' => '邮箱',
        ];
    }
}
