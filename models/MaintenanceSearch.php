<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Maintenance;

/**
 * MaintenanceSearch represents the model behind the search form of `app\models\Maintenance`.
 */
class MaintenanceSearch extends Maintenance
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'registration_number', 'engineer'], 'integer'],
            [['task_description', 'task_duration', 'due_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Maintenance::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'registration_number' => $this->registration_number,
            'engineer' => $this->engineer,
        ]);

        $query->andFilterWhere(['like', 'task_description', $this->task_description])
            ->andFilterWhere(['like', 'task_duration', $this->task_duration])
            ->andFilterWhere(['like', 'due_date', $this->due_date]);


        return $dataProvider;
    }
}
