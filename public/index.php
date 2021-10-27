<?php

use Core\Kernel;

// ########################################################################################################## //
// List of defines //
// ########################################################################################################## //
	
	# Folders defines
	define("ROOT", str_replace("\\", DIRECTORY_SEPARATOR,  dirname(__DIR__, 1) ."\\"));
	define("CONFIG", str_replace("\\", DIRECTORY_SEPARATOR,  dirname(__DIR__, 1) ."\\config\\"));
	define("APP", str_replace("\\", DIRECTORY_SEPARATOR,  dirname(__DIR__, 1) ."\\App\\"));
	define("APPCONTROLLER", str_replace("\\", DIRECTORY_SEPARATOR, dirname(__DIR__, 1) . "\\App\\Controller\\"));
	define("VIEWS", str_replace("\\", DIRECTORY_SEPARATOR, dirname(__DIR__, 1) . "\\templates\\"));
	
	# URI defines
	define("REQUEST_URI", str_replace("/index.php", "", $_SERVER['REQUEST_URI']));
	define("URI", str_replace(substr(strstr(REQUEST_URI, '?'), 0), "", REQUEST_URI));
	
// ########################################################################################################## //
// Autoloader //
// ########################################################################################################## //
	
	require_once(ROOT . "autoload.php");

// ########################################################################################################## //
// Start Kernel //
// ########################################################################################################## //
	
	new Kernel();