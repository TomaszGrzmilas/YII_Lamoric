<?php

namespace app\modules\docmgm\models\member_doc;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use app\components\LogBehavior;
use app\modules\docmgm\DocmgmModule;
use app\modules\docmgm\models\UploadedFile;

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
                'attribute' => 'file_id', // required, use to receive input file
                'savedAttribute' => 'file_id', // optional, use to link model with saved file.
                'uploadPath' => '@app/web/media/upload/member_doc', // saved directory. default to '@runtime/upload'
                'autoSave' => true, // when true then uploaded file will be save before ActiveRecord::save()
                //'autoDelete' => true, // when true then uploaded file will deleted before ActiveRecord::delete()
            ],
        ];
    }

    public function rules()
    {
        return [
            [['title'], 'string'],
            [['file_id'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'member_doc_id' => DocmgmModule::t('db/memberdoc', 'Member Doc ID'),
            'title' => DocmgmModule::t('db/memberdoc', 'Title'),
            'file_id' => DocmgmModule::t('db/memberdoc', 'File'),
        ];
    }

    public function beforeSave($insert)
    {
        $ret = parent::beforeSave($insert);

        if ($insert === false) 
        {
            if ($this->file_id == null)
            {
                $this->file_id = $this->oldAttributes['file_id'];
            }
        }
        return $ret;
    }

    public function getUploadedFile()
    {
        return $this->hasOne(UploadedFile::className(), ['id' => 'file_id']);
    }

    public static function find()
    {
        return new MemberDocQuery(get_called_class());
    }
}
