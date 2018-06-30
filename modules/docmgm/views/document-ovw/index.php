<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\web\View;
use app\modules\docmgm\DocmgmModule;


$this->title = $category->name;
$this->params['breadcrumbs'][] = ['label' => DocmgmModule::t('db/document', 'Documents'), 'url' => ['/docmgm/document-ovw/index']];
$this->params['breadcrumbs'][] = $this->title;
/*
echo '<pre>';
print_r($categories);
echo '</pre>';

foreach ($documents as $key =>$doc) {
    echo $key .'-';
    echo $doc;
    echo '<br>';

}
*/
?>


<div class="col-sm-6">
            <h3 class="row header smaller red">
                <span class="col-xs-6" style="font-family: sans-serif;"> <?= $category->name ?> </span><!-- /.col -->  
            </h3>
    <div id="accordion" class="accordion-style1 panel-group">
    <? foreach ($documents as $doc) : ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle red" data-toggle="collapse" data-parent="#accordion" href="#<?= $doc['doc_id'] ?>">
                        <i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                        &nbsp;<?= $doc['title'] ?>
                    </a>
                </h4>
            </div>

            <div class="panel-collapse collapse" id="<?= $doc['doc_id'] ?>">
                <div class="panel-body">
                <?= $doc['text'] ?>
                <? if ($doc['file'] != '') : ?>
                    <hr/>
                 
                        <i class="fa-file-pdf-o" style ="font-family:FontAwesome; font-style:normal; font-size: 15px;"> 
                        <?= $doc['uploadedFile']->filelink ?>
                        &nbsp; </i>
                    
                <? endif; ?>
                </div>
            </div>
        </div>
    <? endforeach; ?>
    </div>
</div><!-- /.col -->

<div class="col-sm-6">
    <div class="text-left">
        <div class="col-sm-12">
            <? foreach ($categories as $key => $cat) : ?>
                <div class="btn-group" style="margin: 20px;">
                <?= Html::a($cat, ['/docmgm/document-ovw/index', 'id' => $key], ['class' => 'btn btn-danger']) ?>
            </div>

            <?php endforeach; ?>
        </div><!-- /.col -->
    </div>
</div>