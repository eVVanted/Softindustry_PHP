<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Worker */
/* @var $form yii\widgets\ActiveForm */

$levels = [
    '0' => '0',
    '1' => '1',
    '2' => '2',
    '3' => '3',
    '4' => '4',
    '5' => '5',
    '6' => '6',
    '7' => '7',
    '8' => '8',
    '9' => '9',
    '10' => '10',

];
$params = [
    'prompt' => 'Выберите уровень...'
];
?>

<div class="worker-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'char_1')->dropDownList($levels, $params) ?>

    <?= $form->field($model, 'char_2')->dropDownList($levels, $params) ?>

    <?= $form->field($model, 'char_3')->dropDownList($levels, $params) ?>

    <?= $form->field($model, 'char_4')->dropDownList($levels, $params) ?>

<!--    --><?//= $form->field($model, 'projects')->dropDownList($model->projectsList(), ['prompt' => '']) ?>

    <?= $form->field($model, 'projects')->listBox(
        \yii\helpers\ArrayHelper::map($projects, 'id', 'project_name'),
        [
            'multiple' => true
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
