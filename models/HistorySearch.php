<?php

namespace app\models;

use Yii;
use yii\base\InvalidConfigException;
use yii\data\ActiveDataProvider;

/**
 * @property $id
 * @property $username
 * @property $email
 * @property $month
 * @property $raw_type
 * @property $tonnage
 * @property $price
 * @property $created_at
 */
class HistorySearch extends History
{
    public static function tableName(): string
    {
        return 'history';
    }

    public function rules():array
    {
        return [
            [['tonnage', 'price'], 'integer'],
            [['email','username','month', 'raw_type'], 'safe'],
            [['created_at'], 'safe'],
        ];
    }

    public function search($params)
    {
        $isAdmin = Yii::$app->user->can('admin');
        $query = $isAdmin ? History::find() : History::find()->where(['email' => Yii::$app->user->identity->email]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $startDate = date('Y-m-d H:i:s', strtotime($this->created_at . ' 00:00:00'));
        $endDate = date('Y-m-d H:i:s', strtotime($this->created_at . ' 23:59:59'));

        $query
            ->andFilterWhere(['like', 'month', $this->month])
            ->andFilterWhere(['like', 'raw_type', $this->raw_type])
            ->andFilterWhere(['like', 'tonnage', $this->tonnage])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'table_data', $this->table_data])
            ->andFilterWhere(['between', 'created_at', $startDate, $endDate]);

        return $dataProvider;
    }

}