<?php

use yii\db\Migration;

/**
 * Class m200520_154738_add_users
 */
class m200520_154738_add_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password' => $this->string()->notNull(), // небезопасно, но что поделать, я глупый, мне простительно
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200520_154738_add_users cannot be reverted.\n";

        $this->dropTable('users');
    }
}
