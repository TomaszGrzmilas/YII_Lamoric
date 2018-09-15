<?php

namespace app\models\category;

use Yii;
use yii\behaviors\TimestampBehavior;
use creocoder\nestedsets\NestedSetsBehavior;
use yii\helpers\ArrayHelper;
use app\components\LogBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $id Unique tree node identifier
 * @property int $root Tree root identifier
 * @property int $lft Nested set left property
 * @property int $rgt Nested set right property
 * @property int $lvl Nested set level / depth
 * @property string $name The tree node name / label
 * @property string $icon The icon to use for the node
 * @property int $icon_type Icon Type: 1 = CSS Class, 2 = Raw Markup
 * @property int $active Whether the node is active (will be set to false on deletion)
 * @property int $selected Whether the node is selected/checked by default
 * @property int $disabled Whether the node is enabled
 * @property int $readonly Whether the node is read only (unlike disabled - will allow toolbar actions)
 * @property int $visible Whether the node is visible
 * @property int $collapsed Whether the node is collapsed by default
 * @property int $movable_u Whether the node is movable one position up
 * @property int $movable_d Whether the node is movable one position down
 * @property int $movable_l Whether the node is movable to the left (from sibling to parent)
 * @property int $movable_r Whether the node is movable to the right (from sibling to child)
 * @property int $removable Whether the node is removable (any children below will be moved as siblings before deletion)
 * @property int $removable_all Whether the node is removable along with descendants
 * @property int $created_at
 * @property int $updated_at
 * @property int $child_allowed
 */
class Category extends \kartik\tree\models\Tree
{

    public static function tableName()
    {
        return '{{%category}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'tree' => [
                'class' => NestedSetsBehavior::className(),
                 'treeAttribute' => 'root',
                 'leftAttribute' => 'lft',
                 'rightAttribute' => 'rgt',
                 'depthAttribute' => 'lvl',
            ],
            [
                'class' => LogBehavior::className(),
                'indexColumn' => 'id',
                'objName' => 'category'
            ]
        ];
    }

    public function rules()
    {
        $rules = [
            [['image'], 'safe'], 
        ];
        return array_merge(parent::rules(), $rules);
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('db/category', 'ID'),
            'root' => Yii::t('db/category', 'Root'),
            'lft' => Yii::t('db/category', 'Lft'),
            'rgt' => Yii::t('db/category', 'Rgt'),
            'lvl' => Yii::t('db/category', 'Lvl'),
            'name' => Yii::t('db/category', 'Name'),
            'icon' => Yii::t('db/category', 'Icon'),
            'icon_type' => Yii::t('db/category', 'Icon Type'),
            'active' => Yii::t('db/category', 'Active'),
            'selected' => Yii::t('db/category', 'Selected'),
            'disabled' => Yii::t('db/category', 'Disabled'),
            'readonly' => Yii::t('db/category', 'Readonly'),
            'visible' => Yii::t('db/category', 'Visible'),
            'collapsed' => Yii::t('db/category', 'Collapsed'),
            'movable_u' => Yii::t('db/category', 'Movable U'),
            'movable_d' => Yii::t('db/category', 'Movable D'),
            'movable_l' => Yii::t('db/category', 'Movable L'),
            'movable_r' => Yii::t('db/category', 'Movable R'),
            'removable' => Yii::t('db/category', 'Removable'),
            'removable_all' => Yii::t('db/category', 'Removable All'),
            'created_at' => Yii::t('db/category', 'Created At'),
            'updated_at' => Yii::t('db/category', 'Updated At'),
            'child_allowed' => Yii::t('db/category', 'Child allowed'),
            'image' => Yii::t('db/category', 'Image'),
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }

    public function isReadonly()
    {
      //  if (Yii::$app->user->identity !== 'rootd') {
      //      return true;
      //  }
        return parent::isReadonly();
    }

    public function getSubCategories($id)
    {
        $Categories = Category::find()->select(['id','name'])->where(['root' => $id])->andWhere(['!=','id', $id])->addOrderBy('root, lft')->asArray()->all();
        return ArrayHelper::map($Categories, 'id', 'name');
    }

    public function getDocuments()
    {
        $doc = new \app\modules\docmgm\models\Document();
        $search = array();
        $subcat = $this->getSubCategories($this->id);

        foreach ($subcat as $key => $value) {
            array_push($search,$key);
        }
        array_push($search,$this->id);

        return $doc->find()->where(['in','category_id' , $search])->all();
    }

    public function beforeSave($insert)
    {
        $uploadFile = \yii\web\UploadedFile::getInstance($this, 'image');

        if (!empty($uploadFile)) {
            $file =  Yii::getAlias('@app') . '/web/media/upload/category_images/' . Yii::$app->security->generateRandomString() . '.' . $uploadFile->extension;
            $uploadFile->saveAs($file);
            $this->image = $file;
        } 
        return parent::beforeSave($insert);
    }

    public function getFilePath()
    {
        return FileHelper::normalizePath(substr($this->image, strlen(Yii::getAlias('@app').'\web')));
    }

    public function getImg($width = '175px', $height = '100%')
    {
        return Html::img($this->getFilePath(), ['alt' => 'company_logo', 'style'=>'max-width: '. $width .'; max-height: '. $height .';']);
    }
}
