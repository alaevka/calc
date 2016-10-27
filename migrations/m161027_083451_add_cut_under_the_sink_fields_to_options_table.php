<?php

use yii\db\Migration;

class m161027_083451_add_cut_under_the_sink_fields_to_options_table extends Migration
{
    public function up()
    {
        $this->addColumn('options', 'cut_under_the_sink_type1', $this->float());
        $this->addColumn('options', 'cut_under_the_sink_type2', $this->float());
        $this->addColumn('options', 'cut_under_the_sink_type3', $this->float());
        $this->addColumn('options', 'cut_under_the_sink_type4', $this->float());
        $this->addColumn('options', 'cut_under_the_sink_type5', $this->float());
    }

    public function down()
    {
        echo "m161027_083451_add_cut_under_the_sink_fields_to_options_table cannot be reverted.\n";

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
