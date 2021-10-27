<?php
namespace App\Entity;

use App\Interface\AdressInterface;
use App\Repository\AdressRepository;

class Adress extends AdressRepository implements AdressInterface
{
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
	private int $id;
	private int $number;
	private string $street;
	private string $complementary;
	
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
	final public function getNumber(): int
	{
		return $this->number;
	}
	
	/**
	 * @return string
	 */
	final public function getStreet(): string
	{
		return $this->street;
	}
	
	/**
	 * @return string
	 */
	final public function getComplementary(): string
	{
		return $this->complementary;
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
	 * @param int $number
	 * @return $this
	 */
	final public function setNumber(int $number): self
	{
		$this->number = $number;
		return $this;
	}
	
	/**
	 * @param string $street
	 * @return $this
	 */
	final public function setStreet(string $street): self
	{
		$this->street = $street;
		return $this;
	}
	
	/**
	 * @param string $complementary
	 * @return $this
	 */
	final public function setComplementary(string $complementary): self
	{
		$this->complementary = $complementary;
		return $this;
	}
	
}