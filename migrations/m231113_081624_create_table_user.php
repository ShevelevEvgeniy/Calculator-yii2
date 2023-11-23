<?php

use yii\db\Migration;

/**
 * Class m231113_081624_create_table_user
 */
class m231113_081624_create_table_user extends Migration
{

    /**
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'username' => $this->string(25)->unsigned()->notNull(),
            'email' => $this->string(30)->unsigned()->notNull()->unique(),
            'password_hash' => $this->string(256)->unsigned()->notNull(),
            'status' => $this->smallInteger()->unsigned()->notNull()->defaultValue(10),
            'auth_key' => $this->string(32)->unsigned()->notNull(),
            'created_at' => $this->timestamp(null)->notNull()->defaultExpression('CURRENT_TIMESTAMP()'),
            'updated_at' => $this->timestamp(null)->notNull()->defaultExpression('CURRENT_TIMESTAMP()')->append('ON UPDATE CURRENT_TIMESTAMP()'),
        ]);

        $this->batchInsert('user', ['username', 'email', 'password_hash', 'auth_key', ], [
            ['admin', 'admin@admin.ru', Yii::$app->security->generatePasswordHash('admin'), Yii::$app->security->generateRandomString()],
            ['user', 'user@user.ru', Yii::$app->security->generatePasswordHash('user'), Yii::$app->security->generateRandomString()],
        ]);
    }


    public function safeDown()
    {
        $this->dropTable('user');
    }


}
