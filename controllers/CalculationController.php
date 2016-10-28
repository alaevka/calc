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
        $model->shipment = 1;
        $model->washing = 0;
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

        //Монтаж столешницы и стеновых панелей
        if(empty($model->product_surface_area)) {
            $product_and_wall_panel_install_for_one = '<span style="font-size: 10px; color: #ff0000;">Необходимо заполнить площадь поверхности и(или) стеновой панели!</span>';
            $product_and_wall_panel_install_total = '<span style="font-size: 10px; color: #ff0000;">Необходимо заполнить площадь поверхности и(или) стеновой панели!</span>';
            $model->hidden_product_and_wall_panel_install_for_one = 0;
        }

        //доставка
        $shipment_for_one = $options->shipment;
        $model->hidden_shipment_for_one = $shipment_for_one;
        $shipment_total = $shipment_for_one*$model->shipment;

        //мойка
        $washing_for_one = '<span style="font-size: 10px; color: #ff0000;">Необходимо выбрать модель мойки!</span>';
        $model->hidden_washing_for_one = 0;
        $washing_total = '<span style="font-size: 10px; color: #ff0000;">Необходимо выбрать модель мойки!</span>';

        $options->wrapping_of_the_retail_price > 0 ? $protochka_stoka_vody_for_one = $options->protochka_stoka_vody*($options->wrapping_of_the_retail_price*0.01+1) : $protochka_stoka_vody_for_one = $options->protochka_stoka_vody;
        $protochka_stoka_vody_total = $model->protochka_stoka_vody*$protochka_stoka_vody_for_one;
        $model->hidden_protochka_stoka_vody_for_one = $protochka_stoka_vody_for_one;

        $options->wrapping_of_the_retail_price > 0 ? $podstavka_goryachee_for_one = $options->podstavka_goryachee*($options->wrapping_of_the_retail_price*0.01+1) : $podstavka_goryachee_for_one = $options->podstavka_goryachee;
        $podstavka_goryachee_total = $model->podstavka_goryachee*$podstavka_goryachee_for_one;
        $model->hidden_podstavka_goryachee_for_one = $podstavka_goryachee_for_one;

        $options->wrapping_of_the_retail_price > 0 ? $demontaj_izdelia_for_one = $options->demontaj_izdelia*($options->wrapping_of_the_retail_price*0.01+1) : $demontaj_izdelia_for_one = $options->demontaj_izdelia;
        $demontaj_izdelia_total = $model->demontaj_izdelia*$demontaj_izdelia_for_one;
        $model->hidden_demontaj_izdelia_for_one = $demontaj_izdelia_for_one;

        $options->wrapping_of_the_retail_price > 0 ? $montaj_podokonnikov_for_one = $options->montaj_podokonnikov*($options->wrapping_of_the_retail_price*0.01+1) : $montaj_podokonnikov_for_one = $options->montaj_podokonnikov;
        $montaj_podokonnikov_total = $model->montaj_podokonnikov*$montaj_podokonnikov_for_one;
        $model->hidden_montaj_podokonnikov_for_one = $montaj_podokonnikov_for_one;

        $options->wrapping_of_the_retail_price > 0 ? $podlojka_fanera_for_one = $options->podlojka_fanera*($options->wrapping_of_the_retail_price*0.01+1) : $podlojka_fanera_for_one = $options->podlojka_fanera;
        $podlojka_fanera_total = $model->podlojka_fanera*$podlojka_fanera_for_one;
        $model->hidden_podlojka_fanera_for_one = $podlojka_fanera_for_one;

        $options->wrapping_of_the_retail_price > 0 ? $kreplenia_for_one = $options->kreplenia*($options->wrapping_of_the_retail_price*0.01+1) : $kreplenia_for_one = $options->kreplenia;
        $kreplenia_total = $model->kreplenia*$kreplenia_for_one;
        $model->hidden_kreplenia_for_one = $kreplenia_for_one;


        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->id;

            if ($model->validate()) {
                if($model->save()) {
                    
                    \Yii::$app->getSession()->setFlash('flash_message', 'Расчет создан');
                    return $this->redirect(['/site/index']);
                }
            }
        }





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
            'product_and_wall_panel_install_for_one' => $product_and_wall_panel_install_for_one,
            'product_and_wall_panel_install_total' => $product_and_wall_panel_install_total,
            'shipment_for_one' => round($shipment_for_one, 2),
            'shipment_total' =>  round($shipment_total, 2),
            'washing_for_one' => $washing_for_one,
            'washing_total' =>  $washing_total,
            'protochka_stoka_vody_for_one' => round($protochka_stoka_vody_for_one, 2),
            'protochka_stoka_vody_total' => round($protochka_stoka_vody_total, 2),
            'podstavka_goryachee_for_one' => round($podstavka_goryachee_for_one, 2),
            'podstavka_goryachee_total' => round($podstavka_goryachee_total, 2),
            'demontaj_izdelia_for_one' => round($demontaj_izdelia_for_one, 2),
            'demontaj_izdelia_total' => round($demontaj_izdelia_total, 2),
            'montaj_podokonnikov_for_one' => round($montaj_podokonnikov_for_one, 2),
            'montaj_podokonnikov_total' => round($montaj_podokonnikov_total, 2),
            'podlojka_fanera_for_one' => round($podlojka_fanera_for_one, 2),
            'podlojka_fanera_total' => round($podlojka_fanera_total, 2),
            'kreplenia_for_one' => round($kreplenia_for_one, 2),
            'kreplenia_total' => round($kreplenia_total, 2),

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

    public function actionInstallprice() {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $options = \app\models\Options::findOne(1);

            $product_surface_area = Yii::$app->request->post('product_surface_area');
            $wall_panel_surface_area = Yii::$app->request->post('wall_panel_surface_area');

            if(empty($product_surface_area) || $product_surface_area == 0) {
                $param_for_product_surface_area = 0;
            } elseif($product_surface_area <= 1.2) {
                $param_for_product_surface_area = 1.2;
            } elseif($product_surface_area > 1.2 && $product_surface_area <= 1.8) {
                $param_for_product_surface_area = 1.8;
            } else {
                $param_for_product_surface_area = $product_surface_area;
            }
            
            if(empty($wall_panel_surface_area) || $wall_panel_surface_area == 0) {
                $param_for_wall_panel_surface_area = 0;
            } else {
                $param_for_wall_panel_surface_area = $wall_panel_surface_area;
            }
            
            $install_price = ($options->product_install*$param_for_product_surface_area + $options->wall_panel_install*$param_for_wall_panel_surface_area)*($options->wrapping_of_the_retail_price*0.01+1);

            return $install_price;

        }
    }


    public function actionWashingprice() {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $options = \app\models\Options::findOne(1);

            //$material = \app\models\Material::findOne(Yii::$app->request->post('material'));
            //$washing = \app\models\Washing::findOne(Yii::$app->request->post('washing_type'))
            $washing_prices = \app\models\WashingPrices::find()->where(['washing_id' => Yii::$app->request->post('washing_type'), 'material_id' => Yii::$app->request->post('material')])->one();

            if($washing_prices) {
                return $washing_prices->price_for_partners*($options->wrapping_of_the_retail_price*0.01+1);
            } else {
                return 'error';
            }


        }
    }

    
}
