<?

namespace app\models\user;

use Yii;
use dektrium\user\models\Profile as BaseProfile;
use app\models\company\Company;
use yii\helpers\ArrayHelper;
use \app\components\LogBehavior;

class Profile extends BaseProfile
{
    
    public function behaviors()
    {
        return ArrayHelper::merge( parent::behaviors(), 
        ['LogBehavior' =>
            [
            'class' => LogBehavior::className(),
            'indexColumn' => 'user_id',
            'objName' => 'profile'
            ]
        ]);
    }

    public function rules()
    {
        $rules = [
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'company_id']],
            [['company_id'], 'integer'],
        ];
        return array_merge(parent::rules(), $rules);
    }

    public function attributeLabels()
    {
        $return = parent::attributeLabels();
        $return['company_id'] = Yii::t('db/company', 'Company');
        return $return;
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['company_id' => 'company_id']);
    }

    public static function getCompanyList() 
    { 
        return Company::getCompanyList();
    }
}
?>