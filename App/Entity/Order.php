<?php
namespace App\Entity;

use App\Interface\OrderInterface;
use App\Repository\OrderRepository;

class Order extends OrderRepository implements OrderInterface
{
	// ########################################################################################################## //
	// List of variables //
	// ########################################################################################################## //
	
	private int $id;
	private int $price;
	private int $deliveryAddressId;
	private int $pickupAddressId;
	private string $description;
	
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
	final public function getPrice(): int
	{
		return $this->price;
	}
	
	/**
	 * @return int
	 */
	final public function getDeliveryAddressId(): int
	{
		return $this->deliveryAddressId;
	}
	
	/**
	 * @return int
	 */
	final public function getPickupAddressId(): int
	{
		return $this->pickupAddressId;
	}
	
	/**
	 * @return string
	 */
  final public function getDescription(): string
	{
		return $this->description;
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
	 * @param int $price
	 * @return $this
	 */
	final public function setPrice(int $price): self
	{
		$this->price = $price;
		return $this;
	}
	
	/**
	 * @param int $deliveryAddressId
	 * @return $this
	 */
	final public function setDeliveryAddressId(int $deliveryAddressId): self
	{
		$this->deliveryAddressId = $deliveryAddressId;
		return $this;
	}
	
	/**
	 * @param int $pickupAddressId
	 * @return $this
	 */
	final public function setPickupAddressId(int $pickupAddressId): self
	{
		$this->pickupAddressId = $pickupAddressId;
		return $this;
	}
	
	/**
	 * @param string $description
	 * @return $this
	 */
  final public function setDescription(string $description): self
	{
		$this->description = $description;
		return $this;
	}
	
}