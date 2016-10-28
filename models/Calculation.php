<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "calculation".
 *
 * @property integer $id
 * @property string $comment
 * @property integer $material
 * @property double $product_surface_area
 * @property double $wall_panel_surface_area
 * @property integer $cut_under_the_hob
 * @property integer $cut_under_the_sink
 * @property integer $cut_under_the_sink_type
 * @property integer $skirting_type
 * @property double $skirting
 * @property integer $edge_type
 * @property integer $edge_size
 * @property integer $edge
 * @property integer $hem
 * @property integer $hem_size
 * @property integer $radius_elements
 * @property integer $product_and_wall_panel_install
 * @property integer $shipment
 * @property integer $washing
 * @property integer $washing_type
 * @property integer $protochka_stoka_vody
 * @property integer $podstavka_goryachee
 * @property integer $demontaj_izdelia
 * @property integer $montaj_podokonnikov
 * @property double $podlojka_fanera
 * @property integer $kreplenia
 * @property double $hidden_cut_under_the_hob_for_one
 * @property double $hidden_cut_under_the_sink_for_one
 * @property double $hidden_skirting_for_one
 * @property double $hidden_edge_for_one
 * @property double $hidden_hem_for_one
 * @property double $hidden_radius_elements_for_one
 * @property double $hidden_product_and_wall_panel_install_for_one
 * @property double $hidden_shipment_for_one
 * @property double $hidden_washing_for_one
 * @property double $hidden_protochka_stoka_vody_for_one
 * @property double $hidden_podstavka_goryachee_for_one
 * @property double $hidden_demontaj_izdelia_for_one
 * @property double $hidden_montaj_podokonnikov_for_one
 * @property double $hidden_podlojka_fanera_for_one
 * @property double $hidden_kreplenia_for_one
 * @property integer $is_draft
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Calculation extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => function () { return strtotime(date('Y-m-d H:i:s')); },

            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calculation';
    }

    public function getUser()
    {
        return $this->hasOne(\dektrium\user\models\User::className(), ['id' => 'user_id']);
    }

    public function getMaterials()
    {
        return $this->hasOne(\app\models\Material::className(), ['id' => 'material']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment'], 'string'],
            [['material', 'cut_under_the_hob', 'cut_under_the_sink', 'cut_under_the_sink_type', 'skirting_type', 'edge_type', 'edge_size', 'edge', 'hem', 'hem_size', 'radius_elements', 'product_and_wall_panel_install', 'shipment', 'washing', 'washing_type', 'protochka_stoka_vody', 'podstavka_goryachee', 'demontaj_izdelia', 'montaj_podokonnikov', 'kreplenia', 'is_draft', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['product_surface_area', 'wall_panel_surface_area', 'skirting', 'podlojka_fanera', 'hidden_cut_under_the_hob_for_one', 'hidden_cut_under_the_sink_for_one', 'hidden_skirting_for_one', 'hidden_edge_for_one', 'hidden_hem_for_one', 'hidden_radius_elements_for_one', 'hidden_product_and_wall_panel_install_for_one', 'hidden_shipment_for_one', 'hidden_washing_for_one', 'hidden_protochka_stoka_vody_for_one', 'hidden_podstavka_goryachee_for_one', 'hidden_demontaj_izdelia_for_one', 'hidden_montaj_podokonnikov_for_one', 'hidden_podlojka_fanera_for_one', 'hidden_kreplenia_for_one'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material' => 'Материал',
            'product_surface_area' => 'Площадь поверхности изделия, м.кв',
            'wall_panel_surface_area' => 'Площадь стеновой панели, м.кв',
            'cut_under_the_hob' => 'Вырез под варочную панель, шт',
            'cut_under_the_sink' => 'Вырез под мойку, шт',
            'cut_under_the_sink_type' => 'Тип выреза под мойку',
            'skirting_type' => 'Тип бортика',
            'skirting' => 'Бортик, м.п.',
            'edge_type' => 'Тип кромки',
            'edge_size' => 'Рамер кромки, мм',
            'edge' => 'Кромка, м.п.',
            'hem' => 'Подгиб, м.п.',
            'hem_size' => 'Размер подгиба, мм',
            'radius_elements' => 'Радиусные элементы (более 25мм), шт. или м.п.',
            'product_and_wall_panel_install' => 'Монтаж столешницы и стеновых панелей (без подоконников), шт',
            'shipment' => 'Доставка (c подъемом без лифта до 5 этажа), шт',
            'washing' => 'Мойка интегрированная, шт',
            'washing_type' => 'Модель интегрированной мойки',
            'protochka_stoka_vody' => 'Проточка для стока воды, шт',
            'podstavka_goryachee' => 'Подставка под горячее, комплект',
            'demontaj_izdelia' => 'Демонтаж изделия (подоконник, столешница), шт',
            'montaj_podokonnikov' => 'Монтаж подоконников (шт./2м.п.)',
            'podlojka_fanera' => 'Подложка из цельной фанеры, м.кв.',
            'kreplenia' => 'Крепления, уголки, кронштейны, опоры, комплект',
            'comment' => 'Комментарий к расчету',
            'created_at' => 'Дата создания',
            'is_draft' => 'Черновик'
        ];
    }
}
