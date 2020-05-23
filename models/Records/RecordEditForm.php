<?php

namespace app\models\Records;

use app\models\Record;
use yii\base\Model;

class RecordEditForm extends Model
{
    public $id;
    public $title;
    public $description;

    public function rules()
    {
        return [
            [['id', 'title'], 'required'],
            ['description', 'default']
        ];
    }

    public static function get($id) {
        $record = Record::getById($id);
        return new RecordEditForm([
            'id' => $id,
            'title' => $record->title,
            'description' => $record->description
        ]);
    }

    public function edit() {
        $record = Record::getById($this->id);
        $record->title = $this->title;
        $record->description = $this->description;
        return $record->save();
    }
}
