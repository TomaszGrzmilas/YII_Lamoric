<?

namespace app\models\user;

use dektrium\user\models\Profile as BaseProfile;
use app\models\Company;

class Profile extends BaseProfile
{
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['company_id' => 'company_id']);
    }
}
?>