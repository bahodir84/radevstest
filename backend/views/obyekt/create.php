<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Obyekt */

$this->title = 'Create Obyekt';
$this->params['breadcrumbs'][] = ['label' => 'Obyekts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obyekt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data' => $data,
        'data_task' => $data_task,
    ]) ?>

</div>
