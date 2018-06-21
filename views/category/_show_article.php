<?
use kartik\form\ActiveForm;
use yii\helpers\Html;
use kartik\tree\TreeView;
use yii\helpers\Json;
use app\modules\docmgm\models\Document;
use app\modules\docmgm\models\DocumentSearch;
use yii\data\ActiveDataProvider;


$documents = Document::find()->where(['category_id'=>$params['node']['id']])->All();


if (array_key_exists('depth', $params['breadcrumbs']) && $params['breadcrumbs']['depth'] === null) {
    $params['breadcrumbs']['depth'] = '';
} elseif (!empty($params['breadcrumbs']['depth'])) {
    $params['breadcrumbs']['depth'] = (string) $params['breadcrumbs']['depth'];
}

$icons = is_array($params['iconsList']) ? array_values($params['iconsList']) :$params['iconsList'];

$dataToHash = $params['modelClass'] . !!$params['isAdmin'] . !!$params['softDelete'] . !!$params['showFormButtons'] . !!$params['showIDAttribute'] .
    !!$params['showNameAttribute'] .  $params['currUrl'] . $params['nodeView'] . $params['nodeSelected'] . Json::encode( $params['formOptions']) .
    Json::encode($params['nodeAddlViews']) . Json::encode($icons) . Json::encode($params['breadcrumbs']);

//$dataToHash = !!$params['node']->isNewRecord . $params['currUrl'] .  $params['modelClass'];


$form = ActiveForm::begin();
echo Html::hiddenInput('treeManageHash', Yii::$app->security->hashData($dataToHash, TreeView::module()->treeEncryptSalt));

?>


<div class="col-sm-12">
            <h3 class="row header smaller lighter blue">
                <span class="col-xs-6" style="font-family: sans-serif;"> <?= $params['node']['name'] ?> </span><!-- /.col -->  
            </h3>
    <div id="accordion" class="accordion-style1 panel-group">
    <? foreach ($documents as $doc) : ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?= $doc['doc_id'] ?>">
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

<?
 ActiveForm::end(); 

?>

