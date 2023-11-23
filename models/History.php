<?php

namespace app\models;


use Yii;
use yii\db\ActiveRecord;

/**
 * @property $id
 * @property $username
 * @property $email
 * @property $month
 * @property $raw_type
 * @property $tonnage
 * @property $price
 * @property $table_data
 */
class History extends ActiveRecord
{
    public function rules(): array
    {
        return
            [
                [['username',  'email', 'month', 'raw_type', 'tonnage', 'price', 'table_data'], 'required'],
                [['username', 'month', 'raw_type', 'email'], 'string'],
                [['tonnage', 'price'], 'integer'],
                ['table_data', 'safe'],
            ];
    }

    public function saveHistory($model)
    {
        $repository = new Repository();
        $this->username = Yii::$app->user->identity->username;
        $this->email = Yii::$app->user->identity->email;
        $this->month = $model->month;
        $this->raw_type = $model->raw_type;
        $this->tonnage = $model->tonnage;
        $this->price = $repository->getResultPriceByNames($model->month, $model->tonnage, $model->raw_type);
        $this->table_data = json_encode($repository->getListPricesByType($model->raw_type));
        $this->save();
    }

}