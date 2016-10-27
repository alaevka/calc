<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `options`.
 */
class m161027_070049_create_options_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%options}}', [
            'id'                        => Schema::TYPE_PK,
            'usd_current_value'         => Schema::TYPE_FLOAT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('options');
    }
}
