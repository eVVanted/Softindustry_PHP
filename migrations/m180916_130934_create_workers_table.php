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
            'photo' => $this->string(),
            'char_1' => $this->integer()->notNull()->defaultValue(0),
            'char_2' => $this->integer()->notNull()->defaultValue(0),
            'char_3' => $this->integer()->notNull()->defaultValue(0),
            'char_4' => $this->integer()->notNull()->defaultValue(0),
            'number_of_projects' => $this->integer()->notNull()->defaultValue(0),

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
