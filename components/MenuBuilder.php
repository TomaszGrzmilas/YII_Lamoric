<?
namespace app\components;
use Yii;
use yii\helpers\Url;

class MenuBuilder 
{
    public static function BuildMenu($item)
    {
        $appId = Yii::$app->id;

        $items = [['label' => Yii::t('app', 'Home'),  'class'=>'item hvr-pop', 'icon' => 'home', 'url' => Yii::$app->homeUrl, 'active' => (false)]];
        if (Yii::$app->user->can('Application Admin')) {  
            array_push($items,        
                ['label' => Yii::t('app', 'Administration'), 'icon' => 'desktop', 'active' => (Yii::$app->CustomUtil->in_array(['user*','rbac*', $appId.'-company*',$appId.'-workplace*','docmgm-document-index', 'docmgm-document-create', 'docmgm-document-view*','docmgm-document-update*' ,$appId.'-category*', $appId.'-log*', ],$item )), 'items' => [
                    ['label' => Yii::t('db/authuser', 'Users'), 'icon' => 'user', 'url' => Url::toRoute('/user/admin/index'), 'active' => (Yii::$app->CustomUtil->in_array(['user*','rbac*'] ,$item ))],			
                    ['label' => Yii::t('db/company', 'Companies'), 'icon' => 'building', 'url' => Url::toRoute('/company/index'), 'active' => (Yii::$app->CustomUtil->in_array([$appId.'-company*'] ,$item ))],
                    ['label' => Yii::t('db/workplace', 'Workplaces'), 'icon' => 'briefcase', 'url' => Url::toRoute('/workplace/index'), 'active' => (Yii::$app->CustomUtil->in_array([$appId.'-workplace*'] ,$item ))],
                    ['label' => Yii::t('db/document', 'Documents'), 'icon' => 'book', 'url' => Url::toRoute('/docmgm/document/index'), 'active' => (Yii::$app->CustomUtil->in_array(['docmgm-document-index', 'docmgm-document-create', 'docmgm-document-view*','docmgm-document-update*'] ,$item ))],
                    ['label' => Yii::t('db/category', 'Categories'), 'icon' => 'tags', 'url' => Url::toRoute('/category/admin'), 'active' => (Yii::$app->CustomUtil->in_array([$appId.'-category*'] ,$item ))],                
                    ['label' => Yii::t('db/log', 'Logs'), 'icon' => 'list', 'url' =>  Url::toRoute('/log/index'), 'active' => (Yii::$app->CustomUtil->in_array([$appId.'-log-index'] ,$item ))],
            ]]);
        }
        array_push($items, 
            ['label' => Yii::t('app', 'Members'), 'icon' => 'users', 'url' =>  Url::toRoute('/member/index'), 'active' => (Yii::$app->CustomUtil->in_array([$appId.'-member*'] ,$item ))],
        //    ['label' => Yii::t('app', 'Payments'), 'icon' => 'money', 'url' =>  Url::toRoute('/balance-account/index'), 'active' => (Yii::$app->CustomUtil->in_array([$appId.'-balance-account*'] ,$item ))],
            ['label' => Yii::t('app', 'Law'), 'icon' => 'balance-scale', 'url' => Url::toRoute('/docmgm/law-ovw/index'), 'active' => (Yii::$app->CustomUtil->in_array(['docmgm-law-ovw*'] ,$item ))],
            ['label' => Yii::t('app', 'Articles'), 'icon' => 'newspaper-o', 'url' => Url::toRoute('//docmgm/article-ovw/index'), 'active' => (Yii::$app->CustomUtil->in_array(['docmgm-article-ovw*'] ,$item ))],
            ['label' => Yii::t('app', 'Documents'), 'icon' => 'book', 'url' => Url::toRoute('/docmgm/document-ovw/index'), 'active' => (Yii::$app->CustomUtil->in_array(['docmgm-document-ovw*'] ,$item ))]
        );

        if (Yii::$app->user->can('Application Admin') || Yii::$app->user->can('Company Admin')) {  
            array_push($items,        
            ['label' => Yii::t('app', 'Rodo'), 'icon' => 'user-secret', 'url' => Url::toRoute('/docmgm/rodo-ovw/index'), 'active' => (Yii::$app->CustomUtil->in_array(['docmgm-rodo-ovw*'] ,$item )), 'items' => [
                ['label' => Yii::t('db/log', 'Logs'), 'icon' => 'list', 'url' => Url::toRoute('/log/index'), 'active' =>  (Yii::$app->CustomUtil->in_array([$appId.'-log-show'] ,$item ))],			
            ]]);
        } else {
            array_push($items,        
            ['label' => Yii::t('app', 'Rodo'), 'icon' => 'user-secret', 'url' => Url::toRoute('/docmgm/rodo-ovw/index'), 'active' => (Yii::$app->CustomUtil->in_array(['docmgm-rodo-ovw*'] ,$item ))]);
        }

        array_push($items, 
            ['label' => Yii::t('db/event', 'Events'), 'icon' => 'calendar', 'url' => Url::toRoute('/event/index'), 'active' => (Yii::$app->CustomUtil->in_array([$appId.'-event*'] ,$item ))],
            ['label' => Yii::t('app', 'News'), 'icon' => 'globe', 'url' =>  Url::toRoute('/site/news'), 'active' => (Yii::$app->CustomUtil->in_array([$appId.'-balance-account*'] ,$item ))],
            ['label' => Yii::t('app', 'Trainings'), 'icon' => 'bullhorn', 'url' =>  Url::toRoute('/docmgm/trainings-ovw/index'), 'active' => (Yii::$app->CustomUtil->in_array([$appId.'-balance-account*'] ,$item ))]
        ); 

        return $items;
    }   
}?>



