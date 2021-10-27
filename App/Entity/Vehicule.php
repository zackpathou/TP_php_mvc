<?php
namespace App\Entity;

use App\Interface\VehiculeInterface;
use App\Repository\VehiculeRepository;

class Vehicule extends VehiculeRepository implements VehiculeInterface
{
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
	private int $id;
	private string $name;
	
	// ########################################################################################################## //
	// Constructor //
	// ########################################################################################################## //
	
	public function __construct()
	{
	}
	
	// ########################################################################################################## //
	// List of Getters about variables  //
	// ########################################################################################################## //
	
	/**
	 * @return int
	 */
	final public function getId(): int
	{
		return $this->id;
	}
	
	/**
	 * @return string
	 */
  final public function getName(): string
	{
		return $this->name;
	}
	
	// ########################################################################################################## //
	// List of Setters about variables //
	// ########################################################################################################## //
	
	/**
	 * @param int $id
	 * @return $this
	 */
	final public function setId(int $id): self
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @param string $name
	 * @return $this
	 */
  final public function setName(string $name): self
	{
		$this->name = $name;
		return $this;
	}
	
}