<?php

use yii\db\Migration;

class m231031_210919_create_table_months extends Migration
{
    public function safeUp()
    {
        $this->createTable('months', [
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'name' => $this->string(10)->unique()->notNull(),
            'created_at' => $this->timestamp(null)->notNull()->defaultExpression('CURRENT_TIMESTAMP()'),
            'updated_at' => $this->timestamp(null)->notNull()->defaultExpression('CURRENT_TIMESTAMP()')->append('ON UPDATE CURRENT_TIMESTAMP()'),
        ]);

        $this->batchInsert('months', ['name'], [
            ['январь'],
            ['февраль'],
            ['август'],
            ['сентябрь'],
            ['октябрь'],
            ['ноябрь']
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('months');
    }

}
