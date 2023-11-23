<?php

namespace app\models;
use yii\data\ActiveDataProvider;
/**
 * @property $id
 * @property $username
 * @property $email
 */
class UserSearch extends User
{
    public static function tableName(): string
    {
        return 'user';
    }

    public function rules():array
    {
        return [
            ['id', 'integer'],
            [['email','username'], 'safe'],
        ];
    }
    public function search($params): ActiveDataProvider
    {
        $query = User::findOne($params);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query
            ->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}