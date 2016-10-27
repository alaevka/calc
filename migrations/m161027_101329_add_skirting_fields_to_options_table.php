<?php

use yii\db\Migration;

class m161027_101329_add_skirting_fields_to_options_table extends Migration
{
    public function up()
    {
        $this->addColumn('options', 'skirting_type1', $this->float());
        $this->addColumn('options', 'skirting_type2', $this->float());
    }

    public function down()
    {
        echo "m161027_101329_add_skirting_fields_to_options_table cannot be reverted.\n";

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
