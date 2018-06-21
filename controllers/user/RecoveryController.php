<?

namespace app\controllers\user;

use dektrium\user\controllers\RecoveryController as BaseRecoveryController;

class RecoveryController extends BaseRecoveryController
{
    public function actionRequest()
    {
        $this->layout = '@app/views/layouts/login';
        return parent::actionRequest();
    }

    public function actionReset($id, $code)
    {
        $this->layout = '@app/views/layouts/login';
        return parent::actionReset();
    }
}

?>

