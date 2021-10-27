<?php
namespace App\Interface;

interface AdressInterface
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
	public function getNumber(): int;
	
	/**
	 * @return string
	 */
	public function getStreet(): string;
	
	/**
	 * @return string
	 */
	public function getComplementary(): string;
	
	// ########################################################################################################## //
	// List of Setters about variables //
	// ########################################################################################################## //
	
	/**
	 * @param int $id
	 * @return $this
	 */
	public function setId(int $id): self;
	
	/**
	 * @param int $number
	 * @return $this
	 */
	public function setNumber(int $number): self;
	
	/**
	 * @param string $street
	 * @return $this
	 */
	public function setStreet(string $street): self;
	
	/**
	 * @param string $complementary
	 * @return $this
	 */
	public function setComplementary(string $complementary): self;
	
}