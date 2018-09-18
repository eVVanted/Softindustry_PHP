<?php

use yii\db\Migration;

/**
 * Handles the creation of table `projects_workers`.
 */
class m180918_175954_create_projects_workers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {


        $this->createTable('{{%projects_workers}}', [
            'project_id' => $this->integer()->notNull(),
            'worker_id' => $this->integer()->notNull()
        ]);

        $this->createIndex('FK_project', '{{%projects_workers}}', 'project_id');
        $this->addForeignKey(
            'FK_projects_workers', '{{%projects_workers}}', 'project_id', '{{%projects}}', 'id', 'CASCADE', 'RESTRICT'
        );

        $this->createIndex('FK_worker', '{{%projects_workers}}', 'worker_id');
        $this->addForeignKey(
            'FK_workers_projects', '{{%projects_workers}}', 'worker_id', '{{%workers}}', 'id', 'CASCADE', 'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('projects_workers');
    }
}
