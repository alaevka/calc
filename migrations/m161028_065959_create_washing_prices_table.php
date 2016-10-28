<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `washing_prices`.
 */
class m161028_065959_create_washing_prices_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%washing_prices}}', [
            'id'                        => Schema::TYPE_PK,
            'washing_id'                => Schema::TYPE_INTEGER,
            'material_id'               => Schema::TYPE_INTEGER,
            'price'                     => Schema::TYPE_FLOAT,
            'price_for_partners'        => Schema::TYPE_FLOAT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('washing_prices');
    }
}
