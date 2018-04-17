<?php

use yii\db\Migration;

/**
 * Handles the creation of table `options`.
 */
class m180414_073638_create_options_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('options', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('options');
    }
}
