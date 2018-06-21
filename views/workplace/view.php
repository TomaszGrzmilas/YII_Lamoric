<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Workplace */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/workplace', 'Workplaces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workplace-view">
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'company_id' => $model->company_id, 'workplace_id' => $model->workplace_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'company_id' => $model->company_id, 'workplace_id' => $model->workplace_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        'company_id'=>[
            'attribute' => 'company_id',
            'value' => $model->company->name,
        ],
        'name',
        ],
    ]) ?>

</div>
