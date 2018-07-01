<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\BaseAsset;
use app\assets\RedAsset;
use app\assets\Base2Asset;
use yii\web\View;

RedAsset::register($this); 

$appId = Yii::$app->id;

$baseAsset = [$appId.'-member-index',$appId.'-member-import', $appId.'-category*', $appId.'-log*', $appId.'-company-index', $appId.'-workplace-index', 'user-admin*', 'rbac*', 'docmgm-document-index', 'docmgm-document-create'];

$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

	<?
	if (Yii::$app->CustomUtil->in_array($baseAsset, $item)) {
		BaseAsset::register($this); 
	} else
	{
		Base2Asset::register($this); 
	}

	$this->head()
	?>

	<style>@keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}@-moz-keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}@-webkit-keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}@-ms-keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}@-o-keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}.ace-save-state{animation-duration:10ms;-o-animation-duration:10ms;-ms-animation-duration:10ms;-moz-animation-duration:10ms;-webkit-animation-duration:10ms;animation-delay:0s;-o-animation-delay:0s;-ms-animation-delay:0s;-moz-animation-delay:0s;-webkit-animation-delay:0s;animation-name:nodeInserted;-o-animation-name:nodeInserted;-ms-animation-name:nodeInserted;-moz-animation-name:nodeInserted;-webkit-animation-name:nodeInserted}</style>
	<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
</head>

<body class="no-skin">
	<?php $this->beginBody() ?>
	<div class="wrap">
		<?= $this->render('@app/views/layouts/_navbar'); ?>

<div class="main-container ace-save-state" id="main-container">
	<?= $this->render('@app/views/layouts/_main_menu', [
		'item' =>  $item,
	]); 
	?>
		<div class="main-content">
			<div class="main-content-inner">
				<div class="breadcrumbs ace-save-state" id="breadcrumbs">
					<ul class="breadcrumb">
						<?= Breadcrumbs::widget([
						'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [' '],
						'homeLink' => ['label' => Yii::t('app', 'Home'), 'url' => Yii::$app->homeUrl],
						]) ?>
					</ul><!-- /.breadcrumb -->
					<!-- 
					<div class="nav-search" id="nav-search">
						<form class="form-search">
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
						</form>
					</div><!-- /.nav-search -->
				</div>
				<div class="main-container ace-save-state" id="main-container">
					<div class="main-content">
						<div class="main-content-inner">	
							<div class="page-content">
								<?= $content ?>
							</div><!-- /.page-content -->
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.main-content -->	
	</div><!-- /.main-container -->

<?php $this->endBody() ?>
<?
$this->registerJs(
	"if('ontouchstart' in document.documentElement) document.write(\"<script src='assets/js/jquery.mobile.custom.min.js'>\"+\"<\"+\"/script>\");",
	View::POS_END,
	'my-button-handler'
);
?>
</body>
</html>
<?php $this->endPage() ?>
