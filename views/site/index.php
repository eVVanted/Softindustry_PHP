<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->registerCssFile('/web/css/grid.css', ['depends' => ['app\assets\AppAsset']]);
$script = <<< JS
    $('.submit').click(function(e){
   e.preventDefault();
   var data = $('form').serialize();;
   console.log(data);
   $('.search-input').val('');
   $.ajax({
            url: '/site/search',
            type: 'POST',
            data: data,
            success: function(res){
                console.log(res);
                showTable(res);
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
   
});

function showTable(table){
    $('#table').html(table);
    
}
JS;
$this->registerJs($script, yii\web\View::POS_READY);
//\yii\helpers\VarDumper::dump($workers);

?>

<div class="table-users table-responsive">

    <div class="header">Сотрудники</div>

    <?= Html::beginForm(['site/search'], 'post', [ 'class' => 'form-inline']); ?>
    <?= Html::input('text', 'name', Yii::$app->request->post('name'), ['class' => 'search-input']) ?>
    <?= Html::submitButton('Search', ['class' => 'submit btn btn-lg btn-primary', 'name' => 'search-button']) ?>
    <?= Html::endForm() ?>


    <div id ="table">
        <?php
        $count = count($workers);
        $char_1_sum = 0;
        $char_2_sum = 0;
        $char_3_sum = 0;
        $char_4_sum = 0;
        ?>
        <table class = "table table-hover table-striped" cellspacing="0">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Имя</th>
                <th>Коммуникабельность</th>
                <th>Инженерные навыки</th>
                <th>Тайм менеджмент</th>
                <th>Знание языков</th>
                <th>Количество проектов</th>
            </tr>
            </thead>

            <tbody>

                <?php foreach ($workers as $worker):?>
                <?php
                $photo = $worker->getImage();
                    $char_1_sum += $worker['char_1'];
                    $char_2_sum += $worker['char_2'];
                    $char_3_sum += $worker['char_3'];
                    $char_4_sum += $worker['char_4'];

                ?>

            <tr>
                <td><?= \yii\helpers\Html::img($photo->getUrl('60x60'), ['alt' => $worker['name'], 'height' => 50]) ?></td>
                <!--            --><?//= Html::img($photo->getUrl('50x50'), ['alt' => $worker->name])?>
                <td><?= $worker['name'] ?></td>
                <td><?= $worker['char_1'] ?></td>
                <td><?= $worker['char_2'] ?></td>
                <td><?= $worker['char_3'] ?></td>
                <td><?= $worker['char_4'] ?></td>
                <td><?= count($worker->getProjects()) ?></td>

            </tr>
            <?php endforeach;?>
                <?php if($count> 0): ?>
                <tr>
                    <td>Средние значения</td>
                    <td></td>
                    <td><?= round($char_1_sum/$count, 1)?></td>
                    <td><?= round($char_2_sum/$count, 1)?></td>
                    <td><?= round($char_3_sum/$count, 1)?></td>
                    <td><?= round($char_4_sum/$count, 1)?></td>
                    <td></td>
                </tr>
                <?php endif; ?>

            </tbody>

        </table>
    </div>

</div>
