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
                <td><?= \yii\helpers\Html::img($photo->getUrl(), ['alt' => $worker['name'], 'height' => 50]) ?></td>
                <td><?= $worker['name'] ?></td>
                <td><?= $worker['char_1'] ?></td>
                <td><?= $worker['char_2'] ?></td>
                <td><?= $worker['char_3'] ?></td>
                <td><?= $worker['char_4'] ?></td>
                <td><?= count($worker->getProjects()) ?></td>

            </tr>
        <?php endforeach;?>
        <tr>
            <td>Средние значения</td>
            <td></td>
            <td><?= round($char_1_sum/$count, 1)?></td>
            <td><?= round($char_2_sum/$count, 1)?></td>
            <td><?= round($char_3_sum/$count, 1)?></td>
            <td><?= round($char_4_sum/$count, 1)?></td>
            <td></td>
        </tr>

        </tbody>

    </table>