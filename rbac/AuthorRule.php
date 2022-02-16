<?php
namespace app\rbac;

use yii\rbac\Rule;
use src\models\UserIdentity as User;


class AuthorRule extends Rule
{
    public $name = 'isAuthor';

    /**
     * @param string|int $user the user ID.
     * @param Item $item the role or permission that this rule is associated width.
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return bool a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        $user = User::findIdentity($user);

        if (isset($user)) {
            if (isset($params['userId'])) {
                return $user->id == $params['userId'];
            }
        }
        return false;
    }
}