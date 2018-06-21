<?

namespace app\components;

use yii\base\Component;

class CustomUtil extends Component {
 
    public static function in_array($array, $value) {
        $match = false;

        $tmp_array = array_filter($array, function($entry) use ($value) {
          return fnmatch($entry, $value);
        });
        return !empty($tmp_array);
    }
    
}?>