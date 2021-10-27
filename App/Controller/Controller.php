<?php
namespace App\Controller;

use Core\Views\CoreViews;

class Controller extends CoreViews
{
	/**
	 *   Controller Index
	 */
	final public function Index(): void
  {
	  $this->render("index.php");
  }
}