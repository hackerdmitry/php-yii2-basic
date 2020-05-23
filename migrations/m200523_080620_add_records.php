<?php

use yii\db\Migration;

/**
 * Class m200523_080620_add_records
 */
class m200523_080620_add_records extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('records', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'user_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey(
            'fk-records-user_id',
            'records',
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
        echo "m200523_080620_add_records cannot be reverted.\n";

        $this->dropTable('records');
    }
}
