<?php

namespace app\modules\docmgm\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\FileHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%uploaded_file}}".
 *
 * @property int $id
 * @property string $name
 * @property string $filename
 * @property int $size
 * @property string $type
 *
 * @property Document[] $documents
 */
class UploadedFile extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%uploaded_file}}';
    }

    public function rules()
    {
        return [
            [['size'], 'integer'],
            [['name', 'filename'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 64],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('db/uploadedfile', 'ID'),
            'name' => Yii::t('db/uploadedfile', 'Name'),
            'filename' => Yii::t('db/uploadedfile', 'Filename'),
            'size' => Yii::t('db/uploadedfile', 'Size'),
            'type' => Yii::t('db/uploadedfile', 'Type'),
        ];
    }

    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['file' => 'id']);
    }

    public function getMemberDoc()
    {
        return $this->hasOne(MemberDoc::className(), ['file' => 'id']);
    }

    public function getFilePath()
    {
        return FileHelper::normalizePath(substr($this->filename, strlen(Yii::getAlias('@app').'\web')));
    }

    public function getFileLink()
    {
        return Html::a($this->name, $this->getFilePath(), ['target' => '_blank', 'data-pjax'=>'0']);
    }

    public function getImg($width = '175px', $height = '100%')
    {
        if(stripos($this->type,'image') !== false){
            return Html::img($this->getFilePath(), ['alt' => 'company_logo', 'style'=>'max-width: '. $width .'; max-height: '. $height .';']);
        }
        return false; 
    }

    public function Img($width = '175px', $height = '100%')
    {
        return $this->getImg($width, $height); 
    }

    public function getImg2($width = '175px', $height = '100%')
    {
        if(stripos($this->type,'image') !== false){
            return Html::img(['/file','id'=>$this->id], ['alt' => 'company_logo', 'style'=>'max-width: '. $width .'; max-height: '. $height .';']);
        }
        return false; 
    }

}
