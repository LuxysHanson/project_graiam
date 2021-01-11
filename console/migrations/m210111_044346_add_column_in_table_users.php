<?php

use yii\db\Migration;

/**
 * Class m210111_044346_add_column_in_table_users
 */
class m210111_044346_add_column_in_table_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'is_blocked', $this->smallInteger()->notNull()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210111_044346_add_column_in_table_users cannot be reverted.\n";

        return false;
    }
}
