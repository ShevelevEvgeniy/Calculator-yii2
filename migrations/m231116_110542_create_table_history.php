<?php

use yii\db\Migration;

/**
 * Class m231116_110542_create_table_history
 */
class m231116_110542_create_table_history extends Migration
{

    /**
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->createTable('history', [
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'username' => $this->string(256)->unsigned()->notNull(),
            'email' => $this->string(256)->unsigned()->notNull(),
            'month' => $this->string(256)->notNull(),
            'raw_type' => $this->string(256)->notNull(),
            'tonnage' => $this->tinyInteger(3)->notNull()->unsigned(),
            'price' => $this->tinyInteger(3)->unsigned()->notNull(),
            'table_data' => $this->json()->unsigned()->notNull(),
            'created_at' => $this->timestamp(null)->notNull()->defaultExpression('CURRENT_TIMESTAMP()'),
            'updated_at' => $this->timestamp(null)->notNull()->defaultExpression('CURRENT_TIMESTAMP()')->append('ON UPDATE CURRENT_TIMESTAMP()'),
            ]);
    }


    public function safeDown()
    {
        $this->dropTable('history');
    }

}
