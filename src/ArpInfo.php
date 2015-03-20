<?php

namespace apr;

/**
 * ARP info entrie in local ARP table
 */
class ArpInfo {
	/**
	 * @var string Ip address
	 */
	private $ipAddress;

	/**
	 * @var string Type of ARP entrie
	 */
	private $type;

	/**
	 * @var string Mac address
	 */
	private $macAddress;

	/**
	 * @var string mask
	 */
	private $mask;

	/**
	 * @var string related device
	 */
	private $device;

	/**
	 * @var string entrie flag
	 */
	private $flag;


	public function setIpAddress($ipAddress) {
		$this->ipAddress = $ipAddress;
		return $this;
	}
	
	/**
	 * @return string ip address
	 */
	public function getIpAddress() {
		return $this->ipAddress;
	}

	public function setType($type) {
		$this->type = $type;
		return $this;
	}

	/**
	 * @return string type
	 */
	public function getType() {
		return $this->type;
	}

	public function setMacAddress($macAddress) {
		$this->macAddress = $macAddress;
		return $this;
	}

	/**
	 * @return string mac addres
	 */
	public function getMacAddress() {
		return $this->macAddress;
	}

	public function setMask($mask) {
		$this->mask = $mask;
		return $this;
	}

	/**
	 * @return string mask
	 */
	public function getMask() {
		return $this->mask;
	}

	public function setDevice($device) {
		$this->device = $device;
		return $this;
	}

	/**
	 * @return string device name
	 */
	public function getDevice() {
		return $this->device;
	}

	public function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	/**
	 * @return string flag
	 */
	public function getFlag() {
		return $this->flag;
	}
}
