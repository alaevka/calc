<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Calculation extends Model
{
	public $material;
	public $product_surface_area;
	public $wall_panel_surface_area;
	public $cut_under_the_hob;
    public $cut_under_the_sink;
    public $cut_under_the_sink_type;

    public $skirting_type;
    public $skirting;

    public $edge_type;
    public $edge_size;
    public $edge;

    public $hem;
    public $hem_size;

    public $radius_elements;

    public $product_and_wall_panel_install;

    public $shipment;

    public $washing;
    public $washing_type;

    public $protochka_stoka_vody;
    public $podstavka_goryachee;
    public $demontaj_izdelia;
    public $montaj_podokonnikov;
    public $podlojka_fanera;
    public $kreplenia;

    public $hidden_cut_under_the_hob_for_one;
    public $hidden_cut_under_the_sink_for_one;
    public $hidden_skirting_for_one;
    public $hidden_edge_for_one;
    public $hidden_hem_for_one;
    public $hidden_radius_elements_for_one;
    public $hidden_product_and_wall_panel_install_for_one;
    public $hidden_shipment_for_one;
    public $hidden_washing_for_one;
    public $hidden_protochka_stoka_vody_for_one;
    public $hidden_podstavka_goryachee_for_one;
    public $hidden_demontaj_izdelia_for_one;
    public $hidden_montaj_podokonnikov_for_one;
    public $hidden_podlojka_fanera_for_one;
    public $hidden_kreplenia_for_one;

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
        ];
    }

}