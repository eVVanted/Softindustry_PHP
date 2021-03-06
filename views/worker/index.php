<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Workers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Worker', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'char_1',
            'char_2',
            'char_3',
            //'char_4',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
