<style>
body{
text-transform: uppercase;
font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
margin: auto;
width: 55%;
padding: 50px;
}
table{
padding: 0 10px;}
</style>

<?php
require 'RYGPalette.php';
require 'PoorRYGPalette.php';

function Hex($rgb){
	$hex = "#";
	$hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
	$hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
	$hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);
	return $hex;
}

$MSpalette = array(
				array(248,105,107),
				array(249,128,111),
				array(251,164,118),
				array(251,175,120),
				array(254,223,129),
				array(240,231,132),
				array(193,218,129),
				array(177,213,128),
				array(115,195,124),
				array(99,190,123)
				);

$colorPaletteSize = 10;
$colorPalette = new RYGPalette($colorPaletteSize);
$colorPalettePoorSize = 10;
$colorPalettePoor = new PoorRYGPalette($colorPalettePoorSize);

echo "<table><tr>
		<td colspan='10'>Microsoft Palette (Original)</td>
		</tr>
		<tr>";
for ($i=0;$i<sizeof($MSpalette);$i++){
	$color = Hex($MSpalette[$i]);
	echo "<td style=\"background-color:".$color."\">";
	echo $color." </td>";
}


//output of RYGPalette trying to imitate
echo "</tr>
		<tr>
		<td colspan='10'>RYGPalette</td>
		</tr>
		<tr>";
for($i=0;$i<$colorPaletteSize;$i++){
	echo "<td style=\"background-color:".$colorPalette->getHex($i)."\">";
	echo $colorPalette->getHex($i)." </td>";
}


//output of PoorRYGPalette trying to imitate
echo "</tr>
		<tr>
		<td colspan='10'>Poor RYGPalette</td>
		</tr>
		<tr>";
for($i=0;$i<$colorPalettePoorSize;$i++){
	echo "<td style=\"background-color:".$colorPalettePoor->getHex($i)."\">";
	echo $colorPalettePoor->getHex($i)." </td>";
}
echo "</tr></table>";