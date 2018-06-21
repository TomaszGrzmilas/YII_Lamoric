<?

use kartik\tree\TreeView;
use app\modules\articlemgm\models\ArticleCategory;
use app\assets\TableAsset;
use yii\web\View;

TableAsset::register($this); 
/*
$this->registerJs(
	"function test() {jQuery(\"#my-tree\").treeview(\"collapseAll\");}",
	View::POS_READY,
	'my-tree-colapse'
);
*/
echo TreeView::widget([
    // single query fetch to render the tree
    'id' => 'my-tree',
    'query'             => ArticleCategory::find()->where(['root'=> $root])->addOrderBy('root, lft'), 
    'headingOptions'    => ['label' => 'Kategorie'],
    'fontAwesome' => true,     // optional'
    'isAdmin'           => true,                       // optional (toggle to enable admin mode)
  //  'showFormButtons' => false,
    'iconEditSettings'=> [
        'show' => 'list',
        'type' => TreeView::ICON_CSS,
        'listData' => [
            'folder' => 'Folder',
            'file' => 'File',
            'mobile' => 'Phone',
            'bell' => 'Bell',
            'comments' => 'kropki',
            'book' => 'książki'
        ]
    ],
    'multiple' => false,
    'nodeView' => '@app/modules/articlemgm/views/article-category/_show_article',
  'wrapperTemplate' =>'
                        {header}
                      {tree}',
  //  'toolbarOptions'=> ['class'=>'hide'],
    'displayValue'      => $root['id'],                           // initial display value
    'softDelete'      => false,                        // normally not needed to change
    //'cacheSettings'   => ['enableCache' => true]      // normally not needed to change
]);



?>