<?

use kartik\tree\TreeView;
use app\models\Category;
use app\assets\TableAsset;

TableAsset::register($this); 

echo TreeView::widget([
    // single query fetch to render the tree
    'query'             => Category::find()->addOrderBy('root, lft'), 
    'headingOptions'    => ['label' => Yii::t('db/category', 'Categories')],
    'fontAwesome' => true,     // optional'
    'isAdmin'           => true,                       // optional (toggle to enable admin mode)
    'showFormButtons' => false,
    'iconEditSettings'=> [
        'show' => 'list',
        'type' => TreeView::ICON_CSS,
        'listData' => [
            'folder' => 'Folder',
            'file' => 'File',
            'mobile' => 'Phone',
            'bell' => 'Bell',
            'comments' => 'kropki',
            'gavel' => 'mlotek',
            'briefcase'=>'walizka',
            'male' => 'facet',
            'user-secret' => 'agent',
            'balance-scale' => 'szalka',
            'book'=>'książka',
            'newspaper-o'=>'gazeta'
        ]
    ],
//    'wrapperTemplate' =>'
  //                      {header}
  //                      {tree}',
  //  'toolbarOptions'=> ['class'=>'hide'],
    'displayValue'      => 1,                           // initial display value
    'softDelete'      => true,                        // normally not needed to change
    //'cacheSettings'   => ['enableCache' => true]      // normally not needed to change
]);

?>