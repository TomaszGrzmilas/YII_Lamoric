<?php

/* @var $this yii\web\View */

$this->title = 'Home';
?>

<div class="col-sm-7 infobox-container">

    <div class="infobox infobox-green">
        <div class="infobox-icon">
            <i class="ace-icon fa fa-user"></i>
        </div>
        <div class="infobox-data">
            <span class="infobox-data-number">86</span>
            <div class="infobox-content"><?= YII::t('app','Members'); ?></div>
        </div>
        <div class="stat stat-success">8%</div>
    </div>

    <div class="infobox infobox-green">
        <div class="infobox-icon">
            <i class="ace-icon fa fa-money"></i>
        </div>

        <div class="infobox-data">
            <span class="infobox-data-number">1.200,50 zł</span>
            <div class="infobox-content"> <?= YII::t('app','Dues'); ?> </div>
        </div>
    </div>

    <div class="infobox infobox-pink">
        <div class="infobox-icon">
            <i class="ace-icon fa fa-book"></i>
        </div>
        <div class="infobox-data">
            <span class="infobox-data-number">3</span>
            <div class="infobox-content">Nowe dokumenty</div>
        </div>
    </div>

    <div class="infobox infobox-red">
        <div class="infobox-icon">
            <i class="ace-icon fa fa-money"></i>
        </div>

        <div class="infobox-data">
            <span class="infobox-data-number">200,00 zł</span>
            <div class="infobox-content"> <?= YII::t('app','Obligation'); ?> </div>
        </div>
    </div>							
</div>