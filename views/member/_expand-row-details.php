<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>

<div class="list-row-extended open">
    <div class="list-cell-more" style="display: block;">
        <div class="row">
            <div class="col-xs-12 col-md-3">
                <div class="list-cell-more-box">

                    <h3>Dane personalne</h3>

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

                    <h3>Kontakt</h3>

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
                        <div class="list-cell-more-cont-value"><?= $model->street . ' ' . $model->building . $model->local ?></div>
                    </div>

                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label">Poczta</div>
                        <div class="list-cell-more-cont-value"><?= $model->zip_code . ' ' . $model->city ?></div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6">
                <div class="list-cell-more-box">

                    <h3>Członkostwo</h3>

                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label"><?= $model->getAttributeLabel('company') ?></div>
                        <div class="list-cell-more-cont-value"><?= $model->company->name ?></div>
                    </div>

                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label">Miejsce pracy</div>
                        <div class="list-cell-more-cont-value">TESCO Katowice, Chorzowska 107, 40-001 Katowice</div>
                    </div>
                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label">Składki</div>
                        <div class="list-cell-more-cont-value">199,90zł <span class="more-cont-last-pay">(ost. wpłata 1/9/2018)</span></div>
                    </div>
                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label">Saldo</div>
                        <div class="list-cell-more-cont-value">-15,34zł</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="list-cell-more-box">
                    <h3>Uwagi</h3>
                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-area">Organizacja</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="list-cell-more-box">
                    <h3>Dokumenty</h3>
                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label">[20/08/2018] [pdf]</div>
                        <div class="list-cell-more-cont-value"><a href="#" title="Otwórz plik" class="hvr-pop">umowa_czlonkowstwa_skan.pdf</a></div>
                    </div>
                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label">[20/08/2018] [pdf]</div>
                        <div class="list-cell-more-cont-value"><a href="#" title="Otwórz plik" class="hvr-pop">umowa_czlonkowstwa_skan.pdf</a></div>
                    </div>
                    <div class="list-cell-more-cont">
                        <div class="list-cell-more-cont-label">[20/08/2018] [pdf]</div>
                        <div class="list-cell-more-cont-value"><a href="#" title="Otwórz plik" class="hvr-pop">umowa_czlonkowstwa_skan.pdf</a></div>
                    </div>
                </div>
            </div>
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

    