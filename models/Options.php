<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "options".
 *
 * @property integer $id
 * @property double $usd_current_value
 */
class Options extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usd_current_value', 'cut_under_the_hob', 'wrapping_of_the_retail_price', 'cut_under_the_sink_type1', 'cut_under_the_sink_type2', 'cut_under_the_sink_type3', 'cut_under_the_sink_type4', 'cut_under_the_sink_type5', 'skirting_type1', 'skirting_type2', 'edge_type1', 'edge_type2', 'edge_type3', 'radius_elements'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usd_current_value' => 'Текущий курс USD, в руб.',
            'cut_under_the_hob' => 'Вырез под варочную панель, руб',
            'wrapping_of_the_retail_price' => 'Накртука от розничной цены, %',
            'cut_under_the_sink_type1' => 'Вырез под мойку - БЕЗ МОНТАЖА, шт, руб',
            'cut_under_the_sink_type2' => 'Вырез под мойку - ПОД НАКЛАДНОЙ МОНТАЖ МОЙКИ, шт, руб',
            'cut_under_the_sink_type3' => 'Вырез под мойку - С ПОДСТОЛЬНЫМ МОНТАЖОМ МОЙКИ, шт, руб',
            'cut_under_the_sink_type4' => 'Вырез под мойку - ПОД МОНТАЖ В УРОВЕНЬ, шт, руб',
            'cut_under_the_sink_type5' => 'Вырез под мойку - С МОНТАЖОМ ИНТЕГРИРОВАННОЙ МОЙКИ, шт, руб',
            'skirting_type1' => 'Бортик накладной, м.п., руб',
            'skirting_type2' => 'Бортик интегрированный, м.п., руб',
            'edge_type1' => 'Кромка стандартная, м.п., руб',
            'edge_type2' => 'Кромка фигурная, м.п., руб',
            'edge_type3' => 'Кромка антиперелив, м.п., руб',
            'radius_elements' => 'Радиусные элементы (более 25мм), руб'

        ];
    }
}
