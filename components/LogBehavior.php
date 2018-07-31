<?
namespace app\components;

use yii\db\ActiveRecord;
use yii\base\Behavior;

class LogBehavior extends Behavior
{
    public $indexColumn;
    public $objName;

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'afterInsert',
            ActiveRecord::EVENT_AFTER_UPDATE => 'afterUpdate',
            ActiveRecord::EVENT_AFTER_DELETE => 'afterDelete',
        ];
    }

    public function afterInsert($event)
    {
        EventHandler::AfterInsert('trace\\'.$this->objName.'\insert', $this->indexColumn, $this->owner->attributes);
    }

    public function afterUpdate($event)
    {
        EventHandler::AfterUpdate('trace\\'.$this->objName.'\update', $this->indexColumn, $this->owner->attributes, $event->changedAttributes);
    }

    public function afterDelete() 
    {
        EventHandler::AfterDelete('trace\\'.$this->objName.'\delete', $this->indexColumn, $this->owner->attributes);
    }
}?>