<?php
namespace App\Entity;

use App\Interface\DriverInterface;
use App\Repository\DriverRepository;

class Driver extends DriverRepository implements DriverInterface
{
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
	private int $id;
	private string $firstname;
	private string $lastname;
	private int $vehiculeId;
	
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
	 * @return int
	 */
	final public function getFirstname(): int
	{
		return $this->firstname;
	}
	
	/**
	 * @return string
	 */
	final public function getLastname(): string
	{
		return $this->lastname;
	}
	
	/**
	 * @return int
	 */
	final public function getVehiculeId(): int
	{
		return $this->vehiculeId;
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
	 * @param string $firstname
	 * @return $this
	 */
  final public function setFirstname(string $firstname): self
	{
		$this->firstname = $firstname;
		return $this;
	}
	
	/**
	 * @param string $lastname
	 * @return $this
	 */
  final public function setLastname(string $lastname): self
	{
		$this->lastname = $lastname;
		return $this;
	}
	
	/**
	 * @param int $vehiculeId
	 * @return $this
	 */
	final public function setVehiculeId(int $vehiculeId): self
	{
		$this->vehiculeId = $vehiculeId;
		return $this;
	}
	
}