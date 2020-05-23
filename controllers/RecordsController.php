<?php

namespace app\controllers;

use app\models\RecordForm;
use app\models\RecordViewModel;
use Yii;
use yii\web\Controller;

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
            return $this->redirect('index.php?r=records');
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }

    public function actionDelete()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RecordViewModel();
        if ($model->load(Yii::$app->request->post())) {
            $model->delete();
            return $this->redirect('index.php?r=records');
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }
}
