<?php
/*$dr = str_replace($_SERVER['SCRIPT_NAME'], '/includes/', $_SERVER['SCRIPT_FILENAME']);*/
$scale_base = (isset($_GET['scale_base']))? $_GET['scale_base'] : 16;
$scale_ratio = (isset($_GET['scale_ratio']))? $_GET['scale_ratio'] : 2;
$scale_interval = (isset($_GET['scale_interval']))? $_GET['scale_interval'] : 5;

$scaleAr = array();
$scaleIntervals = array();

for ($n = -2; $n <= 18; $n++) {
	$scale_n = $n;
	$scale_f = $scale_base * ($scale_ratio ** ($scale_n / $scale_interval));
	$scale_f = round($scale_f);
	if ($scale_f <140) {
		$scaleAr[$scale_n] = $scale_f;
		if ($n>-1 && (($n)/$scale_interval ==  round(($n)/$scale_interval))) { $scaleIntervals[] = $scale_f; }
	} else {
		break;
	}
}
?>
<!DOCTYPE html>
<html lang="en-GB">

<head>
<meta charset="utf-8"/>
<title>Simple Scale</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link href="all.css" rel="stylesheet" />
</head>

<body>
<div class="tool">
<h1>Simple Scale</h1>

<p>A type scale provides a pre-defined set of type sizes. By design this limits your choices and forces rigour and consistency into your typesetting. Any single modular scale, such as the classic typographic sequence, is calculated using a base size, ratio, and interval and provides harmonious proportions with a meaningful foundation.</p>

<form class="tool__form">
<label>Base <input type="text" name="scale_base" size="2" value="<?php echo $scale_base; ?>" /></label>
<label>Ratio <input type="text" name="scale_ratio" size="8" value="<?php echo $scale_ratio; ?>" /></label>
<label>Interval <input type="text" name="scale_interval" size="2" value="<?php echo $scale_interval; ?>" /></label>
<input type="submit" value="Go" />
</form>

</div>


<div class="scale">
<figure class="fig-table">
<table class="ex--scale">
<tr class="ex--scale-size">
<?php
$interval = 0;
foreach ($scaleAr as $scale_n => $scale_f) {
	$intervalCSS = "";
	if (isset($scaleIntervals[$interval]) && ($scaleIntervals[$interval] == $scale_f)) {
		$intervalCSS = " class='ex--scale-interval'";
		$interval++;
	}
    echo "<td style='font-size:" . $scale_f . "px'". $intervalCSS . ">Ag</td>";
}
?>
</tr>
<tr class="ex--scale-key">
<?php
foreach ($scaleAr as $scale_n => $scale_f) {
    echo "<td>" . $scale_f . "</td>";
}
?>
</tr>
</table>
</figure>
</div>

<div class="sampler">
<style>
.sampler__h1 {
	font-size: <?php if (isset($scaleIntervals[3])) { echo $scaleIntervals[3]; } else { $finalSize = count($scaleAr)-3; echo$scaleAr[$finalSize]; } ?>px;
}
.sampler__h2 {
	font-size: <?php echo $scaleIntervals[2] ?>px;
}
.sampler__h3 {
	font-size: <?php echo $scaleIntervals[1] ?>px;
}
.sampler__h4, .sampler__p {
	font-size: <?php echo $scaleIntervals[0] ?>px;
}
.sampler__small {
	font-size: <?php echo $scaleAr[-1] ?>px;
}
</style>

<h1 class="sampler__h1">Lorem ipsum dolor <nobr>sit amet</nobr></h1>

<div class="sampler__body">
<p class="sampler__p">Vivamus eleifend purus varius rhoncus varius. Integer et ex facilisis, eleifend nunc eget, facilisis eros. Morbi sit amet sapien id nunc fringilla blandit. Sed rhoncus euismod arcu a rutrum. Duis euismod luctus erat, vel bibendum quam ultricies a. Fusce blandit tortor justo, vel fringilla diam tristique eget. In eleifend volutpat lorem, tempor pellentesque neque laoreet ac. </p>

<h2 class="sampler__h2">Lorem ipsum dolor <nobr>sit amet</nobr></h2>

<p class="sampler__p"> Pellentesque at egestas elit, non pretium eros. Mauris blandit sapien et eros accumsan, a ultrices justo feugiat. Cras pretium hendrerit arcu quis pellentesque. Phasellus sit amet maximus massa. Duis euismod luctus erat, vel bibendum quam ultricies a. Fusce blandit tortor justo, vel fringilla diam tristique eget. In eleifend volutpat lorem, tempor pellentesque neque laoreet ac. </p>

<h3 class="sampler__h3">Lorem ipsum dolor <nobr>sit amet</nobr></h3>

<p class="sampler__p">Phasellus aliquet, leo sed varius lacinia, massa justo commodo urna, vitae aliquam est felis varius est. Maecenas eget molestie augue, nec tincidunt enim. Vivamus elit nunc, suscipit in ultricies sed, blandit sed enim.</p>

<h4 class="sampler__h4">Lorem ipsum dolor <nobr>sit amet</nobr></h4>

<p class="sampler__p"> Duis ultricies purus nec magna sodales tempus. Pellentesque pretium eros orci, non semper arcu molestie nec. Nunc feugiat tellus ac orci eleifend, at dictum arcu feugiat. Proin porta felis sit amet lacus placerat iaculis.</p>

<small class="sampler__small">Duis euismod luctus erat, vel bibendum quam ultricies a. Fusce blandit tortor justo, vel fringilla diam tristique eget. In eleifend volutpat lorem, tempor pellentesque neque laoreet ac. Donec feugiat egestas lorem. In nec porta erat. Vestibulum in efficitur nisi.</small>

</div>
</div>

<div class="cssexport">
</div>

<script src="jquery-1.11.1.min.js"></script>
<script type="text/javascript">
</script>
</body>
</html>
