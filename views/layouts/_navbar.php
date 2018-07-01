<?
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div id="navbar" class="navbar navbar-default ace-save-state">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>

		<div class="navbar-header pull-left">
			<a href="index.html" class="navbar-brand">
				<?= HTML::img('@web/images/logo3.png', ['alt' => 'My logo', 'style'=>'width: 175px;']) ?>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<? if (isset(Yii::$app->user->identity->profile->company->uploadedFile->Img)) : ?>
					<li>
						<?= Yii::$app->user->identity->profile->company->uploadedFile->Img ?>
					</li>
				<? endif; ?>
				<li class="transparent dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						
						<span class="user-info">
							<small><?= Yii::t('app', 'Loged as:') ?></small>
							<? if (isset(Yii::$app->user->identity->username)) {echo Yii::$app->user->identity->username;} ?>
						</span>
						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="<?=Url::toRoute('/user/settings/profile')?>">
								<i class="ace-icon fa fa-user"></i>
								<?=Yii::t('app', 'Profile')?>
							</a>
						</li>

						<li class="divider"></li>

						<li>
						<?= Html::a('<i class="ace-icon fa fa-power-off"></i>  '.Yii::t('app', 'Logout'), 
							Url::toRoute('/user/security/logout'),         
							[
							'data-method' => 'post',
							]) ?>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->
</div>