<?php
namespace Core\Repository;

use Core\Bdd\CoreBdd;
use DateTime;
use Exception;
use PDO;

abstract class CoreRepository
{
	// ########################################################################################################## //
	// List of globals' variables //
	// ########################################################################################################## //
	
	private DateTime $createdAt;
	
	// ########################################################################################################## //
	// List of globals' Getters about variables  //
	// ########################################################################################################## //
	
	/**
	 * @return string
	 */
	final public function getCreatedAt(): string
	{
		return $this->createdAt->format("d m Y");
	}
	
	// ########################################################################################################## //
	// List of globals' Setters about variables //
	// ########################################################################################################## //
	
	/**
	 * @return $this
	 */
	final public function setCreatedAt(): self
	{
		$this->createdAt = new DateTime("now");
		return $this;
	}
	
	// ########################################################################################################## //
	// List of globals' methods //
	// ########################################################################################################## //
	
	/**
	 * The function "getTableName"
	 *
	 * @return string
	 */
	final public function getTableName(): string
	{
		$tableRoute = (string) $this::class;
		$tableRouteArray = explode("\\", $tableRoute);
		$lastTableRoute = array_key_last($tableRouteArray);
		return $tableRouteArray[$lastTableRoute];
	}
	
	/**
	 * The function "connectPDO"
	 *
	 * @return PDO
	 */
	final public function connectPDO(): PDO
	{
		# Connection to the MySQL datas bases
		$CoreBdd = new CoreBdd();
		return $CoreBdd->start()->getBdd();
	}

}