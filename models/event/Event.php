<?php

namespace app\models\event;

use Yii;

/**
 * This is the model class for table "{{%event}}".
 *
 * @property int $event_id
 * @property string $title
 * @property string $body
 * @property string $start
 * @property string $end
 * @property int $all_day
 * @property string $color
 */
class Event extends \yii\db\ActiveRecord
{
    public $url;

    public static function tableName()
    {
        return '{{%event}}';
    }

    public function rules()
    {
        return [
            [['start', 'end'], 'safe'],
            [['all_day'], 'integer'],
            [['title'], 'string', 'max' => 200],
            [['body'], 'string', 'max' => 2000],
            [['color'], 'string', 'max' => 10],
        ];
    }

    public function attributeLabels()
    {
        return [
            'event_id' => Yii::t('db/event', 'Event ID'),
            'title' => Yii::t('db/event', 'Title'),
            'body' => Yii::t('db/event', 'Body'),
            'start' => Yii::t('db/event', 'Start'),
            'end' => Yii::t('db/event', 'End'),
            'all_day' => Yii::t('db/event', 'All Day'),
            'color' => Yii::t('db/event', 'Color'),
        ];
    }

    function attributes()
    {
        $attributes = parent::attributes();
        $attributes[] = 'url';
        return $attributes;
    }

    public static function find()
    {
        return new EventQuery(get_called_class());
    }
    
}
