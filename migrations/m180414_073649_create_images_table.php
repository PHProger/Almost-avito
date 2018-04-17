<?php

use yii\db\Migration;

/**
 * Handles the creation of table `images`.
 */
class m180414_073649_create_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('images', [
            'id' => $this->primaryKey(),
            'full' => $this->string()->notNull(),
            'medium' => $this->string()->notNull(),
            'small' => $this->string()->notNull(),
            'car_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'images_to_cars',
            'images',
            'car_id',
            'cars',
            'id',
            'CASCADE'
        );
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('images');
    }
}
