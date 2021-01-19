<?php

use yii\db\Migration;

/**
 * Class m210113_082048_add_table_user_profile
 */
class m210113_082048_add_table_user_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("CREATE SCHEMA relations;");
        $this->createTable('relations.user_profile', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'last_name' => $this->string(),
            'first_name' => $this->string(),
            'middle_name' => $this->string(),
            'info' => $this->json(),
            'image' => $this->string(3000),
            'phone' => $this->string(),
            'sex' => $this->smallInteger()->defaultValue(0),
            'birthday' => $this->timestamp()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("relations.user_profile");
    }
}
