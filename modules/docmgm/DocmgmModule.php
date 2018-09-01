<?php

namespace app\modules\docmgm;

use Yii;

/**
 * docmgm module definition class
 */
class DocmgmModule extends \yii\base\Module
{

    public $controllerNamespace = 'app\modules\docmgm\controllers';
    public $defaultRoute = 'document';
  //  public $defaultController = 'Document';

    public function init()
    {
        parent::init();
        $this->registerTranslations();
        // custom initialization code goes here
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['modules/docmgm/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath' => '@app/modules/docmgm/messages/DbLabelTranslations',
            'fileMap' => [
                'modules/docmgm/db/document' => 'document.php',
                'modules/docmgm/db/doccategory' => 'doccategory.php',
                'modules/docmgm/db/memberdoc' => 'memberdoc.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/docmgm/' . $category, $message, $params, $language);
    }
}
