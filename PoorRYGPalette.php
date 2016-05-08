<?php
class PoorRYGPalette{
	private $_size,
	$_RedStart=248,
	$_GreenStart=105,
	$_BlueStart=107,
	$_RedEnd=99,
	$_GreenEnd=190,
	$_BlueEnd=123,
	$_RedBlock,
	$_BlueBlock,
	$_GreenBlock;
	
	public function __construct($size){
		$this->_size = $size;
		$this->_RedBlock = ($this->_RedEnd-$this->_RedStart)/($size-1);
		$this->_BlueBlock = ($this->_BlueEnd-$this->_BlueStart)/($size-1);
		$this->_GreenBlock = ($this->_GreenEnd-$this->_GreenStart)/($size-1);
	}
	
	public function getRed($position){
		$scale = $position* $this->_RedBlock;
		$red = $this->_RedStart + $scale;
		if($red>255){
			$red=255;
		}
		return round($red);
	}
	
	public function getGreen($position){
		$scale = $position* $this->_GreenBlock;
		$green = $this->_GreenStart + $scale;
		if($green>255){
			$green=255;
		}
		return round($green);
	}
	
	public function getBlue($position){
		$scale = $position* $this->_BlueBlock;
		$blue = $this->_BlueStart + $scale;
		if($blue>255){
			$blue=255;
		}
		return round($blue);
	}
	
	public function getRGB($position){
		switch($position){
			case 0:
				return array(
				$this->_RedStart,
				$this->_GreenStart,
				$this->_BlueStart
				);
				break;
			case $this->_size-1:
				return array(
				$this->_RedEnd,
				$this->_GreenEnd,
				$this->_BlueEnd
				);
			default:
				return array(
				$this->getRed($position),
				$this->getGreen($position),
				$this->getBlue($position)
				);
	
		}
	}
	
	//http://bavotasan.com/2011/convert-hex-color-to-rgb-using-php/
	public function getHex($position){
		$hex = "#";
		$rgb = $this->getRGB($position);
		$hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
		$hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
		$hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);
		return $hex;
	}
}