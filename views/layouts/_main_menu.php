<?
use app\components\SideNav\SideNav;
use yii\helpers\Url;

$appId = Yii::$app->id;

?>

<div id="sidebar" class="sidebar responsive ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>
<?

    $items = [['label' => Yii::t('app', 'Home'), 'icon' => 'home', 'url' => Yii::$app->homeUrl, 'active' => (false)]];
    if (Yii::$app->user->can('Application Admin')) {  
        array_push($items,        
        ['label' => Yii::t('app', 'Administration'), 'icon' => 'desktop', 'active' => (Yii::$app->CustomUtil->in_array(['user*','rbac*', $appId.'-company*',$appId.'-workplace*','docmgm-document-index', 'docmgm-document-create', 'docmgm-document-view*','docmgm-document-update*' ,$appId.'-category*', $appId.'-log*', ],$item )), 'items' => [
            ['label' => Yii::t('db/authuser', 'Users'), 'icon' => 'user', 'url' => Url::toRoute('/user/admin/index'), 'active' => (Yii::$app->CustomUtil->in_array(['user*','rbac*'] ,$item ))],			
            ['label' => Yii::t('db/company', 'Companies'), 'icon' => 'building', 'url' => Url::toRoute('/company/index'), 'active' => (Yii::$app->CustomUtil->in_array([$appId.'-company*'] ,$item ))],
            ['label' => Yii::t('db/workplace', 'Workplaces'), 'icon' => 'briefcase', 'url' => Url::toRoute('/workplace/index'), 'active' => (Yii::$app->CustomUtil->in_array([$appId.'-workplace*'] ,$item ))],
            ['label' => Yii::t('db/document', 'Documents'), 'icon' => 'book', 'url' => Url::toRoute('/docmgm/document/index'), 'active' => (Yii::$app->CustomUtil->in_array(['docmgm-document-index', 'docmgm-document-create', 'docmgm-document-view*','docmgm-document-update*'] ,$item ))],
            ['label' => Yii::t('db/category', 'Categories'), 'icon' => 'tags', 'url' => Url::toRoute('/category/admin'), 'active' => (Yii::$app->CustomUtil->in_array([$appId.'-category*'] ,$item ))],                
            ['label' => Yii::t('db/log', 'Logs'), 'icon' => 'list', 'url' =>  Url::toRoute('/log/index'), 'active' => (Yii::$app->CustomUtil->in_array([$appId.'-log*'] ,$item ))],
        ]]);
    }
    array_push($items, 
            ['label' => Yii::t('app', 'Members'), 'icon' => 'users', 'url' =>  Url::toRoute('/member/index'), 'active' => (Yii::$app->CustomUtil->in_array([$appId.'-member*'] ,$item ))],
            ['label' => Yii::t('app', 'Payments'), 'icon' => 'money', 'url' =>  Url::toRoute('/balance-account/index'), 'active' => (false)],
            ['label' => Yii::t('app', 'Law'), 'icon' => 'balance-scale', 'url' => Url::toRoute('/docmgm/law-ovw/index'), 'active' => (Yii::$app->CustomUtil->in_array(['docmgm-law-ovw*'] ,$item ))],
            ['label' => Yii::t('app', 'Articles'), 'icon' => 'newspaper-o', 'url' => Url::toRoute('//docmgm/article-ovw/index'), 'active' => (Yii::$app->CustomUtil->in_array(['docmgm-article-ovw*'] ,$item ))],
            ['label' => Yii::t('app', 'Documents'), 'icon' => 'book', 'url' => Url::toRoute('/docmgm/document-ovw/index'), 'active' => (Yii::$app->CustomUtil->in_array(['docmgm-document-ovw*'] ,$item ))],
            ['label' => Yii::t('app', 'Rodo'), 'icon' => 'user-secret', 'url' => Url::toRoute('/docmgm/rodo-ovw/index'), 'active' => (Yii::$app->CustomUtil->in_array(['docmgm-rodo-ovw*'] ,$item ))]
    );
            
    echo SideNav::widget([
        'items' =>  $items,
    ]);     
?>   
<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>
</div>
