<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;


$memberDocs = $model->memberdocs;

?>

<div class="list-row-extended open">
    <div class="list-cell-more" style="display: block;">
        <div class="row">
            <div class="col-xs-12 col-md-3">
                <div class="list-cell-more-box">

                    <h3><?= Yii::t('app','Personal data') ?> </h3>

                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label"><?= $model->getAttributeLabel('name') ?></div>
                        <div class="list-cell-more-cont-value"><?= $model->name ?></div>
                    </div>

                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label"><?= $model->getAttributeLabel('surname') ?></div>
                        <div class="list-cell-more-cont-value"><?= $model->surname ?></div>
                    </div>

                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label"><?= $model->getAttributeLabel('pesel') ?></div>
                        <div class="list-cell-more-cont-value"><?= $model->pesel ?></div>
                    </div>
                </div>
            </div>
     
            <div class="col-xs-12 col-md-3">
                <div class="list-cell-more-box">

                    <h3><?= Yii::t('app','Contact') ?></h3>

                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label"><?= $model->getAttributeLabel('phone') ?></div>
                        <div class="list-cell-more-cont-value"><?= $model->phone ?></div>
                    </div>

                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label"><?= $model->getAttributeLabel('email') ?></div>
                        <div class="list-cell-more-cont-value"><?= $model->email ?></div>
                    </div>

                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label">Adres</div>
                        <div class="list-cell-more-cont-value"><?= $model->AddressLine1 ?></div>
                    </div>

                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label">Poczta</div>
                        <div class="list-cell-more-cont-value"><?= $model->AddressLine2 ?></div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6">
                <div class="list-cell-more-box">

                    <h3><?= Yii::t('app','Membership') ?></h3>

                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label"><?= Yii::t('db/company','Company') ?></div>
                        <div class="list-cell-more-cont-value"><?= $model->company->name ?></div>
                    </div>

                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label"><?= Yii::t('db/workplace','Workplace') ?></div>
                        <div class="list-cell-more-cont-value"><?= $model->company->AddressLine1 . ', ' .  $model->company->AddressLine2 ?></div>
                    </div>
                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label"><?= $model->getAttributeLabel('contribution') ?></div>
                        <div class="list-cell-more-cont-value"><?= $model->company->contribution . ' zł' ?> </div>
                    </div>
                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label">Saldo</div>
                        <div class="list-cell-more-cont-value">----</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-12 col-md-6">
                <div class="list-cell-more-box">
                    <h3> <?= $model->getAttributeLabel('notes') ?></h3>
                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-area"><?= $model->notes ?></div>
                    </div>
                </div>
            </div>

            <? if(is_array($memberDocs)) : ?>
                <div class="col-xs-12 col-md-6">
                    <div class="list-cell-more-box">
                    
                    <h3><?= Yii::t('app','Documents') ?></h3>
                        <? foreach($memberDocs as $doc) : ?>
                            <div class="list-cell-more-cont">
                                <div class="list-cell-more-cont-value">
                                    <?= Html::a($doc['title'], 
                                        '#', 
                                        ['class'=> 'hvr-pop', 'title'=>'Otwórz plik', 'onclick'=>'printMemberDoc('.$doc['member_doc_id'].','.  $model->id .')']); 
                                    ?>
                                </div>
                            </div>
                        <? endforeach ?>
                    </div>
                </div>
            <? endif ?>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <?=
                    Html::ul(
                        [
                            Html::a(Yii::t('app', 'Update') . HTML::img('@web/layout.main\images\icn-big-listaskladek.png', ['style' => 'height: 32px; padding: 0 0 0 8px; vertical-align: baseline;']), 
                            ['update', 'id' => $model->id],
                            [
                                'data-pjax' => 0, 
                                'class' => 'title-page-btns hvr-pop', 
                                'title' => Yii::t('app', 'Edit')
                            ]),
                        ],
                        ['class'=> 'list-cell-more-menu', 'encode'=> false]);     
                ?>
            </div>
            <div class="col-xs-12 col-md-4">
                <?=
                    Html::ul(
                        [
                            Html::a(Yii::t('app', 'Delete') . HTML::img('@web/layout.main\images\icn-big-delete.png', ['style' => 'height: 32px; padding: 0 0 0 8px; vertical-align: baseline;']),
                                ['delete', 'id' => $model->id],
                                [
                                'class' => 'title-page-btns hvr-pop',
                                'title' => Yii::t('app', 'Delete'),
                                'data' => [
                                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                    'method' => 'POST',
                                ],
                            ])
                        ],
                        ['class'=> 'list-cell-more-menu text-right', 'encode'=> false]);     
                ?>
            </div>
        </div>
    </div>
</div>

    