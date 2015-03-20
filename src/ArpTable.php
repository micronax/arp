<?php

namespace arp;

use \ArrayAccess;
use \Iterator;
use \Countable;

class ArpTable implements ArrayAccess, Iterator, Countable {
	private $arps = array();
	private $index = 0;

	public function __construct(&$arps = array()) {
		$this->arps = $arps;
	}

	public function offsetExists ($offset) {
		return isset($this->arps[$offset]);
	}

	public function offsetGet($offset) {
		return $this->offsetExists($offset) ? $this->arps[$offset] : null;
	}

	public function offsetSet($offset, $value) {
		if (! $value instanceof Arp) {
			throw new BadMethodCallException('value but be an \apr\Apr object');
		}
		if (is_null($offset)) {
			$this->arps[] = $value;
		}
		else {
			$this->arps[$offset] = $value;
		}
	}

	public function offsetUnset($offset) {
		unset($this->arps[$offset]);
	}

	public function count() {
		return sizeof($this->arps);
	}

	public function current() {
		return $this->offsetGet($this->index);
	}

	public function next() {
		$this->index++;
	}

	public function rewind() {
		$this->index = 0;
	}

	public function key() {
		return $this->index;
	}

	public function valid() {
		return $this->offsetExists($this->index);
	}

	public function filterByDevice ($device) {
		if ($device === null) return $this;
		return new ArpTable(array_values(array_filter($this->arps, function ($arp) use ($device) {
			return $arp->getDevice() === $device;
		})));
	}

	public function filterByMacAddress ($macAddress) {
		if ($macAddress === null) return $this;
		return new ArpTable(array_values(array_filter($this->aprs, function ($arp) use ($device) {
			return $arp->getMacAddress() === $nacAddress;
		})));
	}
}
