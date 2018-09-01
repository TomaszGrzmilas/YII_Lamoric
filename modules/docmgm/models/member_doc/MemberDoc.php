<?php

namespace app\modules\docmgm\models\member_doc;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use app\components\LogBehavior;
use app\modules\docmgm\DocmgmModule;

/**
 * This is the model class for table "{{%member_doc}}".
 *
 * @property int $member_doc_id
 * @property resource $text
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class MemberDoc extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%member_doc}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
            [
                'class' => LogBehavior::className(),
                'indexColumn' => 'member_doc_id',
                'objName' => 'memberdoc'
            ],
        ];
    }

    public function rules()
    {
        return [
            [['text','title'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'member_doc_id' => DocmgmModule::t('db/memberdoc', 'Member Doc ID'),
            'title' => DocmgmModule::t('db/memberdoc', 'Title'),
            'text' => DocmgmModule::t('db/memberdoc', 'Text'),
        ];
    }

    public static function find()
    {
        return new MemberDocQuery(get_called_class());
    }
}
