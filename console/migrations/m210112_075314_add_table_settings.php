<?php

use yii\db\Migration;

/**
 * Class m210112_075314_add_table_settings
 */
class m210112_075314_add_table_settings extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('settings', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'name' => $this->string(),
            'excerpt' => $this->text(),
            'description' => $this->text(),
            'info' => $this->json(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'address' => $this->string(),
            'timetable' => $this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('settings');
    }
}
