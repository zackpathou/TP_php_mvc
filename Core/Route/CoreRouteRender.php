<?php
namespace Core\Route;

use Core\Views\CoreViews;

abstract class CoreRouteRender
{
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// Constructor //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// List of Getters about variables  //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// List of Setters about variables  //
	// ########################################################################################################## //
	
	// ########################################################################################################## //
	// Liste of another methods //
	// ########################################################################################################## //
	
	/**
	 * The function "render"
	 *
	 * @param string $view
	 * @param array $viewParams
	 */
	final public function render(string $view, array $viewParams = []): void
	{
		$_fileView = str_replace("\\", DIRECTORY_SEPARATOR, VIEWS . $view);
		
		if(count($viewParams)) { $this->setApp("params", $viewParams); }
		
		$this->getApp("REQUEST","help") === "index"
			? $this->renderView(VIEWS . "help\\index.php")
			: $this->renderView($_fileView);;
			
	}
	
	/**
	 * The function "renderError"
	 *
	 * @param int $codeError
	 * @param string $errorMessage
	 */
	final public function renderError(int $codeError, string $errorMessage): void
	{
		$this->setApp("error", "title", "Erreur " . $codeError);
		$this->setApp("error", "message", $errorMessage);
		$this->setApp("error", "codeError", $codeError);
		
		$this->renderView(str_replace("\\", DIRECTORY_SEPARATOR, VIEWS . "errors.php"));
	}
	
	/**
	 * The function "redirect"
	 *
	 * @param string $view
	 */
	final public function redirect(string $view): void
	{
		header("Location: " . $view );
	}
	
	/**
	 * The function "renderView"
	 *
	 * @param string $view
	 * @return CoreViews
	 */
	final public function renderView(string $view): CoreViews
	{
		# Options App
		CoreViews::$optionsApp["error"] = $this->getApp("error");
		CoreViews::$optionsApp["user"] = $this->getApp("user");
		CoreViews::$optionsApp["params"] = $this->getApp("params");
		CoreViews::$optionsApp["request"] = $this->getApp("REQUEST");
		CoreViews::$optionsApp["get"] = $this->getApp("GET");
		CoreViews::$optionsApp["post"] = $this->getApp("POST");
		
		# Options Core
		CoreViews::$optionsCore["server"] = $this->getApp("SERVER");
		CoreViews::$optionsCore["parent"] = $this;
		
		# View folder
		CoreViews::$view = $view;
		
		return new CoreViews();
		
	}
	
}