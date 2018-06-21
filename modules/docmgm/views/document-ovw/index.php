<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\web\View;

$first = true;

foreach ($categories as $key =>$doc) {
    echo $key .'-';
    echo $doc;
    echo '<br>';

}
$this->registerJs(
	"$(document).ready(function(){
        $('.dropdown-submenu a.test').on(\"click\", function(e){
          $(this).next('ul').toggle();
          e.stopPropagation();
          e.preventDefault();
        });
      });",
	View::POS_END,
	'dropdown-sub-menu'
);

?>
    <div class="text-center">
        <div class="col-sm-12">
            <? foreach ($categories as $key => $cat) : ?>
                <div class="btn-group" style="margin: 20px;">
                <button data-toggle="dropdown" class="btn btn-white btn-lg dropdown-toggle">
                    <?= $cat ?>
                    <i class="ace-icon fa fa-angle-down icon-on-right"></i>
                </button>

                <ul class="dropdown-menu ">
                    <li>
                        <a href="#">Action</a>
                    </li>

                     <li class="dropdown-submenu">
                    <a class="test" href="#">Actsssdsddion</a>
                                <ul class="dropdown-menu ">
                                <li>
                                    <a href="#">Action</a>
                                </li>

                                <li>
                                    <a href="#">Another action</a>
                                </li>

                                <li>
                                    <a href="#">Something else here</a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="#">Separated link</a>
                                </li>
                            </ul>
                    </li>

                    <li>
                        <a href="#">Something else here</a>
                    </li>

                    <li class="divider"></li>

                    <li>
                        <a href="#">Separated link</a>
                    </li>
                </ul>
            </div>

            <?php endforeach; ?>
        </div><!-- /.col -->
    </div>


