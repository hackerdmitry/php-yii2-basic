<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RecordViewModel extends Model
{
    public $id;

    public function rules()
    {
        return [['id', 'required']];
    }

    public function delete() {
        Record::remove($this->id);
    }
}
