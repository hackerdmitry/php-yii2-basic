<?php

/* @var $this yii\web\View */

use app\models\Message;
use app\models\User;

/* @var $form yii\bootstrap4\ActiveForm */

$this->title = 'Чатик';
$messages = Message::getAll();
$curUsername = Yii::$app->user->identity->username;

// Снизу на JS есть абсолютно аналогичный метод, просто классный фреймвор заставляет меня дублировать код и не соблюдать принцип DRY
function append($username, $message)
{
    // Аналогично с переменной, не знаю что сложного взять глобальную переменную
    $curUsername = Yii::$app->user->identity->username;
    if ($username == $curUsername) {
        $username .= " (Ты)";
    }
    echo '
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">' . $username . '</span>
            </div>
            <input type="text" class="form-control" disabled placeholder="' . $message . '">
        </div>';
}
?>

<style>
    body {
        overflow: hidden;
    }

    .chat {
        position: relative;
    }

    .messages {
        position: relative;
        height: 580px;
        overflow: auto;
    }

    .input {

    }
</style>

<div class="site-records">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse">
            <div class="navbar-brand">
                <?= $this->title ?>
            </div>
        </div>
    </nav>

    <div class="p-2 bg-secondary chat" data-spy="scroll">
        <div class="messages">
            <?php
            foreach ($messages as $message) {
                $username = User::findIdentity($message->user_id)->username;
                append($username, $message->message);
            }
            ?>
        </div>
    </div>

    <div class="input bg-dark">
        <div class="input-group">
            <input type="text" class="form-control send-message">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" onclick="send()">Отправить</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    let messages;
    let counter = 1;

    window.onload = function () {
        messages = $(".messages");
        messages.scrollTop(messages.prop('scrollHeight'));
        document.addEventListener('keydown', function(event) {
            if (event.code === 'Enter' || event.code === 'NumpadEnter') {
                send();
            }
        });
    }

    let conn = new WebSocket('ws://localhost:8080/chat');

    conn.onmessage = function (e) {
        let message = JSON.parse(e.data);
        append(message['username'], message['message']);
    };

    function send() {
        let $sendMessage = $('.send-message');
        if ($sendMessage.prop('value') === '') {
            return;
        }
        conn.send(`{"username":"<?= $curUsername ?>","message":"${$sendMessage.prop('value')}"}`);
        $sendMessage.prop('value', '');
    }

    function append(username, message) {
        if (username === '<?= $curUsername ?>') {
            username += " (Ты)";
        }
        messages.append(`
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">${username}</span>
                </div>
                <input type="text" class="form-control" disabled placeholder="${message}">
            </div>`)
        messages.scrollTop(messages.prop('scrollHeight'));
    }
</script>