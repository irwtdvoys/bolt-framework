<?php
	require("vendor/autoload.php");

	define("ROOT_SERVER", __DIR__ . "/");

	require_once(ROOT_SERVER . "library/config.php");

	set_error_handler(array("Bolt\\Handler", "error"), E_ALL & ~E_NOTICE);
	set_exception_handler(array("Bolt\\Handler", "exception"));

	#$dbo = new Cube\Dbo($connection);
	$api = new Bolt\Api();

	$controllerName = "App\\Controllers\\" . $api->route->controller;

	if (class_exists($controllerName))
	{
		$controller = new $controllerName($dbo);

		if (method_exists($controller, $api->route->method))
		{
			$api->response->data = $controller->{$api->route->method}($api);
		}
	}
	elseif ($api->route->controller == "")
	{
		$api->response->data = array("test" => "data");
		/*$config = new Cube\Config();
		$versioning = $config->versionInfo();

		$api->response->data = array(
			"name" => API_NAME,
			"deployment" => DEPLOYMENT,
			"versioning" => $versioning['version']
		);*/
	}

	$api->response->output();
?>

