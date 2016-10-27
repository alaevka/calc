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

    public $hidden_cut_under_the_hob_for_one;
    public $hidden_cut_under_the_sink_for_one;
    public $hidden_skirting_for_one;
    public $hidden_edge_for_one;
    public $hidden_hem_for_one;
    public $hidden_radius_elements_for_one;

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



        ];
    }

}