<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model app\models\RecordForm */

$this->title = 'Мои записи';
$records = $model->getAll()
?>

<div class="site-records">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <div class="navbar-brand">
                <?= $this->title ?>
            </div>
            <ul class="navbar-nav ml-auto">
                <a class="form-control mr-sm-2 btn btn-success" href="index.php?r=site/index" role="button">Добавить</a>
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
            echo '
            <tr class="d-flex">
                <td class="col-2">' . $record["title"] . '</td>
                <td class="col-9">' . $record["description"] . '</td>
                <td class="col-1"><a class="form-control btn btn-danger" href="#" role="button">&times;</a></td>
            </tr>';
        }
        echo '
        </tbody>
    </table>
</div>';
    }
    ?>
</div>
