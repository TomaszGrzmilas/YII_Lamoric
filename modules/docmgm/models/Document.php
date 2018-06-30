<?php

namespace app\modules\docmgm\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use app\modules\docmgm\DocmgmModule;
use app\models\Category;
use app\components\LogBehavior;

/**
 * This is the model class for table "{{%document}}".
 *
 * @property int $doc_id
 * @property string $title
 * @property string $text
 * @property string $tag
 * @property int $file
 * @property int $category_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Category $category
 * @property UploadedFile $uploadedfile
 */
class Document extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%document}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'class' => 'mdm\upload\UploadBehavior',
                'attribute' => 'file', // required, use to receive input file
                'savedAttribute' => 'file', // optional, use to link model with saved file.
                'uploadPath' => '@app/web/media/upload/documents', // saved directory. default to '@runtime/upload'
                'autoSave' => true, // when true then uploaded file will be save before ActiveRecord::save()
                'autoDelete' => true, // when true then uploaded file will deleted before ActiveRecord::delete()
            ],
            [
                'class' => LogBehavior::className(),
                'indexColumn' => 'doc_id',
                'objName' => 'document'
            ]
        ];
    }

    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['text'], 'string'],
            [['title'], 'unique'],
        //    [['category_id'], 'integer'],
            [['title'], 'string', 'max' => 150],
            [['tag'], 'string', 'max' => 200],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'doc_id' => DocmgmModule::t('db/document', 'Doc ID'),
            'title' => DocmgmModule::t('db/document', 'Title'),
            'text' => DocmgmModule::t('db/document', 'Text'),
            'tag' => DocmgmModule::t('db/document', 'Tag'),
            'file' => DocmgmModule::t('db/document', 'File'),
            'category_id' => DocmgmModule::t('db/document', 'Category ID'),
        ];
    }


    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public static function getCategoryList() 
    { 
        return null; //Category::getCategoryList();
    }

    public function getUploadedFile()
    {
        return $this->hasOne(UploadedFile::className(), ['id' => 'file']);
    }
}
