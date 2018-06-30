<?
namespace app\components;
use Yii;

class EventHandler 
{
    public static $skipAttr =  ['updated_by', 'updated_at', 'created_at', 'created_by'];

    public static function AfterLogin($event)
    {
        Yii::info('USER['.$event->identity->username.']','trace\login');
    }

    public static function AfterLogout($event)
    {
        Yii::info('USER['.$event->identity->username.']','trace\logout');
    }


    public static function AfterInsert($traceMsg, $indexColumn, $newAttr)
    {
        $changedMsg = '';
        foreach ($newAttr as $key => $value) {
            if (!(in_array($key , self::$skipAttr))) {
                $newAttr[$key] = is_null($newAttr[$key]) ? '<empty>' : $newAttr[$key];
                $changedMsg .= $key .'{'.$newAttr[$key] . '} ';
                
            }
        }
        Yii::info('USER['.Yii::$app->user->identity->username.'] INSERT NEW ID ['. $newAttr[$indexColumn] .'] IS ['. $changedMsg .']' ,$traceMsg);
    }

    public static function AfterUpdate($traceMsg, $indexColumn, $newAttr, $oldAttr)
    {
        //oldAttr = old values of changed fields only
        $changedMsg = '';
        foreach ($oldAttr as $key => $value) {
            if (!(in_array($key , self::$skipAttr))) {
                if ($oldAttr[$key] != $newAttr[$key]) {
                    $oldAttr[$key] = is_null($oldAttr[$key]) ? '<empty>' : $oldAttr[$key];
                    $newAttr[$key] = is_null($newAttr[$key]) ? '<empty>' : $newAttr[$key];
                    $changedMsg .= $key .'{'.$oldAttr[$key] .' => '. $newAttr[$key] . '} ';
                }
            }
        }
        if ($changedMsg != '') {
            Yii::info('USER['.Yii::$app->user->identity->username.'] UPDATE ID['. $newAttr[$indexColumn] .'] CHANGE ['. trim($changedMsg) .']', $traceMsg);
        }
    }

    public static function AfterDelete($traceMsg, $indexColumn, $newAttr)
    {
        $changedMsg = '';
        foreach ($newAttr as $key => $value) {
            if (!(in_array($key , self::$skipAttr))) {
                $newAttr[$key] = is_null($newAttr[$key]) ? '<empty>' : $newAttr[$key];
                $changedMsg .= $key .'{'.$newAttr[$key] . '} ';
                
            }
        }
        Yii::info('USER['.Yii::$app->user->identity->username.'] DELETE ID['. $newAttr[$indexColumn] .'] WAS ['. $changedMsg .']' ,$traceMsg);
    }

    
            
}?>



