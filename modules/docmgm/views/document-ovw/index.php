<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\web\View;

$first = true;


/*
echo '<pre>';
print_r($categories);
echo '</pre>';
foreach ($categories as $key =>$doc) {
    echo $key .'-';
    echo $doc;
    echo '<br>';

}
*/
?>

    <div class="text-center">
        <div class="col-sm-12">
            <? foreach ($categories as $key => $cat) : ?>
                <div class="btn-group" style="margin: 20px;">
                <button data-toggle="dropdown" class="btn btn-white btn-lg dropdown-toggle">
                    <?= $cat ?>
                </button>

            </div>

            <?php endforeach; ?>
        </div><!-- /.col -->
    </div>