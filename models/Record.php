<?php

namespace app\models;

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

    public static function getAllByUserId($user_id)
    {
        return static::findAll(['user_id' => $user_id]);
    }

    public function rules()
    {
        return [[['username', 'password'], 'required']];
    }

    public function getId()
    {
        return $this->id;
    }
}
