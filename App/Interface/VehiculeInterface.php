<?php
namespace App\Interface;

interface VehiculeInterface
{
	// ########################################################################################################## //
	// List of Getters about variables  //
	// ########################################################################################################## //
	
	/**
	 * @return int
	 */
	public function getId(): int;
	
	/**
	 * @return string
	 */
	public function getName(): string;
	
	// ########################################################################################################## //
	// List of Setters about variables //
	// ########################################################################################################## //
	
	/**
	 * @param int $id
	 * @return $this
	 */
	public function setId(int $id): self;
	
	/**
	 * @param string $name
	 * @return $this
	 */
	public function setName(string $name): self;
	
}