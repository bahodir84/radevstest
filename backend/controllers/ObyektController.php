<?php

namespace backend\controllers;

use app\models\Task;
use Yii;
use app\models\Obyekt;
use app\models\ObyektSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ObyektController implements the CRUD actions for Obyekt model.
 */
class ObyektController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Obyekt models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObyektSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Obyekt model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Obyekt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Obyekt();

        $data = Obyekt::find()->all();
        $data_task = Task::find()->all();



        if ( $model->load(Yii::$app->request->post()) ){
                $model->task_ids = json_encode($model->task_ids);
            if ( $model->save() ) {

                $image = UploadedFile::getInstance($model, 'image');
                $image_name = $model->id . '.' . $image->getExtension();
                $image->saveAs('@backend/web/images/'.$image_name);

                $model->image = $image_name;
                $model->save();

                return $this->redirect(['view', 'id' => $model->id]);
                }
        }


        return $this->render('create', [
            'model' => $model,
            'data' => $data,
            'data_task' => $data_task,
        ]);
    }

    /**
     * Updates an existing Obyekt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $data = Obyekt::find()->all();
        $data_task = Task::find()->all();


        if ( $model->load(Yii::$app->request->post()) ){
            $model->task_ids = json_encode($model->task_ids);
            if ( $model->save() ){

                $image = UploadedFile::getInstance($model, 'image');
                $image_name = $model->id . '.' . $image->getExtension();
                $image->saveAs('@backend/web/images/'.$image_name);

                $model->image = $image_name;
                $model->save();

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'data' => $data,
            'data_task' => $data_task,
        ]);
    }

    /**
     * Deletes an existing Obyekt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Obyekt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Obyekt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Obyekt::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
