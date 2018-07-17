<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Workplace */

$this->title = Yii::t('db/workplace', 'Create Workplace');
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/workplace', 'Workplaces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="workplace-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
