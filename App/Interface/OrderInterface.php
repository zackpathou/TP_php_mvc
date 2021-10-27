<?php
namespace App\Interface;

interface OrderInterface
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
	public function getPrice(): int;
	
	/**
	 * @return int
	 */
	public function getDeliveryAddressId(): int;
	
	/**
	 * @return int
	 */
	public function getPickupAddressId(): int;
	
	/**
	 * @return string
	 */
	public function getDescription(): string;
	
	// ########################################################################################################## //
	// List of Setters about variables //
	// ########################################################################################################## //
	
	/**
	 * @param int $id
	 * @return $this
	 */
	public function setId(int $id): self;
	
	/**
	 * @param int $price
	 * @return $this
	 */
	public function setPrice(int $price): self;
	
	/**
	 * @param int $deliveryAddressId
	 * @return $this
	 */
	public function setDeliveryAddressId(int $deliveryAddressId): self;
	
	/**
	 * @param int $pickupAddressId
	 * @return $this
	 */
	public function setPickupAddressId(int $pickupAddressId): self;
	
	/**
	 * @param string $description
	 * @return $this
	 */
	public function setDescription(string $description): self;
	
}