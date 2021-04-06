<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Obyekt */

$this->title = 'Update Obyekt: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Obyekts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="obyekt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data' => $data,
        'data_task' => $data_task,
    ]) ?>

</div>
