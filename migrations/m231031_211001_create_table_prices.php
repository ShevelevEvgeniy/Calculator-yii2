<?php

use yii\db\Migration;

class m231031_211001_create_table_prices extends Migration
{
    public function safeUp()
    {
        $this->createTable('prices', [
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'month_id' => $this->integer(11)->unsigned()->notNull(),
            'raw_type_id' => $this->integer(11)->unsigned()->notNull(),
            'tonnage_id' => $this->integer(11)->unsigned()->notNull(),
            'price' => $this->tinyInteger(3)->unsigned()->notNull(),
            'created_at' => $this->timestamp(null)->notNull()->defaultExpression('CURRENT_TIMESTAMP()'),
            'updated_at' => $this->timestamp(null)->notNull()->defaultExpression('CURRENT_TIMESTAMP()')->append('ON UPDATE CURRENT_TIMESTAMP()'),
        ]);

        $this->addForeignKey(
            'fk-prices-month_id',
            'prices',
            'month_id',
            'months',
            'id',
            'CASCADE',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk-prices-raw_type_id',
            'prices',
            'raw_type_id',
            'raw_types',
            'id',
            'CASCADE',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk-prices-tonnage_id',
            'prices',
            'tonnage_id',
            'tonnages',
            'id',
            'CASCADE',
            'NO ACTION'
        );

        $this->createIndex(
            'idx-price-unique_row',
            'prices',
            'month_id, raw_type_id, tonnage_id',
            true);

        $query = '
        INSERT INTO `prices`(`tonnage_id`, `month_id`, `raw_type_id`, `price`)
            SELECT
                t.id AS tonnage_id,
                m.id AS month_id,
                r.id AS raw_type_id,
                FLOOR(100 + RAND() * 100)
            FROM `tonnages` AS t 
            JOIN `months` AS m
            JOIN `raw_types` AS r;';
        $this->execute($query);
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-prices-month_id',
            'prices'
        );
        $this->dropForeignKey(
            'fk-prices-raw_type_id',
            'prices'
        );
        $this->dropForeignKey(
            'fk-prices-tonnage_id',
            'prices'
        );
        $this->dropTable('prices');
    }
}
