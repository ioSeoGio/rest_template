<?php

namespace app\modules\admin;

use Yii;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

use seog\base\Module as BaseModule;
use app\rbac\Rbac;

class Module extends BaseModule
{
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }
        
        if (!Yii::$app->user->can(Rbac::MODERATOR)) {
            throw new NotFoundHttpException();
        }
    
        return true;
    }

}
