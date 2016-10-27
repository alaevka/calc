<?php

use yii\db\Migration;

/**
 * Handles adding wrapping_of_the_retail_price to table `options`.
 */
class m161027_075905_add_wrapping_of_the_retail_price_column_to_options_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('options', 'wrapping_of_the_retail_price', $this->float());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('options', 'wrapping_of_the_retail_price');
    }
}
