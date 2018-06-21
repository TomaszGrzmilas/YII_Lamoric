<?
namespace app\components\SideNav;

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
        $this->body .=   $this->renderItems($this->items); 
        $this->body =  Html::tag('ul', $this->body, ['class' => 'nav nav-list']); 
        return $this->body;
    }

    public function renderItems($items) {
        $localBody ='';

        foreach($items as $item){
            $active = Url::to(ArrayHelper::getValue($item, 'active', false));
            if ($active) {
                $localBody .= '<li class="open">';
            } else {
                $localBody .= '<li>';
            }

            if (isset($item['items'])) {
                $localBody .= $this->renderItem($item, 'submenu');
                $localBody .= '<ul class="submenu">';
                $localBody .= $this->renderItems($item['items']) . '</ul>'; 
                   
            } else {
                $localBody .= $this->renderItem($item, 'normal');
            }
            $localBody .= '</li>';
        }
        return $localBody;
    }

    public function renderItem($item, $type ='normal') {
        
        if ($type == 'submenu') {
            $urlClass = 'dropdown-toggle';
        } else {
            $urlClass = '';
        }

        $url = Url::to(ArrayHelper::getValue($item, 'url', '#'));
        $icon = '<i class="'. $this->iconPrefix . $item['icon'] . '"></i>';
        $localBody =  Html::tag('span', $item['label'], ['class'=>'menu-text']); 
        $localBody =  $icon . $localBody;

        if($type == 'submenu'){
            $localBody .= '<b class="arrow fa fa-angle-down"></b>';
        }

        $localBody =  Html::a($localBody, $url, ['class'=> $urlClass]); 

        if($type == 'submenu'){
            $localBody .= '<b class="arrow"></b>';

        }
        return $localBody;
    }
}?>

