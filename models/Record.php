<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Record model
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $user_id
 */
class Record extends ActiveRecord
{
    public static function tableName()
    {
        return 'records';
    }

    public static function getAll()
    {
        $user_id = Yii::$app->user->id;
        return Record::getAllByUserId($user_id);
    }

    public static function getAllByUserId($user_id)
    {
        return static::findAll(['user_id' => $user_id]);
    }

    public function rules()
    {
        return [[['title'], 'required']];
    }
}
