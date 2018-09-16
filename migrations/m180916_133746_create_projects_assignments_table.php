<?php

use yii\db\Migration;

/**
 * Handles the creation of table `projects_assignments`.
 */
class m180916_133746_create_projects_assignments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('projects_assignments', [
            'worker_id' => $this->integer()->notNull(),
            'project_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('{{%pk-projects_assignments}}', '{{%projects_assignments}}', ['worker_id', 'project_id']);

        $this->createIndex('{{%idx-projects_assignments-worker_id}}', '{{%projects_assignments}}', 'worker_id');
        $this->createIndex('{{%idx-projects_assignments-project_id}}', '{{%projects_assignments}}', 'project_id');

        $this->addForeignKey('{{%fk-projects_assignments-worker_id}}', '{{%projects_assignments}}', 'worker_id', '{{%workers}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('{{%fk-projects_assignments-project_id}}', '{{%projects_assignments}}', 'project_id', '{{%projects}}', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('projects_assignments');
    }
}
