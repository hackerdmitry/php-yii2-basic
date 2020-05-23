<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

class RecordForm extends Model
{
    public function rules()
    {
        return [
            ['title', 'required'],
        ];
    }

    public function getAll() {
        $user_id = Yii::$app->user->id;
        $all_records = Record::getAllByUserId($user_id);
        $records = [];
        foreach ($all_records as $record) {
            $records[] = [
                "title" => $record->title,
                "description" => $record->description,
            ];
        }
        return $records;
    }
}
