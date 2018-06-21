<?
namespace app\components;
use Yii;

class EventHandler 
{
    public static function AfterLogin($event)
    {
        Yii::info('USER['.$event->identity->username.']','trace\login');
    }

    public static function AfterLogout($event)
    {
        echo '<pre>';
        Yii::info('USER['.$event->identity->username.']','trace\logout');
        echo '</pre>';
    }

            
}?>



