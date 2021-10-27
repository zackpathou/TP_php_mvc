<?php
namespace Core\Route;

use config\RouteConfig;

class CoreRoute extends CoreRouteOptions
{
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
	protected string $_uri = "/";
	protected static array $_routes = [];
	protected static array $_validRoute = [];
	
	// ########################################################################################################## //
	// Constructor //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// List of Getters about variables  //
	// ########################################################################################################## //
	
	/**
	 * The getter function "getUri"
	 *
	 * @return string
	 */
	final public function getUri(): string
	{
		return $this->_uri;
	}
	
	// ########################################################################################################## //
	// List of Setters about variables //
	// ########################################################################################################## //
	
	/**
	 * The setter function "setUri"
	 *
	 * @param string $uri
	 * @return $this
	 */
	final public function setUri(string $uri): self
	{
		$this->_uri = $uri;
		return $this;
	}

	/**
	 * The setter function "setRouteUri"
	 *
	 * @return $this
	 */
	final public function setRouteUri(): self
	{
		$baseOptions = substr(strstr($this->getUri(), '?'), 0);
		$pattern = "/[a-zA-Z0-9]+=[a-zA-Z0-9]+/";
		preg_match_all($pattern, $baseOptions, $preg);
		$countPreg = count($preg[0]);
		
		if($countPreg > 0) {
			
			foreach ($preg[0] as $iValue) {
				$value = substr(strstr($iValue, '='), 1);
				$key = substr(strstr($iValue, '=', true), 0);
				$this->setApp("GET", $key, $value);
			}
			
			$uri = str_replace($baseOptions, "", $this->getUri());
			
			if ($uri[strlen($uri)-1] === "/" && strlen($uri) > 1) { $this->setUri(substr($uri, 0, -1)); }
			else { $this->setUri($uri); }
			
		}
		else if ($this->getUri()[strlen($this->getUri())-1] === "/" && strlen($this->getUri()) > 1) {
			$uri = str_replace($baseOptions, "", $this->getUri());
			$this->setUri(substr($uri, 0, -1));
		}
		else {
			$uri = str_replace($baseOptions, "", $this->getUri());
			$this->setUri($uri);
		}
		return $this;
	}
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //
	
	/**
	 * The function "startRouting" :
	 *
	 * @param string $uri
	 */
	final public function startRouting(): void
	{
		# Add Globals App Params
		$this->setGlobalsParams();
		
		# Start router
		$this->setUri(URI)->setRouteUri();
		new RouteConfig();
		$this->controllerRoute();
	}
	
	/**
	 * The function "setGlobalsParams" :
	 *
	 */
	final public function setGlobalsParams(): void
	{
		
		# App Options User
		if(empty($this->getApp("user")) || !$_SESSION["user"]) {
			$this->setApp("user", []);
		}
		else {
			$this->setApp("user", $_SESSION["user"]);
		}
		
		# App Options GET
		if(isset($_GET)) {
			$this->setApp("GET", $_GET);
		}
		
		# App Options POST
		if(isset($_POST)) {
			$this->setApp("POST", $_POST);
		}
		
		# App Options POST
		if(isset($_REQUEST)) {
			$this->setApp("REQUEST", $_REQUEST);
		}
		
		# App Options SESSION
		if(isset($_SESSION)) {
			$this->setApp("SESSION", $_SESSION);
		}
		
		# App Options SESSION
		if(isset($_SERVER)) {
			$this->setApp("SERVER",  $_SERVER);
			$this->setApp("SERVER",  "PATH", "");
		}
	}
	
	/**
	 * The function "addRoute" :
	 *
	 * @param array $methods
	 * @param string $uri
	 * @param string $controller
	 * @param string $action
	 * @param array|null $options
	 */
	final public static function addRoute(array $methods, string $uri, string $controller, string $action, array|null $options = array()): void
	{
		
		# Découpe et compteur de l'uri en cours dans un tableau.
		$arrayUri = explode("/", $uri);
		$arrayUri[0] = "/";
		if(!$arrayUri[1]) {
			$arrayUri[1] = "/";
			array_shift($arrayUri);
		}
		
		self::$_routes[count(self::$_routes)] = [
			"uri" => $arrayUri,
			"controller" => $controller,
			"action" => $action,
			"methods" => $methods,
			"options" => $options
		];
	}
	
	/**
	 * The function "controllerRoute" :
	 *
	 */
	final public function controllerRoute(): void
	{
		# Variable arrayUri with getUri(),
		# Variable countArrayUri with Count arrayUri.
		$arrayUri = explode("/", $this->getUri());
		$arrayUri[0] = "/";
		if(isset($arrayUri[1]) && $arrayUri[1] === "") {
			$arrayUri[1] = "/";
			array_shift($arrayUri);
		}
		$countArrayUri = count($arrayUri);
		
		# Variable validRoute with Array
		$validRoute = self::$_validRoute;
		
		foreach(self::$_routes as $route) {
			
			# Creating Variables with Array route
			$routeMethods = $route["methods"];
			$routeUri = $route["uri"];
			$routeController = $route["controller"];
			$routeAction = $route["action"];
			$routeOptions = $route["options"];
			
			# Creating Variables Count with Array route
			$countRouteUri = count($routeUri);
			$countRouteOptions = count($routeOptions);
			
			# Control matching getApp(SERVER, REQUEST_METHOD) in routeMethods
			$routeMethodExist = 0;
			if(in_array($this->getApp("SERVER", "REQUEST_METHOD"), $routeMethods)) {
				$routeMethodExist++;
			}
			
			if($routeMethodExist > 0) {
				
				# Control matching Uri between arrayUri and routeUri
				$matchUri = 0;
				for($i = 0; $i < $countArrayUri; $i++) {
					if(isset($arrayUri[$i]) && isset($routeUri[$i]) && $arrayUri[$i] === $routeUri[$i]) {
						$matchUri++;
					}
				}
				
				# Control different Uri between arrayUri and routeUri
				$diffRoutes = array_intersect($arrayUri, $routeUri);
				$countDiffRoutes = count($diffRoutes);
				
				# Update Variable validRoute
				if($countRouteUri === $countArrayUri) {
					if($countArrayUri === $countDiffRoutes) {
						if($countDiffRoutes === $matchUri) {
							$validRoute["uri"] = $routeUri;
							$validRoute["controller"] = $routeController;
							$validRoute["action"] = $routeAction;
							$validRoute["methods"] = $routeMethods;
							$validRoute["options"] = [];
							if ($countRouteOptions > 0) {
								$validRoute["options"] = $routeOptions;
							}
						}
					}
				}
			}
		}
		
		# Verification Variable Count validRoute.
		# If validRoute true controllerAction(validRoute)
		# Else renderError
		count($validRoute) === 5
			? $this->controllerAction($validRoute)
			: $this->renderError(404, "Page Introuvable.");
	}
	
	/**
	 * The function "controllerAction" :
	 *
	 * @param array $validRoute
	 */
	final public function controllerAction(array $validRoute): void
	{
		$controller = "App\\Controller\\" . $validRoute["controller"];
		$action = $validRoute["action"];
		$options = $validRoute["options"];
		$controllerFile = ROOT . $controller . ".php";
		
		if (is_file($controllerFile)) {
			$appController = new $controller;
			if(method_exists($appController,  $action)) {
				if(count($options) === 0) { $appController->$action(); }
				else { $appController->$action(...$options); }
			}
			else { $this->renderError(500, "Methode introuvable dans le controller."); }
		}
		else { $this->renderError(404, "Fichier du controller introuvable."); }
		
	}
}