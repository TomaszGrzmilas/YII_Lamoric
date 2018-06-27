<?php

namespace app\classes\ruskid;

use ruskid\csvimporter\ARImportStrategy as BaseARImportStrategy;


class ARImportStrategy extends BaseARImportStrategy
{
    public function import(&$data) {
        $countImport = 0;
        foreach ($data as $key => $row) {
            $skipImport = isset($this->skipImport) ? call_user_func($this->skipImport, $row) : false;
            if (!$skipImport) {
                /* @var $model \yii\db\ActiveRecord */
                $model = new $this->className;
                $uniqueAttributes = [];
                foreach ($this->configs as $config) {
                    if (isset($config['attribute']) && $model->hasAttribute($config['attribute'])) {
                        $value = call_user_func($config['value'], $row);

                        //Create array of unique attributes
                        if (isset($config['unique']) && $config['unique']) {
                            $uniqueAttributes[$config['attribute']] = $value;
                        }

                        //Set value to the model
                        $model->setAttribute($config['attribute'], $value);
                    }
                }
                //Check if model is unique and saved with success
                if (!($this->isActiveRecordUnique($uniqueAttributes) && $model->save())) {
                    $model->importLine = $key; 
                    return $model;
                } else {
                    $countImport += 1;
                }
            }
        }
        if ($countImport > 0) {
            $model->importLine = $countImport;
        }
        return isset($model) ? $model : null;
    }

    private function isActiveRecordUnique($attributes) {
        /* @var $class \yii\db\ActiveRecord */
        $class = $this->className;
        return empty($attributes) ? true :
                !$class::find()->where($attributes)->exists();
    }
}?>