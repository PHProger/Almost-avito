<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cars`.
 */
class m180414_073516_create_cars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cars', [
            'id' => $this->primaryKey(),
            'mileage' => $this->string(),
            'price' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'model_id' => $this->integer()->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime(),
        ]);

        $this->addForeignKey(
            'cars_to_models',
            'cars',
            'model_id',
            'models',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cars');
    }
}
