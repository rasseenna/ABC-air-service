<?php

namespace app\controllers;

use Yii;
use app\models\Flightlog;
use app\models\FlightlogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;

/**
 * FlightlogController implements the CRUD actions for Flightlog model.
 */
class FlightlogController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Flightlog models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $session = Yii::$app->session;
        $session->open();
        if(Yii::$app->session->get('username') == 'guest' || Yii::$app->session->get('username') == '' ){
            return $this->redirect(array("site/login"));
            } else {
            $searchModel = new FlightlogSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single Flightlog model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        
        $session = Yii::$app->session;
        $session->open();
        if(Yii::$app->session->get('username') == 'guest' || Yii::$app->session->get('username') == '' ){
            return $this->redirect(array("site/login"));
         } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Flightlog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $session = Yii::$app->session;
        $session->open();
        if(Yii::$app->session->get('username') == 'guest' || Yii::$app->session->get('username') == '' ){
            return $this->redirect(array("site/login"));
         } else {
            $model = new Flightlog();

            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Flightlog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        
        $session = Yii::$app->session;
        $session->open();
        if(Yii::$app->session->get('username') == 'guest' || Yii::$app->session->get('username') == '' ){
            return $this->redirect(array("site/login"));
         } else {
            $model = $this->findModel($id);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Flightlog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Flightlog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Flightlog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Flightlog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
