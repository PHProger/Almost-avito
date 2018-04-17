<?php

use yii\db\Migration;

/**
 * Handles the creation of table `models`.
 */
class m180414_073515_create_models_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('models', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'brand_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'model_to_brand',
            'models',
            'brand_id',
            'brands',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('models');
    }
}
