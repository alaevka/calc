<?php

use yii\db\Migration;

class m161028_061435_add_shipment_field_to_options_table extends Migration
{
    public function up()
    {
        $this->addColumn('options', 'shipment', $this->float());
    }

    public function down()
    {
        echo "m161028_061435_add_shipment_field_to_options_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
