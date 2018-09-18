<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "workers".
 *
 * @property int $id
 * @property string $name
 * @property int $char_1
 * @property int $char_2
 * @property int $char_3
 * @property int $char_4
 *
 * @property ProjectsAssignments[] $projectsAssignments
 * @property Projects[] $projects
 */
class Worker extends \yii\db\ActiveRecord
{
    public $image;
    protected $projects = [];
    public function behaviors()
    {
        return [
            'photo' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'char_1', 'char_2', 'char_3', 'char_4'], 'required'],
            [['char_1', 'char_2', 'char_3', 'char_4'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['projects'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'image' => 'Фото',
            'char_1' => 'Коммуникабельность',
            'char_2' => 'Инженерные навыки',
            'char_3' => 'Тайм менеджмент',
            'char_4' => 'Знание языков',

        ];
    }

    public function upload(){
        if($this->validate()){
            $path = 'upload/store/' . $this->image->baseName . "." . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            unlink($path);
            return true;
        }else{
            return false;
        }
    }



    public function getProjectsWorkers()
    {
        return $this->hasMany(ProjectsWorkers::className(), ['worker_id' => 'id']);
    }


    public function setProjects($projectsId)
    {
        $this->projects = (array) $projectsId;
    }

    public function getProjects()
    {
        return ArrayHelper::getColumn(
            $this->getProjectsWorkers()->all(), 'project_id'
        );
    }

    public function afterSave($insert, $changedAttributes)
    {
        ProjectsWorkers::deleteAll(['worker_id' => $this->id]);
        $values = [];
        foreach ($this->projects as $id) {
            $values[] = [$this->id, $id];
        }
        self::getDb()->createCommand()
            ->batchInsert(ProjectsWorkers::tableName(), ['worker_id', 'project_id'], $values)->execute();

        parent::afterSave($insert, $changedAttributes);
    }
}
