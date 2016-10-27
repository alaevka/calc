<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `material`.
 */
class m161027_060204_create_material_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%material}}', [
            'id'                        => Schema::TYPE_PK,
            'name'                      => Schema::TYPE_TEXT,
            'cost_price'                => Schema::TYPE_FLOAT,
            'plywood_glue_on_1mkv'      => Schema::TYPE_FLOAT,
            'cheat_profit_on_1mkv'      => Schema::TYPE_FLOAT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('material');
    }
}
