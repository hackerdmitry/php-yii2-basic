<?php

use yii\db\Migration;

/**
 * Class m200531_124636_add_messages
 */
class m200531_124636_add_messages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('messages', [
            'id' => $this->primaryKey(),
            'message' => $this->string()->notNull(),
            'user_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey(
            'fk-messages-user_id',
            'messages',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200531_124636_add_messages cannot be reverted.\n";

        $this->dropTable('messages');
    }
}
