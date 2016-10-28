<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use \app\models\WashingPrices;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

class WashingController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'index', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['create', 'index', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    
    public function actionIndex()
    {
        $searchModel = new \app\models\SearchWashing;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
        
    }
    
    public function actionCreate()
    {
        $model = new \app\models\Washing;
        $modelsWashingPrices = [new WashingPrices];
        if ($model->load(Yii::$app->request->post())) {

            $modelsWashingPrices = \app\models\Model::createMultiple(WashingPrices::classname());
            \app\models\Model::loadMultiple($modelsWashingPrices, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsWashingPrices),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = \app\models\Model::validateMultiple($modelsWashingPrices) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsWashingPrices as $modelWashingPrices) {
                            $modelWashingPrices->washing_id = $model->id;
                            if (! ($flag = $modelWashingPrices->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        \Yii::$app->getSession()->setFlash('flash_message', 'Мойка добавлена');
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('create', [
            'model' => $model,
            'modelsWashingPrices' => (empty($modelsWashingPrices)) ? [new WashingPrices] : $modelsWashingPrices
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsWashingPrices = \app\models\WashingPrices::find()->where(['washing_id' => $id])->all();
        
        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsWashingPrices, 'id', 'id');
            $modelsWashingPrices = \app\models\Model::createMultiple(\app\models\WashingPrices::classname(), $modelsWashingPrices);
            \app\models\Model::loadMultiple($modelsWashingPrices, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsWashingPrices, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsWashingPrices),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = \app\models\Model::validateMultiple($modelsWashingPrices) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            WashingPrices::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsWashingPrices as $modelWashingPrices) {
                            $modelWashingPrices->washing_id = $model->id;
                            if (! ($flag = $modelWashingPrices->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        \Yii::$app->getSession()->setFlash('flash_message', 'Мойка изменена');
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsWashingPrices' => (empty($modelsWashingPrices)) ? [new WashingPrices] : $modelsWashingPrices
        ]);
        
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);    
        $model->delete();
        \Yii::$app->getSession()->setFlash('flash_message', 'Мойка удалена');
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = \app\models\Washing::findOne($id)) !== null) {
            return $model;
        } else {
            throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}