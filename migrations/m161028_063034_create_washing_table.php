<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `washing`.
 */
class m161028_063034_create_washing_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%washing}}', [
            'id'                        => Schema::TYPE_PK,
            'name'                      => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('washing');
    }
}
