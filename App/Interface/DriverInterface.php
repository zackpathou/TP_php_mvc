<?php
namespace App\Interface;

interface DriverInterface
{
	// ########################################################################################################## //
	// List of Getters about variables  //
	// ########################################################################################################## //
	
	/**
	 * @return int
	 */
	public function getId(): int;
	
	/**
	 * @return int
	 */
	public function getFirstname(): int;
	
	/**
	 * @return string
	 */
	public function getLastname(): string;
	
	/**
	 * @return int
	 */
	public function getVehiculeId(): int;
	
	// ########################################################################################################## //
	// List of Setters about variables //
	// ########################################################################################################## //
	
	/**
	 * @param int $id
	 * @return $this
	 */
	public function setId(int $id): self;
	
	/**
	 * @param string $firstname
	 * @return $this
	 */
	public function setFirstname(string $firstname): self;
	
	/**
	 * @param string $lastname
	 * @return $this
	 */
	public function setLastname(string $lastname): self;
	
	/**
	 * @param int $vehiculeId
	 * @return $this
	 */
	public function setVehiculeId(int $vehiculeId): self;
	
}