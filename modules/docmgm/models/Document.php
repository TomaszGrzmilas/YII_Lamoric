<?php

namespace app\modules\docmgm\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use app\modules\docmgm\DocmgmModule;
use app\models\category\Category;
use app\components\LogBehavior;
use yii\helpers\FileHelper;

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
    public $docRootCategoryId = 10;
    public $articleRootCategoryId = 11;
    public $rodoRootCategoryId = 9;
    public $lawRootCategoryId = 1;
    public $traningRootCategoryId = 21; // na prod 44 !!

    public $text_all;
    public $date_filter;
    public $sort_filter;

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
            ],
        ];
    }

    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['text','short_text','thumbnail'], 'string'],
            [['title'], 'unique'],
            [['text_all'], 'safe'],

        //    [['category_id'], 'integer'],
            [['title'], 'string', 'max' => 150],
            [['short_text'], 'string', 'max' =>800],
            [['thumbnail'], 'string', 'max' =>200],
            [['tag'], 'string', 'max' => 200],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'doc_id' => DocmgmModule::t('db/document', 'Doc ID'),
            'title' => DocmgmModule::t('db/document', 'Title'),
            'short_text' => DocmgmModule::t('db/document', 'Short Text'),
            'text' => DocmgmModule::t('db/document', 'Text'),
            'tag' => DocmgmModule::t('db/document', 'Tag'),
            'file' => DocmgmModule::t('db/document', 'File'),
            'category_id' => DocmgmModule::t('db/document', 'Category ID'),
            'thumbnail' => DocmgmModule::t('db/document', 'Thumbnail'),
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

    public function getFilePath()
    {
        return FileHelper::normalizePath(substr($this->file, strlen(Yii::getAlias('@app').'\web')));
    }

    public function getThumbnailPath()
    {
        if ($this->thumbnail == null){
            return FileHelper::normalizePath('/media/upload/document_thumbnail/default.jpg');
        }
        else
        {
            return FileHelper::normalizePath(substr($this->thumbnail, strlen(Yii::getAlias('@app').'\web')));
        }
    }

    public function beforeSave($insert)
    {
        if ($insert === true)
        {
            if($this->short_text == null)
            {
                $this->short_text = substr(strip_tags($this->text), 0, 190) . '...';
            }
        }
        if ($insert === false)
        {
            $ola = $this->thumbnail;
            $uploadFile = \yii\web\UploadedFile::getInstance($this, 'thumbnail');

            if (!empty($uploadFile)) {
                $file =  Yii::getAlias('@app') . '/web/media/upload/document_thumbnail/' . Yii::$app->security->generateRandomString() . '.' . $uploadFile->extension;
                $uploadFile->saveAs($file);
                $this->thumbnail = $file;
            }
            $oldfile = \yii\helpers\FileHelper::normalizePath($this->oldAttributes['thumbnail']);
            if ($this->thumbnail == null)
            {
                if (file_exists($oldfile))
                {
                    $this->thumbnail = $this->oldAttributes['thumbnail'];
                }
            }
            else if ($this->thumbnail != $this->oldAttributes['thumbnail'])
            {
                if (file_exists($oldfile))
                {
                    unlink($oldfile);
                }
            }
        }
        return parent::beforeSave($insert);
    }

    public static function getDateFilter()
    {
        return [
            '1' => Yii::t('app', 'w tym tygodniu'),
            '2' => Yii::t('app', 'w tym miesiacu'),
            '3' => Yii::t('app', 'w tym roku'),
        ];
    }

    public static function getSortFilter()
    {
        return [
            '1' => Yii::t('app', 'daty od najnowszej'),
            '2' => Yii::t('app', 'daty od najstarszej'),
            '3' => Yii::t('app', 'alfabetycznie [a-z]'),
            '4' => Yii::t('app', 'alfabetycznie [z-a]'),
        ];
    }
}
