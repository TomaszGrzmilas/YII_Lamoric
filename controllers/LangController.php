<?php
class LangController extends CController
{
    function init()
    {
        parent::init();

        if (isset($_POST['_lang']))
        {
            Yii::$app->language = $_POST['_lang'];
            Yii::$app->session['_lang'] = Yii::$app->language;
        }
        else if (isset(Yii::$app->session['_lang']))
        {
            Yii::$app->language = $app->session['_lang'];
        }
    }
}
?>
