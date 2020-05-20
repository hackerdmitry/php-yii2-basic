<?php

namespace app\models;

use yii\base\Model;

/**
 * @property User|null $user This property is read-only.
 */
class RegisterForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
        ];
    }

    public function register()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->password = $this->password;
        return $user->save() ? $user : null;
    }
}
