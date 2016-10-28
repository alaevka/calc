<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "washing".
 *
 * @property integer $id
 * @property string $name
 */
class Washing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'washing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название мойки',
        ];
    }
}
