<?php
/*  Copyright 2008-2009 Eugenio Favalli
    (email : elvenprogrammer.at.themanaworld.org)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
// Initialize variables
$width = 400;
$height = 100;
$points = array(0);
$labels = array('');
$legend = array('');
$rows = 2;
$color = array(0, 119, 204);
$style = 1;
$vertical = 0;
$thick = 4;
// Parse parameters
if (isset($_REQUEST['w'])) $width = $_REQUEST['w'];
if (isset($_REQUEST['h'])) $height = $_REQUEST['h'];
if (isset($_REQUEST['p'])) $points = $_REQUEST['p'];
if (isset($_REQUEST['l'])) $labels = split(",", $_REQUEST['l']);
if (isset($_REQUEST['r'])) $rows = $_REQUEST['r'];
if (isset($_REQUEST['c'])) $color = $_REQUEST['c'];
if (isset($_REQUEST['s'])) $style = split(",", $_REQUEST['s']);
if (isset($_REQUEST['v'])) $vertical = $_REQUEST['v'];
if (isset($_REQUEST['t'])) $thick = split(",", $_REQUEST['t']);
if (isset($_REQUEST['i'])) $legend = split(",", $_REQUEST['i']);
if ($style > 0)
{
	header("Content-type: image/png");
	$image = graph($width, $height, $points, $labels, $rows, $color, $style, $vertical, $thick, $legend);
	imagepng($image);
	imagedestroy($image);
}
else
{
	echo '<img style="border: 0" src="' . str_replace('style=0', 'style=1', $_SERVER["REQUEST_URI"]) . '" usemap="#graphmap" />';
	echo '<map name="graphmap" />';
	graph($width, $height, $points, $labels, $rows, $color, $style, $vertical, $thick, $legend);
	echo '</map>';
}

function imagelinethick($image, $x1, $y1, $x2, $y2, $color, $thick = 1)
{
	if ($thick == 1) {
		return imageline($image, $x1, $y1, $x2, $y2, $color);
	}
	$t = $thick / 2 - 0.5;
	if ($x1 == $x2 || $y1 == $y2) {
		return imagefilledrectangle(
			$image,
			round(min($x1, $x2) - $t),
			round(min($y1, $y2) - $t),
			round(max($x1, $x2) + $t),
			round(max($y1, $y2) + $t),
			$color);
	}
	$k = ($y2 - $y1) / ($x2 - $x1); //y = kx + c
	$a = $t / sqrt(1 + pow($k, 2));
	$points = array(
		round($x1 - (1+$k)*$a), round($y1 + (1-$k)*$a),
		round($x1 - (1-$k)*$a), round($y1 - (1+$k)*$a),
		round($x2 + (1+$k)*$a), round($y2 - (1-$k)*$a),
		round($x2 + (1-$k)*$a), round($y2 + (1+$k)*$a),
	);
	imagefilledpolygon($image, $points, 4, $color);
	return imagepolygon($image, $points, 4, $color);
}

function endpoint1($image, $cx, $cy, $color, $thick)
{
	$r1 = $thick + 4;
	$r2 = $thick + 2;
	$white = imagecolorallocate($image, 255, 255, 255);
	imagefilledellipse($image, $cx, $cy, $r1, $r1, $color);
	imagefilledellipse($image, $cx, $cy, $r2, $r2, $white);
}

function endpoint2($image, $cx, $cy, $color, $thick)
{
	$r1 = $thick + 5;
	$r2 = $thick + 2;
	$white = imagecolorallocate($image, 255, 255, 255);
	imagefilledellipse($image, $cx, $cy, $r1, $r1, $white);
	imagefilledellipse($image, $cx, $cy, $r2, $r2, $color);
}

function connector1($image, $x1, $y1, $x2, $y2, $color, $thick)
{
	imagelinethick($image, $x1, $y1, $x2, $y2, $color, $thick);
	endpoint1($image, $x1, $y1, $color, $thick);
	endpoint1($image, $x2, $y2, $color, $thick);
}

function connector2($image, $x1, $y1, $x2, $y2, $color, $thick)
{
	imagelinethick($image, $x1, $y1, $x2, $y2, $color, $thick);
	endpoint2($image, $x1, $y1, $color, $thick);
	endpoint2($image, $x2, $y2, $color, $thick);
}

function gridline($image, $x1, $y1, $x2, $y2)
{
	$grey = imagecolorallocate($image, 196, 196, 196);
	$white = imagecolorallocate($image, 255, 255, 255);
	imageantialias($image, false);
	$style = array($grey, $white);
	imagesetstyle($image, $style);
	imageline($image, $x1, $y1, $x2, $y2, IMG_COLOR_STYLED);
}

function graph($width, $height, $graphs, $labels, $rows = 2, $colors, $styles, $vertical, $thicks, $legend)
{
	// Create image
	$image = imagecreatetruecolor($width, $height);
	$maxwlabel = 0;
	// If we have vertical labels, allow enough space for them
	if ($vertical)
	{
		for ($i=0; $i<sizeof($labels); $i++)
		{
			$wlabel = strlen($labels[$i]) * imagefontwidth($font);
			if ($wlabel > $maxwlabel) $maxwlabel = $wlabel;
		}
	}
	$height = $height - 30 - $maxwlabel; // Allow some space for graphic at the limits

	// Setup colors
	$black = imagecolorallocate($image, 0, 0, 0);
	$grey = imagecolorallocate($image, 196, 196, 196);
	$white = imagecolorallocate($image, 255, 255, 255);

	// Setup font
	$font = 2;

	// Background
	imagefill($image, 0, 0, $white);

	// Grid
	$hgrid = $height / $rows;
	// Get max value
	$max = 0;
	for ($j=0; $j<sizeof($graphs); $j++)
	{
		$points = split(",", $graphs[$j]);
		if (max($points) > $max)
		{
			$max = max($points);
		}
	}
	// Make max value even
	if ($max % 2 == 1) $max++;
	for ($i=0; $i<$rows; $i++)
	{
		gridline($image, 0, 10 + $i * $hgrid, $width, 10 + $i * $hgrid);
		imagestring(
			$image,
			$font,
			2,
			10 + 2 + $i * $hgrid,
			floor($max - ($max / $rows) * $i),
			$grey);
	}
	imageline($image, 0, 10 + $height - 1, $width, 10 + $height - 1, $black);

	$hstep = ($width - 40) / (max(sizeof($points), sizeof($labels)) - 1);
	$vstep = $height / $max;

	// Labels
	for ($i=0; $i<sizeof($labels); $i++)
	{
		$wlabel = strlen($labels[$i]) * imagefontwidth($font);
		$hlabel = imagefontheight($font);
		if ($vertical)
		{
			imagestringup(
				$image,
				$font,
				20 + $i * $hstep - ($hlabel / 2),
				$height + $wlabel + 15,
				$labels[$i],
				$grey);
		}
		else
		{
			imagestring(
				$image,
				$font,
				20 + $i * $hstep - ($wlabel / 2),
				$height + 15,
				$labels[$i],
				$grey);
		}
	}

	imageantialias($image, true);
	for ($j=0; $j<sizeof($graphs); $j++)
	{
		$color = split(",", $colors[$j]);
		$color = imagecolorallocate($image, $color[0], $color[1], $color[2]);
		$thick = $thicks[$j];
		$points = split(",", $graphs[$j]);
		$style = $styles[$j];
		$p2 = $points[0];
		for ($i=1; $i<sizeof($points); $i++)
		{
			$p1 = $p2;
			$p2 = $points[$i];
			switch ($style) {
				case 0:
					if ($i == 1) echo '<area shape="circle" coords="' . (20 + ($i - 1) * $hstep) . ',' . (10 + $height - ($vstep * $p1)) . ',10" href="javascript:alert(' . $p1 . ');" title="' . $p1 . '" />';
					echo '<area shape="circle" coords="' . (20 + $i * $hstep) . ',' . (10 + $height - ($vstep * $p2)) . ',10" href="javascript:alert(' . $p2 . ');" title="' . $p2 . '" />';
				break;
				case 2:
					connector2(
						$image,
						20 + ($i - 1) * $hstep,
						10 + $height - ($vstep * $p1),
						20 + $i * $hstep,
						10 + $height - ($vstep * $p2),
						$color,
						$thick);
				break;
				case 1:
				default:
					connector1(
						$image,
						20 + ($i - 1) * $hstep,
						10 + $height - ($vstep * $p1),
						20 + $i * $hstep,
						10 + $height - ($vstep * $p2),
						$color,
						$thick);
				break;
			}
			
		}
	}

	$border = 5;
	$lbullet = 5;
	$lwidth = 0;
	for ($i=0; $i<sizeof($legend); $i++)
	{
		if (strlen($legend[$i]) * imagefontwidth($font) > $lwidth)
		{
			$lwidth = strlen($legend[$i]) * imagefontwidth($font);
		}
	}
	$lwidth = $lwidth + $lbullet + 2 + 2 + 4;
	$lheight = sizeof($graphs) * ($hlabel + 2);
	imagefilledrectangle($image, $width - $lwidth - $border, $border, $width - $border, $lheight + $border, $white);
	imagerectangle($image, $width - $lwidth - $border, $border, $width - $border, $lheight + $border, $grey);
	for ($j=0; $j<sizeof($graphs); $j++)
	{
		$color = split(",", $colors[$j]);
		$color = imagecolorallocate($image, $color[0], $color[1], $color[2]);
		imagefilledrectangle(
			$image,
			$width - $lwidth - $border + 2,
			$border + $j * ($hlabel + 2) + ($hlabel - $lbullet) / 2,
			$width - $lwidth - $border + 2 + $lbullet,
			$border + $j * ($hlabel + 2) + ($hlabel - $lbullet) / 2 + $lbullet,
			$color);
		imagestring(
			$image,
			$font,
			$width - $lwidth - $border + 2 + $lbullet + 4,
			$border + $j * ($hlabel + 2),
			$legend[$j],
			$grey);
	}

	return $image;
}
?>