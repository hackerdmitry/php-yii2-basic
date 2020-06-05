<?php

use yii\db\Migration;

/**
 * Class m200605_160206_set_message_charset_utf8
 */
class m200605_160206_set_message_charset_utf8 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn("messages", "message", "varchar(255) charset utf8 not null");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200605_160206_set_message_charset_utf8 cannot be reverted.\n";
    }
}
