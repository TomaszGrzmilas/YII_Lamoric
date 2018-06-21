<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Workplace */

$this->title = Yii::t('db/workplace', 'Update Workplace: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/workplace', 'Workplaces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'company_id' => $model->company_id, 'workplace_id' => $model->workplace_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="workplace-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
