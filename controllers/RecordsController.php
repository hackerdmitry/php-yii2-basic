<?php

namespace app\controllers;

use app\models\Records\RecordAddForm;
use app\models\Records\RecordEditForm;
use app\models\Records\RecordViewModel;
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

        $model = new RecordAddForm();
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

    public function actionEdit($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RecordEditForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->edit();
            return $this->redirect('index.php?r=records');
        }

        $model = RecordEditForm::get($id);
        return $this->render('edit', [
            'model' => $model,
        ]);
    }
}
