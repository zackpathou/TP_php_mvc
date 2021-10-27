<?php
function autoload ($pClassName) {
	$link = str_replace("\\", DIRECTORY_SEPARATOR, ROOT . $pClassName);
	if(is_file($link . ".php")){ require_once($link . ".php"); }
}
spl_autoload_register("autoload");