<?
use app\components\SideNav\SideNav;
use yii\helpers\Url;

?>

<div id="sidebar" class="sidebar responsive ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>
<?

    $items = MenuBuilder::BuildMenu($item);
            
    echo SideNav::widget([
        'items' =>  $items,
    ]);     
?>   
<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>
</div>
