<?php

namespace app\models\member;
use Yii;


class MemberQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    public function prepare($builder)
    {
        if (! Yii::$app->user->can('Application Admin')) {  
            $this->andWhere(['company_id' => Yii::$app->user->identity->profile->company_id]);
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
