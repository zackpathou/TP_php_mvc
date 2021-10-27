<?php
namespace Core\Route;

use Core\Views\CoreViews;

class CoreRouteController
{
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
	private static CoreRoute $CoreRoute;
	private static CoreViews $CoreViews;
	
	// ########################################################################################################## //
	// Constructor //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// List of Getters about variables  //
	// ########################################################################################################## //
	
	/**
	 * The getter function "getRoute"
	 *
	 * @return CoreRoute
	 */
	final public static function getRoute(): CoreRoute
	{
		return self::$CoreRoute;
	}
	
	/**
	 * The getter function "getView"
	 *
	 * @return CoreViews
	 */
	final public static function getView(): CoreViews
	{
		return self::$CoreViews;
	}
	
	// ########################################################################################################## //
	// List of Setters about variables //
	// ########################################################################################################## //
	
	/**
	 * The setter function "setRoute"
	 *
	 * @return $this
	 */
	final public function setRoute(): self
	{
		self::$CoreRoute = new CoreRoute();
		return $this;
	}
	
	/**
	 * The setter function "setView"
	 *
	 * @return $this
	 */
	final public function setView(): self
	{
		self::$CoreViews = new CoreViews();
		return $this;
	}
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //
	
	/**
	 * The function "route"
	 *
	 * @return CoreRoute
	 */
	final public function route(): CoreRoute
	{
		return self::setRoute()->getRoute();
	}
	
	/**
	 * The function "route"
	 *
	 * @return CoreViews
	 */
	final public function view(): CoreViews
	{
		return self::setView()->getView();
	}
	
}