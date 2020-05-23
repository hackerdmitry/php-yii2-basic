<?php

/* @var $this yii\web\View */

use app\models\Record;
use app\models\Records\RecordViewModel;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $form yii\bootstrap4\ActiveForm */

$this->title = 'Мои записи';
$records = Record::getAll();
$model = new RecordViewModel();
?>

<div class="site-records">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <div class="navbar-brand">
                <?= $this->title ?>
            </div>
            <ul class="navbar-nav ml-auto">
                <a class="form-control mr-sm-2 btn btn-success" href="index.php?r=records/add"
                   role="button">Добавить</a>
            </ul>
        </div>
    </nav>

    <?php if (count($records) > 0) {
        echo '
<div class="card mt-3">
    <table class="table">
        <thead class="thead-dark">
            <tr class="d-flex">
                <th class="col-2">Название</th>
                <th class="col-10">Описание</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($records as $record) {
            $formDelete = ActiveForm::begin([
                    'action' => 'index.php?r=records/delete'
            ]);
            echo '
            <tr class="d-flex">
                <td class="col-2">' . $record->title . '</td>
                <td class="col-7">' . $record->description . '</td>
                <td class="col-2">
                    <a href="index.php?r=records/edit&id=' . $record->id . '" class="btn btn-primary">Изменить</a>
                </td>
                <td class="col-1">
                    ' . Html::hiddenInput('RecordViewModel[id]', $record->id) . '
                    ' . Html::submitButton('&times;', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Уверен, что хочешь удалить?")']) . '
                </td>
            </tr>';
            ActiveForm::end();
        }
        echo '
        </tbody>
    </table>
</div>';
    }
    ?>
</div>
