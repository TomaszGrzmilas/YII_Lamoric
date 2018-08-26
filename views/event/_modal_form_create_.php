<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div id="modal-table" class="modal fade" role="dialog" tabindex="-1">
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
            ]) ?>
            </div>

            <div class="modal-footer no-margin-top">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

           