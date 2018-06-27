<?

namespace app\components;

use Yii;
use yii\base\Component;

class CustomUtil extends Component {
 
    public static $successMsg = <<<MSGSUC
        <div class="col-sm-4" style="padding: 0">
            <div class="alert alert-block alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
                <p>
                    <strong>
                        <i class="ace-icon fa fa-check"></i>
                        :msg
                    </strong>
                </p>
            </div>
        </div>
MSGSUC;

    public static $errorMsg = <<<MSGERR
        <div class="col-sm-6" style="padding: 0">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>

                <strong>
                    <i class="ace-icon fa fa-times"></i>
                    :msg
                </strong>
                <br>
                :params
            </div>
        </div>
MSGERR;

    public static function in_array($array, $value) {
        $match = false;

        $tmp_array = array_filter($array, function($entry) use ($value) {
          return fnmatch($entry, $value);
        });
        return !empty($tmp_array);
    }
    
    public static function setFlash($title, $msg, $params = "" ) {

        if (is_array($params)) {
            $tmpParam = '<ul style="padding-left: 10px">';

            foreach ($params as $key => $value) {
                if (is_array($params)) {
                    foreach ($value as $k => $v) {
                        $tmpParam .= '<li>' . $v . '</li>';
                    }

                } else {
                    $tmpParam .= '<li>' . $value . '</li>';
                }
            }
            $tmpParam .= '</ul>';
        } else {
            $tmpParam = "";
        }

        switch ($title) {
            case 'error':
            Yii::$app->getSession()->setFlash($title, str_replace([":msg", ":params"], [$msg, $tmpParam], self::$errorMsg));
                break;
            case 'success':
                Yii::$app->getSession()->setFlash($title, str_replace(":msg", $msg, self::$successMsg));
                break;
            default:
                Yii::$app->getSession()->setFlash($title, $msg);
                break;
        }
    }



}?>