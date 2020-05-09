<?php

namespace App\Components;



class Router
{

	private $routes;

	public function __construct()
	{
		$routesPath = ROOT . '/App/Config/routes.php';
		$this->routes = include($routesPath);
	}



	/**
	 * return request string
	 * @return string
	 */


	 

	private function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	//* получить строку запроса
	public function run()
	{

		$uri = $this->getURI();
		//test
		//echo 'строка запроса ' . $uri;



		//* проверить наличие такого запроса в роутах
		foreach ($this->routes as $uriPattern => $path) {
			// test совпадение - обработка
		//	echo "<br>$uriPattern => $path";
			//echo '<br>';

			//* сравнить 	uriPattern и 	uri
			if (preg_match("~^$uriPattern$~", $uri)) {
				//echo '+';

				// test обрабатывает 
				//echo $path;


				// echo '<br>где ищем (запрос пользователя): ' . $uri;
				// echo '<br>что ищем (совпадения из правила): ' . $uriPattern;
				// echo '<br>кто обрабатывает: ' . $path;
				// echo '<br>';


				//* получить внутренний путь из внешнего согласно правилу
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				//test
				//echo 'нужно сформировать ' . $internalRoute;

				//* определить, какой контроллер и экшен обрабатывают запрос
				$segments = explode('/', $internalRoute);
				//test
				//echo "<pre>" . print_r($segments, true) . '</pre>';


				$controllerName = array_shift($segments) . 'Controller';
				$controllerName = ucfirst($controllerName);

				$actionName = 'action' . ucfirst((array_shift($segments)));
				//echo '<br>Класс: ' . $controllerName;
				//echo '<br>Метод: ' . $actionName;
				//echo '<br>';
				$parameters = $segments;
				//echo 'Параметры: ' . '<br>';
				//echo '<pre>' . print_r($parameters, true) . '</pre>';


				//* cоздать объект и вызвать метод (т.е. action)

				$controllerClass = $this->getNamespace() . $controllerName;
				if (class_exists($controllerClass)) {
					$controllerClass =   new $controllerClass;

					$result = call_user_func_array(
						array($controllerClass, $actionName),
						$parameters
					);
					return true;
				} else {
				    die('This route or controller not find. ' . $controllerClass);
                }
			}
		}
	}
	protected function getNamespace()
	{
		$namespace = 'App\Controllers\\';
		return $namespace;
	}
}
