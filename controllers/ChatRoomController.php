<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class ChatRoomController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        return $this->render('index');
    }
}
