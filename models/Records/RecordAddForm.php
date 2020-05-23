<?php

namespace app\models\Records;

use Yii;
use yii\base\Model;

class RecordAddForm extends Model
{
    public $title;
    public $description;

    public function rules()
    {
        return [
            ['title', 'required'],
            ['description', 'default']
        ];
    }

    public function add() {
        $record = new Record();
        $record->title = $this->title;
        $record->description = $this->description;
        $record->user_id = Yii::$app->user->id;
        return $record->save();
    }
}
