<?php

namespace app\models;

use Yii;
use app\models\Company;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\behaviors\BlameableBehavior;
use app\modules\docmgm\models\UploadedFile;

/**
 * This is the model class for table "{{%company}}".
 *
 * @property int $company_id
 * @property string $name
 * @property int $logo
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 *
 * @property AuthUser[] $authUsers
 * @property UploadedFile $uploadedfile
 * @property AuthUser $createdBy
 * @property AuthUser $updatedBy
 * @property CompanyWorkplace[] $companyWorkplaces
 * @property Member[] $members
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%company}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
            [
                'class' => 'mdm\upload\UploadBehavior',
                'attribute' => 'logo', // required, use to receive input file
                'savedAttribute' => 'logo', // optional, use to link model with saved file.
                'uploadPath' => '@app/web/media/upload/companies_logo', // saved directory. default to '@runtime/upload'
                'autoSave' => true, // when true then uploaded file will be save before ActiveRecord::save()
                'autoDelete' => true, // when true then uploaded file will deleted before ActiveRecord::delete()
            ],
        ];
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'unique'],
            [['name'], 'string', 'max' => 200],
            [['logo'], 'exist', 'skipOnError' => true, 'targetClass' => UploadedFile::className(), 'targetAttribute' => ['logo' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => AuthUser::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => AuthUser::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'company_id' => Yii::t('db/company', 'Company ID'),
            'name' => Yii::t('db/company', 'Name'),
            'logo' => Yii::t('db/company', 'Logo'),
            'created_by' => Yii::t('db/company', 'Created By'),
            'created_at' => Yii::t('db/company', 'Created At'),
            'updated_by' => Yii::t('db/company', 'Updated By'),
            'updated_at' => Yii::t('db/company', 'Updated At'),
        ];
    }


    public function getAuthUsers()
    {
        return $this->hasMany(AuthUser::className(), ['company_id' => 'company_id']);
    }

    public function getUploadedFile()
    {
        return $this->hasOne(UploadedFile::className(), ['id' => 'logo']);
    }

    public function getCreatedBy()
    {
        return $this->hasOne(AuthUser::className(), ['id' => 'created_by']);
    }

    public function getUpdatedBy()
    {
        return $this->hasOne(AuthUser::className(), ['id' => 'updated_by']);
    }

    public function getCompanyWorkplaces()
    {
        return $this->hasMany(CompanyWorkplace::className(), ['company_id' => 'company_id']);
    }

    public function getMembers()
    {
        return $this->hasMany(Member::className(), ['company_id' => 'company_id']);
    }

    public static function find()
    {
        return new CompanyQuery(get_called_class());
    }

    public static function getCompanyList() 
    { 
        $models = Company::find()->asArray()->all();
        return ArrayHelper::map($models, 'company_id', 'name');
    }

    public static function getImg() 
    { 
        
        return $this->uploadedFile->Img;
    }
}
