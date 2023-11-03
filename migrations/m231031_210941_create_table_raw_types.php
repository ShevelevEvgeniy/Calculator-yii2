<?php

use yii\db\Migration;


class m231031_210941_create_table_raw_types extends Migration
{

    public function safeUp()
    {
        $this->createTable('raw_types', [
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'name' => $this->string(10)->unique()->notNull(),
            'created_at' => $this->timestamp(null)->notNull()->defaultExpression('CURRENT_TIMESTAMP()'),
            'updated_at' => $this->timestamp(null)->notNull()->defaultExpression('CURRENT_TIMESTAMP()')->append('ON UPDATE CURRENT_TIMESTAMP()'),
        ]);

        $this->batchInsert('raw_types', ['name'], [
            ['шрот'],
            ['жмых'],
            ['соя']
        ]);
    }


    public function safeDown()
    {
        $this->dropTable('raw_types');
    }
}
