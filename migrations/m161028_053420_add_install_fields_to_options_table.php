<?php

use yii\db\Migration;

class m161028_053420_add_install_fields_to_options_table extends Migration
{
    public function up()
    {
        $this->addColumn('options', 'product_install', $this->float());
        $this->addColumn('options', 'wall_panel_install', $this->float());
    }

    public function down()
    {
        echo "m161028_053420_add_install_fields_to_options_table cannot be reverted.\n";

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
