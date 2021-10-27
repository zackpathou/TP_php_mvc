<?php
namespace Core\Route;

abstract class CoreRouteOptions extends CoreRouteRender
{
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
	protected static array $_options = [];
	
	// ########################################################################################################## //
	// Constructor //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// List of Getters about variables  //
	// ########################################################################################################## //
	
	/**
	 *  The getter function "getApp"
	 *
	 * @param string|null $type
	 * @param string|null $key
	 * @param string|null $value
	 * @return mixed
	 */
	final public function getApp(string $type = null, string $key = null, string $value = null): mixed
	{
		if(isset(self::$_options["app"]) && is_null($type) && is_null($key) && is_null($value)) {
			return self::$_options["app"];
		}
		if(isset(self::$_options["app"][$type]) && !is_null($type) && is_null($key) && is_null($value)) {
			return self::$_options["app"][$type];
		}
		if(isset(self::$_options["app"][$type][$key]) && !is_null($type) && !is_null($key) && is_null($value)) {
			return self::$_options["app"][$type][$key];
		}
		if(isset(self::$_options["app"][$type][$key][$value]) && !is_null($type) && !is_null($key) && !is_null($value)) {
			return self::$_options["app"][$type][$key][$value];
		}
		return null;
	}
	
	// ########################################################################################################## //
	// List of Setters about variables //
	// ########################################################################################################## //
	
	/**
	 * The setter function "setApp"
	 *
	 * @param string $type
	 * @param string|array|null $key
	 * @param string|array|null $value
	 * @return $this
	 */
	final public function setApp(string $type, string|array $key = null, string|array $value = null): self
	{
		if($key !== null && $value === null) {
			if(is_array($key)) {
				foreach($key as $k => $v) {
					self::$_options["app"][$type][$k] = $v;
				}
			}
			else {
				self::$_options["app"][$type] = $key;
			}
		}
		else {
			self::$_options["app"][$type][$key] = $value;
		}
		return $this;
	}
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //
	
}