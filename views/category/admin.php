<?

use kartik\tree\TreeView;
use app\models\Category;

$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

$this->title = Yii::t('db/category', 'Categories');
$this->params['breadcrumbs'][] = $this->title;

echo TreeView::widget([
    'query'             => Category::find()->addOrderBy('root, lft'), 
    'headingOptions'    => ['label' => Yii::t('db/category', 'Categories')],
    'fontAwesome' => true,     
    'isAdmin'           => false,                       // optional (toggle to enable admin mode)
    'showFormButtons' => true,
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