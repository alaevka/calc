<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "washing_prices".
 *
 * @property integer $id
 * @property integer $washing_id
 * @property integer $material_id
 * @property double $price
 * @property double $price_for_partners
 */
class WashingPrices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'washing_prices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['washing_id', 'material_id'], 'integer'],
            [['price', 'price_for_partners'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'washing_id' => 'Washing ID',
            'material_id' => 'Материал',
            'price' => 'Цена',
            'price_for_partners' => 'Цена для партнеров',
        ];
    }
}
