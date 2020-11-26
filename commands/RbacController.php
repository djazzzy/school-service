<?php

namespace app\commands;

use Yii;
use app\models\User;
use yii\console\Controller;
//use common\components\rbac\UserRoleRule;

class RbacController extends Controller
{
	public function actionInit()
	{
		$auth = Yii::$app->authManager;
		$auth->removeAll(); //удаляем старые данные

		$userRoleRule = new \app\rbac\UserRoleRule();
        $auth->add($userRoleRule);

		$adminka = $auth->createPermission('adminka');
		$adminka->description = 'Админка';
		$auth->add($adminka);

		$user = $auth->createRole('user');
		$user->description = 'Ученик';
		$user->ruleName = $userRoleRule->name;
		$auth->add($user);

        $worker = $auth->createRole('worker');
        $worker->description = 'Работник';
        $worker->ruleName = $userRoleRule->name;
        $auth->add($worker);

		$teacher = $auth->createRole('teacher');
		$teacher->description = 'Классный руководитель';
		$teacher->ruleName = $userRoleRule->name;
		$auth->add($teacher);
		$auth->addChild($teacher, $user);
		$auth->addChild($teacher, $adminka);

		$moder = $auth->createRole('moder');
		$moder->description = 'Модератор';
		$moder->ruleName = $userRoleRule->name;
		$auth->add($moder);
		$auth->addChild($moder, $teacher);

		$admin = $auth->createRole('admin');
		$admin->description = 'Администратор';
		$admin->ruleName = $userRoleRule->name;
		$auth->add($admin);
		$auth->addChild($admin, $moder);

		$this->stdout('Done!' . PHP_EOL);
	}
}