<?
namespace app\components\SideNavMain;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

class SideNav extends Widget
{
    public $items;
    private $body;
    public $iconPrefix = 'menu-icon fa fa-';

    public function init(){
        parent::init();
    }

    public function run(){
        $this->body .= $this->renderItems($this->items); 
        $this->body =  Html::tag('ul', $this->body, ['class' => 'left-menu-list']); 
        return $this->body;
    }

    public function renderItems($items, $type ='normal') {
        $localBody ='';

        foreach($items as $item){
            if (isset( $item['active']))
            {
                $active = $item['active'] ? 'active' : '';
            }

            if ($type == 'submenu') {
                $localBody .= '<li class="subitem ' . $active .'">';
            } else {
                $localBody .= '<li class="item ' . $active . '">';
            }

            if (isset($item['items'])) {
                $localBody .= $this->renderItem($item, 'submenu');
                $localBody .= '<ul class="left-menu-sublist">';
                $localBody .= $this->renderItems($item['items'], 'submenu') . '</ul>'; 
                   
            } else {
                $localBody .= $this->renderItem($item, 'normal');
            }
            $localBody .= '</li>';
        }
        return $localBody;
    }

    public function renderItem($item, $type ='normal') {
        
        if ($type == 'submenu') {
            $urlClass = 'hvr-pop';
        } else {
            $urlClass = 'hvr-pop';
        }

        $url = Url::to(ArrayHelper::getValue($item, 'url', '#'));
        $icon = '<i class="'. $this->iconPrefix . $item['icon'] . '"></i>&nbsp';

        $localBody =  Html::a($icon . $item['label'], $url, ['class'=> $urlClass]); 


        return $localBody;
    }
}?>

