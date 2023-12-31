<?php

namespace app\models;

use yii\db\Query;
use yii\helpers\ArrayHelper;

class Repository
{
    public function getMonthsList():array   //получение списка месецов
    {
        $query = Months::find()
            ->select('id, name');
        return ArrayHelper::map($query->asArray()
            ->all(), 'id', 'name');
    }

    public function getRawTypesList():array   //получение списка материалов сырья
    {
        $query = RawTypes::find()
            ->select('id, name');
        return ArrayHelper::map($query->asArray()
            ->all(), 'id', 'name');
    }

    public function getTonnagesList():array   //получение списка тоннажей
    {
        $query = Tonnages::find()
            ->select('id, value');
        return ArrayHelper::map($query->asArray()
            ->all(), 'id', 'value');
    }

    public function getResultPriceByNames($month, $tonnage, $type):int  //получение стоимости по параметрам
    {
        return Prices::find()->select('price')
            ->innerJoin('months', 'months.id = prices.month_id')
            ->innerJoin('raw_types', 'raw_types.id = prices.raw_type_id')
            ->innerJoin('tonnages','tonnages.id = prices.tonnage_id')
            ->where(['months.name' => $month, 'raw_types.name' => $type, 'tonnages.value' => $tonnage])
            ->scalar();

    }

    public function updatePrices($id, $price)  //запись цены по параметрам
    {
        return (new Query())
            ->createCommand()
            ->update('prices', ['price' => $price], "id = $id")
            ->execute();
    }
    public function getListPricesByType(string $raw_type):array
    {
        $raw_type_id = (new Query())->select('id')
            ->from('raw_types')
            ->where("name = '$raw_type'")
            ->scalar();
        $data = (new Query())
            ->select('months.name AS months, tonnages.value AS tonnages, prices.price AS prices')
            ->from('prices')
            ->innerJoin('months', 'months.id = prices.month_id')
            ->innerJoin('raw_types', 'raw_types.id = prices.raw_type_id')
            ->innerJoin('tonnages', 'tonnages.id = prices.tonnage_id')
            ->andWhere(["raw_types.id" => $raw_type_id])
            ->all();

        $price_list =[];
        foreach ($data as $item) {
            $price_list[$item['months']][$item['tonnages']] = (int)$item['prices'];
        }
            return $price_list;
    }

    public function createPrice($month, $type, $tonnage, $price)
    {
        $id = (new Query())
            ->select('months.id AS month_id, raw_types.id AS raw_type_id, tonnages.id AS tonnage_id')
            ->from('months, raw_types, tonnages')
            ->where(["months.name" =>$month, 'raw_types.name' => $type, 'tonnages.value' => $tonnage])
            ->one();

        return (new Query())
            ->createCommand()
            ->insert('prices', [
                'month_id' => $id['month_id'],
                'raw_type_id' => $id['raw_type_id'],
                'tonnage_id' => $id['tonnage_id'],
                'price' => $price
            ])
            ->execute();
    }
}

