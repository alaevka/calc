<?php

use yii\db\Migration;

class m161027_132057_add_radius_elements_to_options_table extends Migration
{
    public function up()
    {
        $this->addColumn('options', 'radius_elements', $this->float());
    }

    public function down()
    {
        echo "m161027_132057_add_radius_elements_to_options_table cannot be reverted.\n";

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
