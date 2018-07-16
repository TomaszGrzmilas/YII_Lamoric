<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/company', 'Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

Url::remember();
?>
<div class="company-view">
    <div class="row">
        <div class="col-xs-8">
            <p>
                <?= Html::a(Yii::t('app', 'Back'), ['company/index'], ['class' => 'btn btn-info']) ?>            
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->company_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->company_id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'POST',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
                    'tax_id',
                    'zip_code',
                    'city',
                    'street',
                    'building',
                    'local',
                    'notes',
                    'contribution:currency',
                    'logo'=>[
                        'attribute' => 'logo',
                        'value' => isset($model->uploadedFile->img) ? $model->uploadedFile->img : 'Brak',
                        'format' => 'raw'
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>
