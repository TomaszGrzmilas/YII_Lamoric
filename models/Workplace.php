<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "company_workplace".
 *
 * @property int $company_id
 * @property int $workplace_id
 * @property string $name
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Company $company
 */
class Workplace extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_workplace';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            [['company_id', 'name'], 'required'],
            [['company_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'company_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_id' => Yii::t('db/company', 'Company'),
            'name' => Yii::t('db/workplace', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['company_id' => 'company_id']);
    }

    public static function getCompanyList() 
    { 
        return Company::getCompanyList();
    }

    public static function getWorkplaceList() 
    { 
        $models = Workplace::find()->select('workplace_id, name')->asArray()->all();
        return ArrayHelper::map($models, 'workplace_id', 'name');
    }
}
