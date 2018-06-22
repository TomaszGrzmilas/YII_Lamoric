<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Workplace */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/workplace', 'Workplaces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

Url::remember();
?>

<div class="workplace-view">
    <div class="row">
        <div class="col-xs-4">
            <p>
                <?= Html::a(Yii::t('app', 'Back'), ['workplace/index'], ['class' => 'btn btn-gray']) ?>            
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'company_id' => $model->company_id, 'workplace_id' => $model->workplace_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'company_id' => $model->company_id, 'workplace_id' => $model->workplace_id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'POST',
                    ],
                ]) ?>
            </p>

           <?= 
            DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                    'company_id'=>[
                        'attribute' => 'company_id',
                        'value' => $model->company->name,
                    ],
                    'name',
                    ],
                ]) 
            ?>
        </div>
    </div>
</div>
