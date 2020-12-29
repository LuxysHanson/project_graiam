<?php

use common\models\User;
use common\models\Users;
use yii\db\Migration;

/**
 * Class m201229_044443_move_user_new_table
 */
class m201229_044443_move_user_new_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $users = User::find()->asArray()->all();

        if ($users) {
            foreach ($users as $user) {
                $date = date('Y-m-d H:i:s', $user['created_at']);
                $newUser = new Users();
                $newUser->attributes = $user;
                $newUser->ts = $date;
                $newUser->save();
            }

            $this->dropTable("user");
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201229_044443_move_user_new_table cannot be reverted.\n";

        return false;
    }
}
