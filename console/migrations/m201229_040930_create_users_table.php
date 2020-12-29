<?php

use common\components\enums\UsersRoleEnum;
use yii\db\Expression;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m201229_040930_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string(),
            'email' => $this->string()->notNull(),
            'verification_token' => $this->string()->notNull(),
            'role' => $this->smallInteger()->notNull()->defaultValue(UsersRoleEnum::ROLE_USER),
            'status' => $this->smallInteger()->notNull()->defaultValue(9),
            'ts' => $this->timestamp()->notNull()->defaultValue(new Expression('NOW()')),
        ]);

        $this->createIndex('index-username-user', 'users', 'username');
        $this->createIndex('index-status-user','users', 'username');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('index-status-user','users');
        $this->dropIndex('index-username-user', 'users');
        $this->dropTable('users');
    }
}
