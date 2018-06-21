<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\TableAsset;
/* @var $this yii\web\View */
/* @var $model app\modules\docmgm\models\DocCategory */
/* @var $form yii\widgets\ActiveForm */
/* @var $title string */

TableAsset::register($this); 
?>

<div id="modal-table" class="modal fade" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    <?= $title ?>
                </div>
            </div>

            <div class="modal-body">
            <?= $this->render('_form', [
                'model' => $model,
                'item' => $item,
            ]) ?>
            </div>

            <div class="modal-footer no-margin-top">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

           