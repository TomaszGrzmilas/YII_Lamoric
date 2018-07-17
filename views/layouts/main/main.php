<?php

/* @var $this \yii\web\View */
/* @var $content string */
namespace app\views\layouts\main;

use Yii;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\main\MainAsset;
use app\assets\main\BaseAsset;
use app\assets\main\Base2Asset;
use yii\web\View;

MainAsset::register($this); 

$appId = Yii::$app->id;

$baseAsset = [$appId.'-event-index', $appId.'-balance-account-index', $appId.'-member-index',$appId.'-member-import', $appId.'-category*', $appId.'-log*', $appId.'-company-index', $appId.'-workplace-index', 'user-admin*', 'rbac*', 'docmgm-document-index', 'docmgm-document-create'];

$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
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
</head>

<body>
	<?php $this->beginBody() ?>
    <div class="container-fluid">

        <div class="row">

			<?= $this->render('_main_menu', ['item' =>  $item,]); ?>

			<div class="page-right col-xs-11 col-md-9 col-lg-10">
				<?= $this->render('_navbar'); ?>
				<div class="main-content">
					<?= $content ?>
				</div>
			</div>
		</div>
	</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
