<?php

namespace apr;

use \SplFileObjet;

class LinuxArpTableParcer implements ArpTableParcer {
	private $file;

	public function __construct($path = '/proc/net/arp') {
		$this->file = new SplFileObject($path);
	}
	
	public function parce() {
		$arps = new ArpCollection();
		foreach($this->file as $index => $line) {
			if($index == 0) continue;
			if(preg_match_all('/[\w.:*]+/', $line, $matches)) {
				$arps [] = (new Arp())
					->setIpAddress($matches[0][0])
					->setMacAddress($matches[0][3])
					->setDevice($matches[0][5]);
			}
		}

		return $arps;
	}
}
