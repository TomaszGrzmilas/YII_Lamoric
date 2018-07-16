<?
use yii\helpers\Url;
use yii\helpers\Html;
?>


<div class="panel-client">
	<div class="row">
		<? if (isset(Yii::$app->user->identity->profile->company->uploadedFile->Img)) : ?>
			<div class="logo col-xs-12 col-sm-4 col-md-4">
				<?= Yii::$app->user->identity->profile->company->uploadedFile->Img('175px','40px') ?>
			</div>
		<? endif; ?>
		<!-- konto klienta & logout -->
		
		<div class="panel-account col-xs-12 col-sm-8 col-md-8">
			<div class="user">
				Zalogowany jako: <a href="<?=Url::toRoute('/user/settings/profile')?>" class="hvr-push"> <? if (isset(Yii::$app->user->identity->username)) {echo Yii::$app->user->identity->username;} ?> </a>
			</div>
			<?= Html::a('<i class="ace-icon fa fa-power-off"></i>  '.Yii::t('app', 'Logout'), 
							Url::toRoute('/user/security/logout'),         
							[
							'data-method' => 'post',
							'class' => 'logout hvr-push'
							]) ?>
		</div>
	</div>
</div>