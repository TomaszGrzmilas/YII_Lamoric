<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\web\View;
use app\modules\docmgm\DocmgmModule;

$this->title = $category->name;
$this->params['breadcrumbs'][] = ['label' => DocmgmModule::t('db/document', 'Law'), 'url' => ['/docmgm/law-ovw/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <? if (isset($categories[0])) : ?>
        <div class="col-xs-12 col-md-6">
            <div class="rights-boxb">
            
                <div class="rights-boxb-head">
                    <h3 title="Akty prawne" class="rights-boxb-title"><img src="template/default/images/icn-rights-subtitle-aktyprawne.png" alt=""> Akty prawne</h3>
                    <a href="#" class="hvr-pop btn-red" title="zobacz więcej">więcej <span class="glyphicon glyphicon-menu-right"></span></a>
                </div>
                
                <ul class="rights-boxb-lists">
                    <li class="item"><a href="#" class="hvr-pop" title="#">Lorem ipsum dolor sit amet</a></li>
                    <li class="item"><a href="#" class="hvr-pop" title="#">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </a></li>
                    <li class="item"><a href="#" class="hvr-pop" title="#">Ut enim ad minim veniam, quis nostrud exercitation</a></li>
                    <li class="item"><a href="#" class="hvr-pop" title="#">Ullamco laboris nisi ut aliquip ex ea commodo consequat. </a></li>
                    <li class="item"><a href="#" class="hvr-pop" title="#">Duis aute irure dolor in reprehenderit in voluptate.</a></li>
                    <li class="item"><a href="#" class="hvr-pop" title="#">Lorem ipsum dolor sit amet</a></li>
                    <li class="item"><a href="#" class="hvr-pop" title="#">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </a></li>
                    <li class="item"><a href="#" class="hvr-pop" title="#">Ut enim ad minim veniam, quis nostrud exercitation</a></li>
                    <li class="item"><a href="#" class="hvr-pop" title="#">Ullamco laboris nisi ut aliquip ex ea commodo consequat. </a></li>
                    <li class="item"><a href="#" class="hvr-pop" title="#">Duis aute irure dolor in reprehenderit in voluptate.</a></li>
                    <li class="item"><a href="#" class="hvr-pop" title="#">Lorem ipsum dolor sit amet</a></li>
                    <li class="item"><a href="#" class="hvr-pop" title="#">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </a></li>
                    <li class="item"><a href="#" class="hvr-pop" title="#">Ut enim ad minim veniam, quis nostrud exercitation</a></li>
                    <li class="item"><a href="#" class="hvr-pop" title="#">Ullamco laboris nisi ut aliquip ex ea commodo consequat. </a></li>
                    <li class="item"><a href="#" class="hvr-pop" title="#">Duis aute irure dolor in reprehenderit in voluptate.</a></li>
                    <li class="item"><a href="#" class="hvr-pop" title="#">Lorem ipsum dolor sit amet</a></li>
                    
                </ul>
            </div>
    </div>
    <? endif ?>
    <? if (isset($categories[1])) : ?>
    <div class="col-xs-12 col-md-6">
        <div class="row">
            <div class="col-xs-12 col-lg-6">

                <div class="rights-boxb">
                    <div class="rights-boxb-head">
                        <h3 title="Akty prawne" class="rights-boxb-title"><img src="template/default/images/icn-rights-subtitle-aktualnosci.png" alt=""> Aktualności</h3>
                        <a href="#" class="hvr-pop btn-red" title="zobacz więcej">więcej <span class="glyphicon glyphicon-menu-right"></span></a>
                    </div>
                    <ul class="rights-boxb-lists">
                        <li class="item"><a href="#" class="hvr-pop" title="#">Lorem ipsum dolor sit amet</a></li>
                        <li class="item"><a href="#" class="hvr-pop" title="#">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </a></li>
                        <li class="item"><a href="#" class="hvr-pop" title="#">Ut enim ad minim veniam, quis nostrud exercitation</a></li>
                        <li class="item"><a href="#" class="hvr-pop" title="#">Ullamco laboris nisi ut aliquip ex ea commodo consequat. </a></li>
                        <li class="item"><a href="#" class="hvr-pop" title="#">Duis aute irure dolor in reprehenderit in voluptate.</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-lg-6">
                <div class="rights-boxb">
                    <div class="rights-boxb-head">
                        <h3 title="Akty prawne" class="rights-boxb-title"><img src="template/default/images/icn-rights-subtitle-orzeczenia.png" alt=""> Orzeczenia</h3>
                        <a href="#" class="hvr-pop btn-red" title="zobacz więcej">więcej <span class="glyphicon glyphicon-menu-right"></span></a>
                    </div>
                    <ul class="rights-boxb-lists">
                        <li class="item"><a href="#" class="hvr-pop" title="#">Lorem ipsum dolor sit amet</a></li>
                        <li class="item"><a href="#" class="hvr-pop" title="#">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </a></li>
                        <li class="item"><a href="#" class="hvr-pop" title="#">Ut enim ad minim veniam, quis nostrud exercitation</a></li>
                        <li class="item"><a href="#" class="hvr-pop" title="#">Ullamco laboris nisi ut aliquip ex ea commodo consequat. </a></li>
                        <li class="item"><a href="#" class="hvr-pop" title="#">Duis aute irure dolor in reprehenderit in voluptate.</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="rights-boxb">
                    <div class="rights-boxb-head">
                        <h3 title="Akty prawne" class="rights-boxb-title"><img src="template/default/images/icn-rights-subtitle-komentarze.png" alt=""> Komentarze</h3>
                        <a href="#" class="hvr-pop btn-red" title="zobacz więcej">więcej <span class="glyphicon glyphicon-menu-right"></span></a>
                    </div>
                    <ul class="rights-boxb-lists">
                        <li class="item"><a href="#" class="hvr-pop" title="#">Lorem ipsum dolor sit amet</a></li>
                        <li class="item"><a href="#" class="hvr-pop" title="#">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </a></li>
                        <li class="item"><a href="#" class="hvr-pop" title="#">Ut enim ad minim veniam, quis nostrud exercitation</a></li>
                        <li class="item"><a href="#" class="hvr-pop" title="#">Ullamco laboris nisi ut aliquip ex ea commodo consequat. </a></li>
                        <li class="item"><a href="#" class="hvr-pop" title="#">Duis aute irure dolor in reprehenderit in voluptate.</a></li>
                    </ul>
                </div>
            </div>
    </div>
    <? endif ?>
</div>
