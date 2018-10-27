<?php

namespace app\models\company;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\behaviors\BlameableBehavior;
use app\modules\docmgm\models\UploadedFile;
use dektrium\user\models\User;
use dektrium\user\models\Profile;
use app\components\LogBehavior;
use app\models\balance_account\BalanceAccount;
/**
 * This is the model class for table "{{%company}}".
 *
 * @property int $company_id
 * @property string $name
 * @property int $logo
 * @property string $zip_code
 * @property string $city
 * @property string $street
 * @property string $building
 * @property string $local
 * @property string $notes
 * @property int $account_id
 * @property double $contribution
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 *
 * @property User[] $authUsers
 * @property UploadedFile $uploadedfile
 * @property User $createdBy
 * @property User $updatedBy
 * @property BalanceAccount $account
 * @property CompanyWorkplace[] $companyWorkplaces
 * @property Member[] $members
 * @property Profile[] $profiles
 */
class Company extends \yii\db\ActiveRecord
{
    public $importfile;

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
                //'autoDelete' => true, // when true then uploaded file will deleted before ActiveRecord::delete()
            ],
            [
                'class' => LogBehavior::className(),
                'indexColumn' => 'company_id',
                'objName' => 'company'
            ]
        ];
    }

    public function init(){
        $this->on(self::EVENT_BEFORE_INSERT, [$this, '_createBalanceAccount']);
        return parent::init();
    }

    public function rules()
    {
        return [
            [['name', 'contribution'], 'required'],
            [['name'], 'unique'],
            [['name'], 'string', 'max' => 200],
            [['tax_id'], 'string', 'max' => 10],
            [['account_id'], 'safe'],
            [['contribution'], 'match', 'pattern' => '/^\s*[-+]?[0-9]*[.,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/', 'message' => 'Wartość musi być liczbą'],
            [['zip_code'], 'string', 'max' => 6],
            [['city', 'street'], 'string', 'max' => 100],
            [['building', 'local'], 'string', 'max' => 5],
            [['notes'], 'string', 'max' => 2000],

            [['importfile'], 'file', 'skipOnEmpty' => true, 'extensions'=> 'csv'],
            [['logo'], 'exist', 'skipOnError' => true, 'skipOnEmpty'=>true, 'targetClass' => UploadedFile::className(), 'targetAttribute' => ['logo' => 'id']],
         //   [['account_id'], 'exist', 'skipOnError' => true, 'skipOnEmpty'=>true, 'targetClass' => BalanceAccount::className(), 'targetAttribute' => ['account_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'company_id' => Yii::t('db/company', 'Company ID'),
            'name' => Yii::t('db/company', 'Name'),
            'tax_id' => Yii::t('db/company', 'Tax ID'),
            'logo' => Yii::t('db/company', 'Logo'),
            'zip_code' => Yii::t('db/company', 'Zip Code'),
            'city' => Yii::t('db/company', 'City'),
            'street' => Yii::t('db/company', 'Street'),
            'building' => Yii::t('db/company', 'Building'),
            'local' => Yii::t('db/company', 'Local'),
            'notes' => Yii::t('db/company', 'Notes'),
            'account_id' => Yii::t('db/company', 'Account ID'),
            'contribution' => Yii::t('db/company', 'Contribution'),
            'created_by' => Yii::t('db/company', 'Created By'),
            'created_at' => Yii::t('db/company', 'Created At'),
            'updated_by' => Yii::t('db/company', 'Updated By'),
            'updated_at' => Yii::t('db/company', 'Updated At'),
            'importfile' => Yii::t('app', 'File'),
        ];
    }

    public function _createBalanceAccount()
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $account = new BalanceAccount();
            $account->balance = 0;
            if ($account->save())
            {
                $this->account_id = $account->id;
            } else {
                throw new UserException(Yii::t('app','Error when creating company account. Try again.'));
            }
        }
        catch (Exception $ex ) {
            $transaction->rollback();
        }
        $transaction->commit();
    }

    public function beforeSave($insert)
    {
        $this->contribution = str_replace(',','.',$this->contribution);

        $ret = parent::beforeSave($insert);

        if ($insert === false)
        {
            if ($this->logo == null)
            {
                $this->logo = $this->oldAttributes['logo'];
            }
        }
        return $ret;
    }

    public function getAddressLine1()
    {
        $return = $this->street . ' ' . $this->building;
        if ($this->local != ''){
            $return .= '/' .  $this->local;
        }
        return $return;
    }

    public function getAddressLine2()
    {
        $return = $this->zip_code . ' ' . $this->city;
        return $return;
    }

    public function getAuthUsers()
    {
        return $this->hasMany(User::className(), ['company_id' => 'company_id']);
    }

    public function getUploadedFile()
    {
        return $this->hasOne(UploadedFile::className(), ['id' => 'logo']);
    }

    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    public function getCompanyWorkplaces()
    {
        return $this->hasMany(CompanyWorkplace::className(), ['company_id' => 'company_id']);
    }

    public function getMembers()
    {
        return $this->hasMany(Member::className(), ['company_id' => 'company_id']);
    }

    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['company_id' => 'company_id']);
    }

    public function getAccount()
    {
        return $this->hasOne(BalanceAccount::className(), ['id' => 'account_id']);
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

    public function getImg()
    {
        return $this->uploadedFile->Img;
    }
}
