<?php
class Route{
	static function start($resultPerPage){
		$controllerName = 'Main';
		$actionName = 'Main';
		$modelName = 'model';

		$routes = explode('/', $_SERVER['REQUEST_URI']);
		echo $routes;
		if ( !empty($routes[1]) ){	
			$controllerName = $routes[1];
		}
		
		if ( !empty($routes[2]) ){
			$actionName = $routes[2];
		}

		$controllerName = 'Controller'. ucfirst($controllerName);
		$actionName = 'action_'.$actionName;
		$controllerFile = strtolower($controllerName) . '.php';
		$controllerPath = "src/app/controllers/".$controllerFile;
		if(file_exists($controllerPath)){
			include_once "src/app/controllers/".$controllerFile;
		}
		$controller = new $controllerName($resultPerPage);
		$action = $actionName;
		if(method_exists($controller, $action)){
			$controller->$action();
		}
		else{
			echo 'error';		
		}

		$modelFile = strtolower($modelName) . '.php';
		$modelPath = "src/app/core/".$modelFile;
		if(file_exists($modelPath)){
			include_once "src/app/core/".$modelFile;
		}
		else{
			echo 'error';		
		}

	}

	static function ErrorPage404(){
    $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
    header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}
