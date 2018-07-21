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
use app\assets\main\JsAsset;
use yii\web\View;

$appId = Yii::$app->id;
$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

$JsAsset = ['docmgm-document-ovw*','docmgm-law-ovw*','docmgm-article-ovw*','docmgm-rodo-ovw*'];
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
	<?	
		MainAsset::register($this); 
		if (Yii::$app->CustomUtil->in_array($JsAsset, $item)) {
			JsAsset::register($this); 
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

			<div id="breadcrumbs">
				<?= Breadcrumbs::widget([
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [' '],
				'homeLink' => ['label' => Yii::t('app', 'Home'), 'url' => Yii::$app->homeUrl],
				'options' => ['style' => 'background-color: white',
							'class' => 'breadcrumb',
							 ]
				]) ?>
				
			</div>

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
