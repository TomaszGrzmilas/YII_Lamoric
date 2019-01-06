<?

namespace app\models\user;

use Yii;
use dektrium\user\models\User as BaseUser;
use app\models\company\Company;
use yii\helpers\ArrayHelper;
use app\components\LogBehavior;
use app\models\user\Profile;

class User extends BaseUser
{

    public function behaviors()
    {
        return ArrayHelper::merge( parent::behaviors(),
        ['LogBehavior' =>
            [
            'class' => LogBehavior::className(),
            'indexColumn' => 'id',
            'objName' => 'profile'
            ]
        ]);
    }

    public function getCompany($userId = null)
    {
        if (is_null($userId)) {
            $userId = $this->id;
        }

        return Profile::find()->where(['user_id'=>$userId])->one()->company;
    }

    public static function getCompanyList()
    {
        return Profile::getCompanyList();
    }
}
?>