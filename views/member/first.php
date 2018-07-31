<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\helpers\Url;

$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

$this->title = Yii::t('db/member', 'Members');
$this->params['breadcrumbs'][] = $this->title;

$addButtonTitle = Yii::t('db/member', 'Create Member');

Url::remember();

?>

<div class="<?=$item?>">
    <div class="btn-group" style="margin: 20px;">
        <?= Html::a(Yii::t('db/member', 'Create Member'), Url::toRoute('/member/create'), ['class'=> 'btn btn-danger']); ?>
    </div>
    <div class="btn-group" style="margin: 20px;">
        <?= Html::a(Yii::t('db/member', 'Member list'), Url::toRoute('/member/list'), ['class'=> 'btn btn-danger']); ?>
    </div>
    
    <div class="btn-group" style="margin: 20px;">
        <?= Html::a(Yii::t('app', 'Payments'), Url::toRoute('/balance-account/index'), ['class'=> 'btn btn-danger']); ?>
    </div>
    <div class="btn-group" style="margin: 20px;">
        <a class="btn btn-danger" href="">Sprawdź zaległe składki</a>            
    </div>
</div>
