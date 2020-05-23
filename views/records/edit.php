<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model app\models\Records\RecordEditForm */

$this->title = 'Редактирование записи';
?>

<div class="site-edit-record">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'edit-record-form',
        'options' => ['class' => 'mt-3'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

    <?= Html::hiddenInput('RecordEditForm[id]', $model->id) ?>
    <?= $form->field($model, 'title')->textInput(['autofocus' => true])->label('Название') ?>
    <?= $form->field($model, 'description')->textarea()->label('Описание') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Изменить запись', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
