<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property int $id
 * @property string $project_name
 *
 * @property ProjectsWorkers[] $projectsWorkers
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_name'], 'required'],
            [['project_name'], 'string', 'max' => 255],
            [['project_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_name' => 'Project Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectsWorkers()
    {
        return $this->hasMany(ProjectsWorkers::className(), ['project_id' => 'id']);
    }
}
