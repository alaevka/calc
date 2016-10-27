<?php

use yii\db\Migration;

/**
 * Handles adding cut_under_the_hob to table `options`.
 */
class m161027_074935_add_cut_under_the_hob_column_to_options_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('options', 'cut_under_the_hob', $this->float());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('options', 'cut_under_the_hob');
    }
}
