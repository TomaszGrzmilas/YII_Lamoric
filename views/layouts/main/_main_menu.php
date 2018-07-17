<?
use app\components\SideNavMain\SideNav;
use yii\helpers\Url;
use yii\helpers\Html;
use app\components\MenuBuilder;

?>

<div class="left-menu col-xs-12 col-md-3 col-lg-2">
    <div class="show-button visible-xs visible-sm">
        <span class="glyphicon glyphicon-menu-hamburger"></span>
    </div>

    <a href="#" class="logo" title="Lamoric">
        <?= HTML::img('@web/layout.main\images\lamornic-log.png', ['alt' => 'Lamoric']) ?>
    </a>
    <?
        $items = MenuBuilder::BuildMenu($item);

        echo SideNav::widget([
            'items' =>  $items,
        ]);     
    ?>   
</div>

