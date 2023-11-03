<?php

use yii\db\Migration;

class m231031_210951_create_table_tonnages extends Migration
{

    public function safeUp()
    {
        $this->createTable('tonnages', [
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'value' => $this->tinyInteger(3)->notNull()->unsigned()->unique(),
            'created_at' => $this->timestamp(null)->notNull()->defaultExpression('CURRENT_TIMESTAMP()'),
            'updated_at' => $this->timestamp(null)->notNull()->defaultExpression('CURRENT_TIMESTAMP()')->append('ON UPDATE CURRENT_TIMESTAMP()'),
        ]);

        $this->batchInsert('tonnages', ['value'], [
            [25],
            [50],
            [75],
            [100]
        ]);
    }


    public function safeDown()
    {
        $this->dropTable('tonnages');
    }
}
