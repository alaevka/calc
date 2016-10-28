<?php

use yii\db\Migration;

class m161028_090018_add_six_fields_to_options_table extends Migration
{
    public function up()
    {
        $this->addColumn('options', 'protochka_stoka_vody', $this->float());
        $this->addColumn('options', 'podstavka_goryachee', $this->float());
        $this->addColumn('options', 'demontaj_izdelia', $this->float());
        $this->addColumn('options', 'montaj_podokonnikov', $this->float());
        $this->addColumn('options', 'podlojka_fanera', $this->float());
        $this->addColumn('options', 'kreplenia', $this->float());
    }

    public function down()
    {
        echo "m161028_090018_add_six_fields_to_options_table cannot be reverted.\n";

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
