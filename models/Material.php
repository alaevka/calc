<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property integer $id
 * @property string $name
 * @property double $cost_price
 * @property double $plywood_glue_on_1mkv
 * @property double $cheat_profit_on_1mkv
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'cost_price', 'plywood_glue_on_1mkv', 'cheat_profit_on_1mkv'], 'required'], 
            [['name'], 'string'],
            [['cost_price', 'plywood_glue_on_1mkv', 'cheat_profit_on_1mkv'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название материала',
            'cost_price' => 'Себестоимсоть, 1 м.кв',
            'plywood_glue_on_1mkv' => 'Клей, фанера, в 1 м.кв',
            'cheat_profit_on_1mkv' => 'Накрутка прибыли в 1 м.кв, %',
        ];
    }
}
