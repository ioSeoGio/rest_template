<?php

namespace app\bootstrap;

use Yii;
use yii\base\BootstrapInterface;

use dispatchers\SimpleEventDispatcher; 

class Bootstrap implements BootstrapInterface
{
	public function bootstrap($app)
	{
		$container = Yii::$container;

		// $container->setSingleton('app\services\NotifierInterface', function () use ($app) {
		// 	return new Notifier();
		// });
		// $container->setSingleton('app\services\NotifierInterface', 'app\services\Notifier');
	
		$container->setSingleton('dispatchers\EventDispatcherInterface', function () {
			return new SimpleEventDispatcher([
				// 'eventClass' => [listeners classes],
			]); 
		});
	}
}
