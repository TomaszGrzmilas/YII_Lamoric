<?php

namespace app\models\log;

use Yii;

class LogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    public function prepare($builder)
    {
       if (! Yii::$app->user->can('Application Admin')) {  
            if (isset(Yii::$app->user->identity->profile->company_id) && Yii::$app->user->can('Company Admin') ) {
                $this->andFilterWhere(['like', 'message', 'COMPANY['.Yii::$app->user->identity->profile->company_id.']']);
            } else {
                $this->andWhere(['id' => null]);
            }
        }
        return parent::prepare($builder);
    }

    public function all($db = null)
    {
        return parent::all($db);
    }

    public function one($db = null)
    {
        return parent::one($db);
    }
}
