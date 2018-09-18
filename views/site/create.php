<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Worker */

$script = <<< JS
$('form').on("click",function() {
   var val = $('#worker-char_3').val();
  if(val==10){ 
      $('#worker-projects').prop("multiple", true);
  } else {
  $('#worker-projects').prop("multiple", false);
  }
});
JS;
$this->registerJs($script, yii\web\View::POS_READY);
?>
<div class="worker-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'projects' => $projects,
    ]) ?>

</div>
