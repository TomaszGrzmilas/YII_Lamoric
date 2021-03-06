<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = Yii::t('db/company', 'Update Company: {name}', [
    'name' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/company', 'Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->company_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<div class="company-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
