<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Obyekt */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="obyekt-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= Select2::widget([
        'model' => $model,
        'attribute' => 'task_ids',
        'data' => ArrayHelper::map($data_task,'id','name'),
        'options' => ['placeholder' => 'Select a task ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => true
        ],
    ]); ?>
    <br>

    <?= Select2::widget([
        'model' => $model,
        'attribute' => 'parent_id',
        'data' => ArrayHelper::map($data,'id','name'),
        'options' => ['placeholder' => 'Select parent ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    <br>
    <?= $form->field($model, 'image')->fileInput()->label('Select image') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
