<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;


class CalculationController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    
    public function actionCreate()
    {
        $model = new \app\models\Calculation;
        $model->material = 1;
        $model->cut_under_the_hob = 1;
        $model->cut_under_the_sink = 1;
        $model->cut_under_the_sink_type = 1;
        $model->skirting = 0;
        $model->skirting_type = 1;
        $model->edge_type = 1;
        $model->edge_size = 40;
        $model->edge = 0;
        $model->hem_size = 40;
        $model->hem = 0;
        $options = \app\models\Options::findOne(1);

        //Вырез под варочную панель
        $options->wrapping_of_the_retail_price > 0 ? $cut_under_the_hob_for_one = $options->cut_under_the_hob*($options->wrapping_of_the_retail_price*0.01+1) : $cut_under_the_hob_for_one = $options->cut_under_the_hob;
        $cut_under_the_hob_total = $model->cut_under_the_hob*$cut_under_the_hob_for_one;
        $model->hidden_cut_under_the_hob_for_one = $cut_under_the_hob_for_one;

        //Вырез под мойку default_type = 1
        $options->wrapping_of_the_retail_price > 0 ? $cut_under_the_sink_for_one = $options->cut_under_the_sink_type1*($options->wrapping_of_the_retail_price*0.01+1) : $cut_under_the_sink_for_one = $options->cut_under_the_sink_type1;
        $cut_under_the_sink_total = $model->cut_under_the_sink*$cut_under_the_sink_for_one;
        $model->hidden_cut_under_the_sink_for_one = $cut_under_the_sink_for_one;

        //Бортик default_type = 1 
        $options->wrapping_of_the_retail_price > 0 ? $skirting_for_one = $options->skirting_type1*($options->wrapping_of_the_retail_price*0.01+1) : $skirting_for_one = $options->skirting_type1;
        $skirting_total = $model->skirting*$skirting_for_one;
        $model->hidden_skirting_for_one = $skirting_for_one;

        //кромка
        $material = \app\models\Material::findOne($model->material);
        $price_for_partners = round(($options->usd_current_value*$material->cost_price)+$material->plywood_glue_on_1mkv+10100, -2);
        $options->wrapping_of_the_retail_price > 0 ? $edge_for_one = (round($model->edge_size/1000*$price_for_partners, -1)+$options->edge_type1)*($options->wrapping_of_the_retail_price*0.01+1) : $edge_for_one = round($model->edge_size/1000*$price_for_partners, -1)+$options->edge_type1;
        $edge_total = $model->edge*$edge_for_one;
        $model->hidden_edge_for_one = $edge_for_one;

        //подгиб

        $options->wrapping_of_the_retail_price > 0 ? $hem_for_one = (round(($model->hem_size/1000)*$price_for_partners, -1))*($options->wrapping_of_the_retail_price*0.01+1) : $hem_for_one = round(($model->hem_size/1000)*$price_for_partners, -1);
        $hem_total = $model->hem*$hem_for_one;
        $model->hidden_hem_for_one = $hem_for_one;

        //радиусные элементы
        $options->wrapping_of_the_retail_price > 0 ? $radius_elements_for_one = $options->radius_elements*($options->wrapping_of_the_retail_price*0.01+1) : $radius_elements_for_one = $options->radius_elements;
        $radius_elements_total = $model->radius_elements*$radius_elements_for_one;
        $model->hidden_radius_elements_for_one = $radius_elements_for_one;



        return $this->render('create', [
            'model' => $model,
            'cut_under_the_hob_for_one' => round($cut_under_the_hob_for_one, 2),
            'cut_under_the_hob_total' => round($cut_under_the_hob_total, 2),
            'cut_under_the_sink_for_one' => round($cut_under_the_sink_for_one, 2),
            'cut_under_the_sink_total' => round($cut_under_the_sink_total, 2),
            'skirting_for_one' => round($skirting_for_one, 2),
            'skirting_total' => round($skirting_total, 2),
            'edge_for_one' => round($edge_for_one, 2),
            'edge_total' => round($edge_total, 2),
            'hem_for_one' => round($hem_for_one, 2),
            'hem_total' => round($hem_total, 2),
            'radius_elements_for_one' => round($radius_elements_for_one, 2),
            'radius_elements_total' => round($radius_elements_total, 2),
        ]);
    }

    
    public function actionSinktypeprice() {

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $options = \app\models\Options::findOne(1);
            $price_field = 'cut_under_the_sink_type'.Yii::$app->request->post('type_id');
            $options->wrapping_of_the_retail_price > 0 ? $result_price = $options->$price_field*($options->wrapping_of_the_retail_price*0.01+1) : $result_price = $options->$price_field;
            return round($result_price, 2);
        }

    }

    public function actionSkirtingtypeprice() {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $options = \app\models\Options::findOne(1);
            $price_field = 'skirting_type'.Yii::$app->request->post('type_id');
            $options->wrapping_of_the_retail_price > 0 ? $result_price = $options->$price_field*($options->wrapping_of_the_retail_price*0.01+1) : $result_price = $options->$price_field;
            return round($result_price, 2);
        }
    }

    public function actionEdgetypeprice() {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $options = \app\models\Options::findOne(1);
            $price_field = 'edge_type'.Yii::$app->request->post('type_id');

            $material = \app\models\Material::findOne(Yii::$app->request->post('material'));
            $price_for_partners = round(($options->usd_current_value*$material->cost_price)+$material->plywood_glue_on_1mkv+10100, -2);
            
            $options->wrapping_of_the_retail_price > 0 ? $edge_for_one = (round(Yii::$app->request->post('edge_size')/1000*$price_for_partners, -1)+$options->$price_field)*($options->wrapping_of_the_retail_price*0.01+1) : $edge_for_one = round(Yii::$app->request->post('edge_size')/1000*$price_for_partners, -1)+$options->$price_field;

            return $edge_for_one;

        }
    }

    public function actionHemprice() {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $options = \app\models\Options::findOne(1);

            $material = \app\models\Material::findOne(Yii::$app->request->post('material'));
            $price_for_partners = round(($options->usd_current_value*$material->cost_price)+$material->plywood_glue_on_1mkv+10100, -2);
            
            $options->wrapping_of_the_retail_price > 0 ? $hem_for_one = (round(Yii::$app->request->post('hem_size')/1000*$price_for_partners, -1))*($options->wrapping_of_the_retail_price*0.01+1) : $hem_for_one = round(Yii::$app->request->post('hem_size')/1000*$price_for_partners, -1);

            return $hem_for_one;

        }
    }

    
}
