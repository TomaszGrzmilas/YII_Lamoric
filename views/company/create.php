<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = Yii::t('db/company', 'Create Company');
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/company', 'Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="company-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
