<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ObyektSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Obyekts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obyekt-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Obyekt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute' => 'img',
                'format' => 'html',
                'label' => 'Image',
                'value' => function ($data) {
                    return Html::img( 'images/' . $data['id'] . ".jpg",
                        ['width' => '150px']);
                },
            ],

            'id',
            'name',
            'parent_id',
            'task_ids',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
