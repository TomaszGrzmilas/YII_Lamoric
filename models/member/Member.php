<?php

namespace app\models\member;

use Yii;
use yii\base\UserException;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use app\components\LogBehavior;
use app\models\workplace\Workplace;
use app\models\company\Company;
use app\models\balance_account\BalanceAccount;

/**
 * This is the model class for table "{{%member}}".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property int $pesel
 * @property string $zip_code
 * @property string $city
 * @property string $street
 * @property string $building
 * @property string $local
 * @property int $phone
 * @property string $email
 * @property int $company_id
 * @property int $workplace_id
 * @property string $notes
 * @property int $account_id 
 * @property double $contribution 
 * @property int $created_at
 * @property int $updated_at
 * @property Workplace $workplace
 * @property Company $company 
 * @property BalanceAccount $account
 */
class Member extends \yii\db\ActiveRecord
{
    public $importfile;
    public $importLine; 

    public $addition;

    public static function tableName()
    {
        return '{{%member}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
            [
                'class' => LogBehavior::className(),
                'indexColumn' => 'id',
                'objName' => 'member'
            ],
        ];
    }
    
    public function init(){
        $this->on(self::EVENT_BEFORE_INSERT, [$this, '_createBalanceAccount']);
        return parent::init();
    }

    public function rules()
    {
        return [
            [['name', 'surname', 'company_id'], 'required'],
            [['pesel', 'account_id', 'phone', 'company_id', 'workplace_id'], 'integer'],
            [['contribution'], 'match', 'pattern' => '/^\s*[-+]?[0-9]*[.,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/', 'message' => 'Wartość musi być liczbą'],
            [['name', 'surname', 'city', 'street', 'email'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['zip_code'], 'string', 'max' => 6],
            [['building', 'local'], 'string', 'max' => 5],
            [['notes'], 'string', 'max' => 2000],
            [['importfile'], 'file', 'skipOnEmpty' => true, 'extensions'=> 'csv'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'company_id']], 
            [['workplace_id'], 'exist', 'skipOnError' => false, 'targetClass' => Workplace::className(), 'targetAttribute' => ['company_id' => 'company_id', 'workplace_id' => 'workplace_id']], 
            [['account_id'], 'exist', 'skipOnError' => true, 'targetClass' => BalanceAccount::className(), 'targetAttribute' => ['account_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('db/member', 'Name'),
            'surname' => Yii::t('db/member', 'Surname'),
            'pesel' => Yii::t('db/member', 'Pesel'),
            'zip_code' => Yii::t('db/member', 'Zip Code'),
            'city' => Yii::t('db/member', 'City'),
            'street' => Yii::t('db/member', 'Street'),
            'building' => Yii::t('db/member', 'Building'),
            'local' => Yii::t('db/member', 'Local'),
            'phone' => Yii::t('db/member', 'Phone'),
            'email' => Yii::t('db/member', 'Email'),
            'company_id' => Yii::t('db/member', 'Company ID'),
            'workplace_id' => Yii::t('db/member', 'Workplace ID'),
            'notes' => Yii::t('db/member', 'Notes'),
            'account_id' => Yii::t('db/member', 'Account ID'),
            'contribution' => Yii::t('db/member', 'Contribution'),
            'importfile' => Yii::t('app', 'File'),
            ///////////////////////
            'full_name'=> Yii::t('db/member', 'Full Name'),
            'address'=> Yii::t('db/member', 'Address'),
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
                throw new UserException(Yii::t('app','Error when creating user account. Try again.'));
            }
        }
        catch (Exception $ex ) {
            $transaction->rollback();  
        }
        $transaction->commit();  
    }

    public function beforeSave($insert)
    {
        if ($this->contribution == null) {
            $this->contribution = "0.0";
        }
        $this->contribution = str_replace(',','.',$this->contribution);
        return parent::beforeSave($insert);
    }

    public function getFullName() 
    { 
        return $this->name .' '. $this->surname;
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

    public function getWorkspace() 
    { 
        return $this->hasOne(Workplace::className(), ['company_id' => 'company_id', 'workplace_id' => 'workplace_id']); 
    } 
        
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
        return Workplace::getWorkplaceList();
    }

    public function getAccount()
    {
        return $this->hasOne(BalanceAccount::className(), ['id' => 'account_id']);
    }
 
    public static function find()
    {
        return new MemberQuery(get_called_class());
    }
}
