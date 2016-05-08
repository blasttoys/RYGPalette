<?php
class RYGPalette{
	/*position starts from 0
	
	/*
	 * for each color the max hexvalue is 255
	 * therefore if ever the hexvalue surpass 255
	 * shall be limit at 255
	 */
	private $_size,
			$_RedStart=248,
			$_GreenStart=105,
			$_BlueStart=107,
			$_RedEnd=99,
			$_GreenEnd=190,
			$_BlueEnd=123;
	
	public function __construct($size){
		$this->_size = $size;
	}
	
	public function getRed($position){
		$scale = ($position+1)/($this->_size)*10;
		$red = 0.1728*pow($scale,4)-3.7675*pow($scale,3)+23.753*pow($scale,2)-52.064*$scale+281.5;
		if($red>255){
			$red=255;
		}
		return round($red);
	}
	
	public function getGreen($position){
		$scale = ($position+1)/$this->_size*10;
		$green = 0.167*pow($scale,4)-3.7725*pow($scale,3)+24.9*pow($scale,2)-31.403*$scale+116.5;
		if($green>255){
			$green=255;
		}
		return round($green);
	}
	
	public function getBlue($position){
		$scale = ($position+1)/($this->_size)*10;
		$blue = -0.7083*pow($scale,2)+9.7008*$scale+96.017;
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