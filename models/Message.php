<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Message model
 *
 * @property integer $id
 * @property string $message
 * @property integer $user_id
 */
class Message extends ActiveRecord
{
    public static function tableName()
    {
        return 'messages';
    }

    public static function getAll()
    {
        return static::find()->all();
    }

    public static function getAllByUserId($user_id)
    {
        return static::findAll(['user_id' => $user_id]);
    }

    public static function getById($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function remove($id) {
        $message = Message::getById($id);
        $message->delete();
    }

    public function rules()
    {
        return [[['message'], 'required']];
    }
}
