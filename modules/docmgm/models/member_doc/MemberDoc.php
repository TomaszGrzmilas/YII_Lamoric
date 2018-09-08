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
            [
                'class' => 'mdm\upload\UploadBehavior',
                'attribute' => 'file', // required, use to receive input file
                'savedAttribute' => 'file', // optional, use to link model with saved file.
                'uploadPath' => '@app/web/media/upload/member_doc', // saved directory. default to '@runtime/upload'
                'autoSave' => true, // when true then uploaded file will be save before ActiveRecord::save()
                'autoDelete' => true, // when true then uploaded file will deleted before ActiveRecord::delete()
            ],
        ];
    }

    public function rules()
    {
        return [
            [['file','title'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'member_doc_id' => DocmgmModule::t('db/memberdoc', 'Member Doc ID'),
            'title' => DocmgmModule::t('db/memberdoc', 'Title'),
            'file' => DocmgmModule::t('db/memberdoc', 'File'),
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert === false) 
        {
            if ($this->file == null)
            {
                $this->file = $this->oldAttributes['file'];
            }
        }
        return parent::beforeSave($insert);
    }

    public static function find()
    {
        return new MemberDocQuery(get_called_class());
    }
}
