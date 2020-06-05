<?php

    require __DIR__ . '/../vendor/autoload.php';

    use Ratchet\App;
    use Ratchet\ConnectionInterface;
    use Ratchet\MessageComponentInterface;

    class ChatDaemon implements MessageComponentInterface
    {
        private $clients;
        private $pool;

        public function __construct()
        {
            $this->clients = new \SplObjectStorage;

            $config = Amp\Mysql\ConnectionConfig::fromString("host=localhost user=root password=root db=yii2basic");
            $this->pool = Amp\Mysql\pool($config);

//            Amp\Loop::run(function () {
//                $statement = yield $this->pool->prepare("SELECT * " .
//                                                        "FROM users " .
//                                                        "WHERE username='admin'");
//                $user = yield $statement->execute();
//
//                yield $user->advance();
//                $row = $user->getCurrent();
//                $id = $row['id'];
//                print "$id\n";
//            });
        }

        public function onOpen(ConnectionInterface $conn)
        {
            $this->clients->attach($conn);
            print "Подключается новый пользователь\n";
        }

        public function onMessage(ConnectionInterface $from, $msg)
        {
            $this->object = json_decode($msg);

            Amp\Loop::run(function () {
                $object = $this->object;
                $username = $object->username;
                $message = $object->message;

                print "Пользователь [$username] отправляет сообщение [$message]\n";

                $statement = yield $this->pool->prepare("SELECT * " .
                                                        "FROM users " .
                                                        "WHERE username='$username'");
                $user = yield $statement->execute();
                yield $user->advance();
                $row = $user->getCurrent();
                $id = $row['id'];

                $statement = yield $this->pool->prepare("INSERT INTO messages(message, user_id) " .
                                                        "VALUES ('$message', '$id')");
                yield $statement->execute();
            });

            foreach ($this->clients as $client) {
                $client->send($msg);
            }
        }

        public function onClose(ConnectionInterface $conn)
        {
            $this->clients->detach($conn);
            print "Один из пользователей отключился\n";
        }

        public function onError(ConnectionInterface $conn, \Exception $e)
        {
            $conn->close();
            print "Вебсокет упал с ошибкой $e\n";
        }
    }

    $app = new App('localhost', 8080);
    $app->route('/chat', new ChatDaemon(), ['*']);
    $app->run();
