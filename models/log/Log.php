<?php

namespace app\models\log;

use Yii;

/**
 * This is the model class for table "{{%log}}".
 *
 * @property string $id
 * @property int $level
 * @property string $category
 * @property double $log_time
 * @property string $prefix
 * @property string $message
 */
class Log extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%log_pub}}';
    }

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['prefix', 'message'], 'string'],
            [['category','log_time'], 'string', 'max' => 255],
            [['user'],'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('db/log', 'ID'),
            'level' => Yii::t('db/log', 'Level'),
            'category' => Yii::t('db/log', 'Category'),
            'log_time' => Yii::t('db/log', 'Log Time'),
            'prefix' => Yii::t('db/log', 'Prefix'),
            'message' => Yii::t('db/log', 'Message'),
        ];
    }

    public static function find()
    {
        return new LogQuery(get_called_class());
    }

}
