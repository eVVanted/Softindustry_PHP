<?php

use yii\db\Migration;

/**
 * Handles the creation of table `workers`.
 */
class m180916_130934_create_workers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('workers', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'char_1' => $this->integer()->notNull(),
            'char_2' => $this->integer()->notNull(),
            'char_3' => $this->integer()->notNull(),
            'char_4' => $this->integer()->notNull(),


        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('workers');
    }
}
