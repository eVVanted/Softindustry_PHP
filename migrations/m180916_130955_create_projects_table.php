<?php

use yii\db\Migration;

/**
 * Handles the creation of table `projects`.
 */
class m180916_130955_create_projects_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('projects', [
            'id' => $this->primaryKey(),
            'project_name' => $this->string()->notNull()->unique(),
        ]);
        $this->batchInsert('projects', ['project_name'], [
            ['ПРОЕКТ 1'],
            ['ПРОЕКТ 2'],
            ['ПРОЕКТ 3'],
            ['ПРОЕКТ 4'],
            ['ПРОЕКТ 5'],
            ['ПРОЕКТ 6'],
            ['ПРОЕКТ 7'],
            ['ПРОЕКТ 8'],
            ['ПРОЕКТ 9'],
            ['ПРОЕКТ 10'],
            ['ПРОЕКТ 11'],
            ['ПРОЕКТ 12'],
            ['ПРОЕКТ 13'],
            ['ПРОЕКТ 14'],
            ['ПРОЕКТ 15'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('projects');
    }
}
