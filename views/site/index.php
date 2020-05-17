<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<style>
    .ava {
        max-width: 50%;
        margin: 0 25%;
    }

    .about {
        text-align: center;
    }

    .icon-prepend {
        max-width: 38px;
    }

    .contact:hover {
        cursor: pointer;
    }
</style>

<div class="site-index">

    <div class="jumbotron">
        <h1>Невероятно!</h1>

        <p class="lead">Получилось запустить эту штуку! Успех, что я могу сказать :D</p>

        <p><a class="btn btn-lg btn-success" href="https://stackoverflow.com/">А что за сайт нам помог?</a></p>
    </div>

    <div class="body-content">
        <div class="jumbotron">
            <h1>Участники проекта:</h1>
        </div>

        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-4 about">
                <h2>Дмитрий Бутов</h2>

                <div>
                    <img class="ava" src="../views/img/photo_dmitry_butov.jpg" alt="dmitry_butov">
                </div>

                <p>Программист. Собирается написать чатик на вебсокетах.</p>

                <a class="contact" href="https://vk.com/hackerdmitry">
                    <div class="input-group">
                        <img class="input-group-prepend icon-prepend" src="../views/img/icon_prepend_vk.png" alt="icon_prepend_vk">
                        <label class="form-control">hackerdmitry</label>
                    </div>
                </a>

                <a class="contact" href="https://github.com/hackerdmitry">
                    <div class="input-group">
                        <img class="input-group-prepend icon-prepend" src="../views/img/icon_prepend_github.png" alt="icon_prepend_github">
                        <label class="form-control">hackerdmitry</label>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 about">
                <h2>Виталий Смычковский</h2>

                <img class="ava" src="../views/img/photo_vitaly_smychkovsky.jpg" alt="vitaly_smychkovsky">

                <p>Программист. Собирается написать ежедневник на вебапи.</p>

                <a class="contact" href="https://vk.com/pierodelokur">
                    <div class="input-group">
                        <img class="input-group-prepend icon-prepend" src="../views/img/icon_prepend_vk.png" alt="icon_prepend_vk">
                        <label class="form-control">pierodelokur</label>
                    </div>
                </a>

                <a class="contact" href="https://github.com/ProgressiveArt">
                    <div class="input-group">
                        <img class="input-group-prepend icon-prepend" src="../views/img/icon_prepend_github.png" alt="icon_prepend_github">
                        <label class="form-control">ProgressiveArt</label>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
