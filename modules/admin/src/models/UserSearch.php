<?php

namespace djazzy\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class UserSearch extends User
{
	public $isTeacher = false;
	public $isModer = false;
	public $isAdmin = false;

	public function rules()
	{
		return [
			[['id'], 'integer'],
			[['isTeacher', 'isModer'], 'boolean'],
			[['login', 'username', 'role', 'school'], 'safe'],
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => 'id',
			'checked' => 'Проверен',
			'role' => 'Роль',
		];
	}

	public function search($params)
	{
		$user = Yii::$app->user->identity;

		$query = User::find();

		if($this->isAdmin){

		} elseif ($this->isModer) {
            $query->where(['school_inn' => $user->school]);
		} elseif ($this->isTeacher) {
            $query->where(['school' => $user->school ,'school_class' => $user->school_class ]);
		}


		$this->load($params);


        $query->andFilterWhere([
//            [

//			'login'  => $this->login,
////			'username'  => $this->username,
//
//		],
            'or',
            ['id' =>             $this->id],
            ['like', 'login',    $this->login],
            ['like', 'username', $this->username],
            ['like', 'role',     $this->role],
            ['like', 'school',   $this->school],
        ]);

		$dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

		return $dataProvider;
	}

}