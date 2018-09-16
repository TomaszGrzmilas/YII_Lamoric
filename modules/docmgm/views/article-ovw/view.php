<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\modules\docmgm\DocmgmModule;

$this->params['breadcrumbs'][] = ['label' => DocmgmModule::t('db/document', 'Articles'), 'url' => ['/docmgm/article-ovw/index']];
$this->params['breadcrumbs'][] = $model->title;

Url::remember();

echo $this->render('/document/_single_article', [
        'model' => $model,
    ]);
?>