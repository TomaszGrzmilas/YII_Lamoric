<?

namespace app\controllers\user;

use dektrium\user\controllers\SecurityController as BaseSecurityController;

class SecurityController extends BaseSecurityController
{
    public function actionLogin()
    {
        $this->layout = '@app/views/layouts/login';
        return parent::actionLogin();
    }
}

?>

