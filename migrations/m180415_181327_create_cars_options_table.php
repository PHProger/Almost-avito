<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cars_options`.
 */
class m180415_181327_create_cars_options_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cars_options', [
            'id' => $this->primaryKey(),
            'car_id' => $this->integer()->notNull(),
            'option_id' => $this->integer()->notNull(),
        ]);


        $this->addForeignKey(
            'car_to_options',
            'cars_options',
            'car_id',
            'cars',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'option_to_cars',
            'cars_options',
            'option_id',
            'options',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cars_options');
    }
}
