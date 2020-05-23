<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\RecordForm;
use app\models\RegisterForm;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class RecordsController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        return $this->render('index');
    }

    public function actionAdd()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RecordForm();
        if ($model->load(Yii::$app->request->post()) && $model->add()) {
            return $this->actionIndex();
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }
}
