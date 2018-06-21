<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('db/workplace', 'Workplaces');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workplace-index">
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a(Yii::t('db/workplace', 'Create Workplace'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'company_id' => [
                'attribute' => 'company_id',
                'value'=> 'company.name'
            ],
            'name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
