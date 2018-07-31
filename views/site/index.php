<?php
use app\assets\ace\AceAsset;

AceAsset::register($this); 
$this->title = Yii::$app->name;

?>

<div class="col-sm-12 infobox-container">

    <div class="infobox infobox-orange">
        <div class="infobox-icon">
            <i class="ace-icon fa fa-user"></i>
        </div>
        <div class="infobox-data">
            <span class="infobox-data-number"><?= $company->find()->count() ?></span>
            <div class="infobox-content"><?= YII::t('db/company', 'Companies'); ?></div>
        </div>
    </div>

    <div class="infobox infobox-black">
        <div class="infobox-icon">
            <i class="ace-icon fa fa-user"></i>
        </div>
        <div class="infobox-data">
            <span class="infobox-data-number"><?= $user->find()->count() ?></span>
            <div class="infobox-content"><?= YII::t('db/authuser', 'Users'); ?></div>
        </div>
    </div>

    <div class="infobox infobox-green2">
        <div class="infobox-icon">
            <i class="ace-icon fa fa-users"></i>
        </div>
        <div class="infobox-data">
            <span class="infobox-data-number"><?= $member->find()->count() ?></span>
            <div class="infobox-content"><?= YII::t('app','Members'); ?></div>
        </div>
    </div>

    <div class="infobox infobox-green">
        <div class="infobox-icon">
            <i class="ace-icon fa fa-money"></i>
        </div>

        <div class="infobox-data">
            <span class="infobox-data-number">0,00 zł</span>
            <div class="infobox-content"> <?= YII::t('app','Dues'); ?> </div>
        </div>
    </div>

    <div class="infobox infobox-pink">
        <div class="infobox-icon">
            <i class="ace-icon fa fa-book"></i>
        </div>
        <div class="infobox-data">
            <span class="infobox-data-number"><?= $document->find()->count() ?></span>
            <div class="infobox-content"><?=  YII::t('app', 'Documents') ?></div>
        </div>
    </div>

    <div class="infobox infobox-red">
        <div class="infobox-icon">
            <i class="ace-icon fa fa-money"></i>
        </div>

        <div class="infobox-data">
            <span class="infobox-data-number">0,00 zł</span>
            <div class="infobox-content"> <?= YII::t('app','Obligation'); ?> </div>
        </div>
    </div>							
</div>