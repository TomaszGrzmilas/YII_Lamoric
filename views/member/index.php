<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\assets\AppAsset;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
AppAsset::register($this);
$this->title = Yii::t('db/member', 'Members');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">
    <?php Pjax::begin(); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'surname',
            'pesel',
            'zip_code',
            'city',
            'street',
            'building',
            'local',
            'phone',
            'email:email',
            'company_id',
            'workplace_id',
            'notes',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
