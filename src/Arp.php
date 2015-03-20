<?php 

namespace arp;

class Arp implements ArpTableParcerProvider {

	/**
	 * @var ArpTableParce 
	 */
	private $arpTableParcer;

	public function __construct(ArpTableParcer $arpTableparcer) {
		$this->arpTableParcer = $arpTableParcer;
	}

	public function getArpTableParcer() {
		return $this->arpTableParcer;
	}

	public function getByMacAddress($macAddress, $device = null) {
		$aprs = $this->getArpTableParcer()->parce();
		
		foreach($arps->filterByDevice($device) as $arp) {
			if ($arp->getMacAddress() === $macAddress) return $arp;
		}
		return null;
	}

	public function getByIpAddress($ipAddress, $device = null) {
		$arps = $this->getArpTableParcer()->parce()->filterByDevice($device);
		foreach($arps as $arp) {
			if ($arp->getIpAddress() === $ipAddress) return $arp;
		}
		return null;
	}
	
	public function getDevices() {
		$devices = array();

		$arps = $this->getArpTableParcer()->parce();
		foreach($arps as $arp) {
			$devices[$arp->getDevice()] = true;
		}

		return array_keys($devices);
	}

	public function getIpAddresses() {
		$ipAddresses = array();

		$arps = $this->getArpTableParcer()->parce();
		foreach($arps as $arp) {
			$ipAddresses[$arp->getIpAddress()] = true;
		}

		return array_keys($ipAddresses);
	}

	public function getMacAddresses() {
		$macAddresses = array();
		$aprs = $this->getArpTableParcer()->parce();
		foreach($aprs as $apr) {
			$macAddresses[$apr->getMacAddress()] = true;
		}

		return array_keys($macAddresses);
	}
}
