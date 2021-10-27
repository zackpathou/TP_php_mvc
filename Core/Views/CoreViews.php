<?php
	namespace Core\Views;
	
	use Core\Route\CoreRouteOptions;
	
	class CoreViews extends CoreRouteOptions
	{
		// ########################################################################################################## //
		// List of variables //
		// ########################################################################################################## //
		
		public static $view;
		public static $optionsApp;
		public static $optionsCore;
		
		// ########################################################################################################## //
		// Constructor //
		// ########################################################################################################## //
		
		public function __construct()
		{
			if(self::$view) { include(self::$view); }
		}
		
		// ########################################################################################################## //
		// List of Getters about variables  //
		// ########################################################################################################## //
		
		final public function App(string...$options): mixed
		{
			if(count($options)) {
				return $this->controlOptions(self::$optionsApp, $options);
			}
			return null;
		}
		
		final public function Core(string ...$options): mixed
		{
			if(count($options)) {
				return $this->controlOptions(self::$optionsCore, $options);
			}
			return null;
		}
		
		// ########################################################################################################## //
		// List of Setters about variables //
		// ########################################################################################################## //
		
		// ########################################################################################################## //
		// Liste of another methods //
		// ########################################################################################################## //
		
		private function controlOptions(array $datas, array $options): mixed
		{
			$array = $datas;
			$valid = 0;
			for($i = 0; $i < count($options); $i++) {
				if(isset($array[$options[$i]])) {
					$array = $array[$options[$i]];
					$valid++;
				}
			}
			$error = null;
			return count($options) === $valid ? $array : $error;
		}
		
	}