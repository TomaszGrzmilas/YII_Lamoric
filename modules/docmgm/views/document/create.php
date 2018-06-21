<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\docmgm\models\Document */

$this->title = Yii::t('db/docmgm', 'Create Document');
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/docmgm', 'Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
