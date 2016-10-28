<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `calculation`.
 */
class m161028_101044_create_calculation_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%calculation}}', [
            'id'                        => Schema::TYPE_PK,

            'comment'                   => Schema::TYPE_TEXT,
            'material' => Schema::TYPE_INTEGER,
            'product_surface_area' => Schema::TYPE_FLOAT,
            'wall_panel_surface_area' => Schema::TYPE_FLOAT,
            'cut_under_the_hob' => Schema::TYPE_INTEGER,
            'cut_under_the_sink' => Schema::TYPE_INTEGER,
            'cut_under_the_sink_type' => Schema::TYPE_INTEGER,
            'skirting_type' => Schema::TYPE_INTEGER,
            'skirting' => Schema::TYPE_FLOAT,
            'edge_type' => Schema::TYPE_INTEGER,
            'edge_size' => Schema::TYPE_INTEGER,
            'edge' => Schema::TYPE_INTEGER,
            'hem' => Schema::TYPE_INTEGER,
            'hem_size' => Schema::TYPE_INTEGER,
            'radius_elements' => Schema::TYPE_INTEGER,
            'product_and_wall_panel_install' => Schema::TYPE_INTEGER,
            'shipment' => Schema::TYPE_INTEGER,
            'washing' => Schema::TYPE_INTEGER,
            'washing_type' => Schema::TYPE_INTEGER,
            'protochka_stoka_vody' => Schema::TYPE_INTEGER,
            'podstavka_goryachee' => Schema::TYPE_INTEGER,
            'demontaj_izdelia' => Schema::TYPE_INTEGER,
            'montaj_podokonnikov' => Schema::TYPE_INTEGER,
            'podlojka_fanera' => Schema::TYPE_FLOAT,
            'kreplenia' => Schema::TYPE_INTEGER,
            'hidden_cut_under_the_hob_for_one' => Schema::TYPE_FLOAT,
            'hidden_cut_under_the_sink_for_one' => Schema::TYPE_FLOAT,
            'hidden_skirting_for_one' => Schema::TYPE_FLOAT,
            'hidden_edge_for_one' => Schema::TYPE_FLOAT,
            'hidden_hem_for_one' => Schema::TYPE_FLOAT,
            'hidden_radius_elements_for_one' => Schema::TYPE_FLOAT,
            'hidden_product_and_wall_panel_install_for_one' => Schema::TYPE_FLOAT,
            'hidden_shipment_for_one' => Schema::TYPE_FLOAT,
            'hidden_washing_for_one' => Schema::TYPE_FLOAT,
            'hidden_protochka_stoka_vody_for_one' => Schema::TYPE_FLOAT,
            'hidden_podstavka_goryachee_for_one' => Schema::TYPE_FLOAT,
            'hidden_demontaj_izdelia_for_one' => Schema::TYPE_FLOAT,
            'hidden_montaj_podokonnikov_for_one' => Schema::TYPE_FLOAT,
            'hidden_podlojka_fanera_for_one' => Schema::TYPE_FLOAT,
            'hidden_kreplenia_for_one' => Schema::TYPE_FLOAT,

            'is_draft'                  => Schema::TYPE_INTEGER,
            'user_id'                   => Schema::TYPE_INTEGER,
            'created_at'                => Schema::TYPE_INTEGER,
            'updated_at'                => Schema::TYPE_INTEGER,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('calculation');
    }
}
