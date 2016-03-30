<?php include("config.php");
include("functions.php");//only want to see it
?>
<html>
<head>
<title>Bappi Concert Ticket Booking</title>
<link rel="stylesheet" href="style.css" />
<script src="jquery-1.10.2.min.js"></script>
<!--[if IE 7]>
<script src="notyjs/html5.js" type="text/javascript"></script>
<![endif]-->
<script src="jquery_timer.js"></script>
<script type="text/javascript" src="notyjs/noty/packaged/jquery.noty.packaged.min.js"></script>
<script type="text/javascript" src="notyjs/mask.js"></script>
<?php include('ajaxcall.php');?>
</head>

<body>
<div id="main_container">
<div class="header" >
<div style="float:left;margin-top: -5px;">
<table>
<tr>
<td><section style="font-size:20px">Please Select the No. of Tickets First</section></td>
<td><section class="c_form">
<select id="selectmax" style="border: 2px solid #0E4B99;">
	<option value="0" selected>--No Select--</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
</select>
</section></td>
</tr>
</table>


</div>
<div style="float:right;text-align:right;font-size: 20px;">
<table style="font-weight: bold;">
	<tr>
		<td>100</td>
		<td><img src="img/chairicon_cir_26_1.png"></td>
		<td>75</td>
		<td><img src="img/chairicon_cir_26_2.png"></td>
		<td>50</td>
		<td><img src="img/chairicon_cir_26_3.png"></td>
		<td>30</td>
		<td><img src="img/chairicon_cir_26.png"></td>
	</tr>
</table>
</div>

</div>
<div style="clear:both;"></div>
<div class="flyerimage" style="margin: 0 auto;width: 40%;">
<img src="img/bappi_poster_new.jpg" style="width: 100%;">
<div align='center' style='margin-top: 6px;'>
<!-- ewebsitecounter.com Code START -->
<a href="http://www.ewebsitecounter.com/featurescounter.php" target="_blank">
<img src="http://ewebsitecounter.com/counter/counter.php?page=34379&style=0033&nbdigits=5&type=ip&initCount=100" alt="Track Websites" border="0" >
</a>

</div>
</div>


<div id="wrapper">
<div id="main">
<img src="img/stw01.png" style="margin-left: 750px;"/>
<div id="only_for_scroll" style="width:1855px;">


<!-- -----------------------------------Left Div Start ------------------------- --------------->


<div id="leftarea">

<div class="heading">Left</div>

<table class="leftseatstable" id="seats" border="0" cellspacing="2" cellpadding="0" width="455">
 <tbody style="width: 450px;">

<!-- -----------------------------------A LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">A</font></td>
<?php for($i=1;$i<8;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="A-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>

</tr>
<!-- -----------------------------------B LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">B</font></td>
<?php for($i=1;$i<=11;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="B-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------C LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">C</font></td>
<?php for($i=1;$i<=11;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="C-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------D LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">D</font></td>
<?php for($i=1;$i<=12;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="D-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------E LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">E</font></td>
<?php for($i=1;$i<=13;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="E-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------F LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">F</font></td>
<?php for($i=1;$i<=13;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="F-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------G LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">G</font></td>
<?php for($i=1;$i<=14;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="G-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------H LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">H</font></td>
<?php for($i=1;$i<=14;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="H-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------I LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">I</font></td>
<?php for($i=1;$i<=11;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="I-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------J LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">J</font></td>
<?php for($i=1;$i<=11;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="J-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------K LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">K</font></td>
<?php for($i=1;$i<=12;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="K-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------L LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">L</font></td>
<?php for($i=1;$i<=12;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="L-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------M LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">M</font></td>
<?php for($i=1;$i<=12;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="M-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------N LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">N</font></td>
<?php for($i=1;$i<=11;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="N-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------O LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">O</font></td>
<?php for($i=1;$i<=11;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="O-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------P LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">P</font></td>
<?php for($i=1;$i<=10;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="P-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------Q LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">Q</font></td>
<?php for($i=1;$i<=8;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="Q-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------R LEFT ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">R</font></td>
<?php for($i=1;$i<=7;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="R-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!--tr>
<?php for($i=1;$i<25;$i++){
$num_padded = sprintf("%02s", $i);?>
<td  valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>


</tr-->
</tbody>

</table>
</div>

<!-- -----------------------------------Center Left Div Start ------------------------- --------------->

<div id="center_left_area">
<div class="heading">Center Left</div>
<table class="center_left_area_table" id="seats" border="0" cellspacing="2" cellpadding="0" width="350">
 <tbody style="width:280px;">

<!-- -----------------------------------A Center LEFT ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">A</font></td>
<?php for($i=10;$i<=13;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="A-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------B Center LEFT ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">B</font></td>
<?php for($i=12;$i<=17;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="B-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------C Center LEFT ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">C</font></td>
<?php for($i=12;$i<=17;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="C-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------D Center LEFT ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">D</font></td>
<?php for($i=13;$i<=19;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="D-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------E Center LEFT ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">E</font></td>
<?php for($i=14;$i<=20;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="E-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------F Center LEFT ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">F</font></td>
<?php for($i=14;$i<=20;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="F-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------G Center LEFT ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">G</font></td>
<?php for($i=15;$i<=21;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="G-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------H Center LEFT ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">H</font></td>
<?php for($i=15;$i<=22;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="H-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------I Center LEFT ------------------------- --------------->
<tr align="center" height="26px">

</tr>

<!-- -----------------------------------J Center LEFT ------------------------- --------------->
<tr align="center" height="26px">

</tr>


<!-- -----------------------------------K Center LEFT ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">K</font></td>
<?php for($i=13;$i<=21;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="K-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------L Center LEFT ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">L</font></td>
<?php for($i=13;$i<=21;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="L-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------M Center LEFT ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">M</font></td>
<?php for($i=13;$i<=21;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="M-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------N Center LEFT ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">N</font></td>
<?php for($i=12;$i<=21;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="N-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------O Center LEFT ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">O</font></td>
<?php for($i=12;$i<=21;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="O-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>
<!-- -----------------------------------P Center LEFT ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">P</font></td>
<?php for($i=11;$i<=20;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="P-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------Q Center LEFT ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">Q</font></td>
<?php for($i=10;$i<=18;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="Q-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------R Center LEFT ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">R</font></td>
<?php for($i=10;$i<=18;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="R-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

</tbody>
</table>
</div>

<!-- -----------------------------------Center Div Start ------------------------- --------------->

<div id="center_area">
<div class="heading">Center</div>
<table class="center_area_table" id="seats" border="0" cellspacing="2" cellpadding="0" width="375">
 <tbody style="width: 325px;">



<!-- -----------------------------------A Center ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">A</font></td>
<?php for($i=15;$i<=18;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="A-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------B Center ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">B</font></td>
<?php for($i=18;$i<=25;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="B-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------C Center ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">C</font></td>
<?php for($i=18;$i<=25;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="C-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------D Center ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">D</font></td>
<?php for($i=20;$i<=27;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="D-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------E Center ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">E</font></td>
<?php for($i=21;$i<=28;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="E-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------F Center ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">F</font></td>
<?php for($i=21;$i<=29;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="F-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------G Center ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">G</font></td>
<?php for($i=22;$i<=30;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="G-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------H Center ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">H</font></td>
<?php for($i=23;$i<=31;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="H-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------I Center ------------------------- --------------->
<tr align="center" height="26px">

</tr>

<!-- -----------------------------------J Center ------------------------- --------------->
<tr align="center" height="26px">

</tr>

<!-- -----------------------------------K Center ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">K</font></td>
<?php for($i=22;$i<=30;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="K-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------L Center ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">L</font></td>
<?php for($i=22;$i<=31;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="L-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------M Center ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">M</font></td>
<?php for($i=22;$i<=31;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="M-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------N Center ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">N</font></td>
<?php for($i=22;$i<=31;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="N-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------O Center ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">O</font></td>
<?php for($i=22;$i<=31;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="O-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------P Center ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">P</font></td>
<?php for($i=21;$i<=30;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="P-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------Q Center ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">Q</font></td>
<?php for($i=20;$i<=27;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="Q-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------R Center ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">R</font></td>
<?php for($i=20;$i<=26;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="R-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


</tbody>
</table>

</div>

<!-- -----------------------------------Center Right Div Start ------------------------- --------------->

<div id="center_right_area">
<div class="heading">Center Right</div>
<table class="center_right_area_table" id="seats" border="0" cellspacing="2" cellpadding="0" width="300">
 <tbody style="width: 300px;">

<!-- -----------------------------------A Center Right ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">A</font></td>
<?php for($i=20;$i<=23;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="A-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------B Center Right ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">B</font></td>
<?php for($i=26;$i<=31;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="B-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------C Center Right ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">C</font></td>
<?php for($i=26;$i<=31;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="C-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------D Center Right ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">D</font></td>
<?php for($i=28;$i<=34;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="D-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------E Center Right ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">E</font></td>
<?php for($i=29;$i<=35;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="E-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------F Center Right ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">F</font></td>
<?php for($i=30;$i<=36;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="F-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------G Center Right ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">G</font></td>
<?php for($i=31;$i<=37;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="G-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------H Center Right ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">H</font></td>
<?php for($i=32;$i<=39;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="H-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<tr align="center" height="26px">

</tr>

<!-- -----------------------------------J Center Right ------------------------- --------------->
<tr align="center" height="26px">

</tr>

<!-- -----------------------------------K Center Right ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">K</font></td>
<?php for($i=31;$i<=39;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="K-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------L Center Right ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">L</font></td>
<?php for($i=32;$i<=40;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="L-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------M Center Right ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">M</font></td>
<?php for($i=32;$i<=40;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="M-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------N Center Right ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">N</font></td>
<?php for($i=32;$i<=41;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="N-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------O Center Right ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">O</font></td>
<?php for($i=32;$i<=41;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="O-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>
<!-- -----------------------------------P Center Right ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">P</font></td>
<?php for($i=31;$i<=40;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="P-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------Q Center Right ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">Q</font></td>
<?php for($i=28;$i<=36;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="Q-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------R Center Right ------------------------- --------------->
<tr align="center">
<td width="10" class="lineno"><font size="+1">R</font></td>
<?php for($i=29;$i<=36;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="R-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

</tbody>
</table>
</div>


<!-- -----------------------------------Right Div Start ------------------------- --------------->

<div id="right_area">
<div class="heading">Right</div>
<table class="right_area_table" id="seats" border="0" cellspacing="2" cellpadding="0" width="365">
 <tbody style="width: 510px;">

<!-- -----------------------------------A Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">A</font></td>
<?php for($i=26;$i<=32;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="A-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------B Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">B</font></td>
<?php for($i=32;$i<=42;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="B-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------C Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">C</font></td>
<?php for($i=32;$i<=43;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="C-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------D Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">D</font></td>
<?php for($i=35;$i<=46;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="D-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------E Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">E</font></td>
<?php for($i=36;$i<=48;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="E-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------F Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">F</font></td>
<?php for($i=37;$i<=49;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="F-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------G Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">G</font></td>
<?php for($i=38;$i<=51;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="G-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------H Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">H</font></td>
<?php for($i=40;$i<=54;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="H-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------I Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">I</font></td>
<?php for($i=41;$i<=53;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="I-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------J Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">J</font></td>
<?php for($i=41;$i<=54;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="J-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------K Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">K</font></td>
<?php for($i=40;$i<=55;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="K-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------L Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">L</font></td>
<?php for($i=41;$i<=57;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="L-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------M Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">M</font></td>
<?php for($i=41;$i<=57;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="M-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------N Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">N</font></td>
<?php for($i=42;$i<=57;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="N-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------O Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">O</font></td>
<?php for($i=42;$i<=57;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="O-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------P Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">P</font></td>
<?php for($i=41;$i<=55;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="P-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------Q Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">Q</font></td>
<?php for($i=37;$i<=49;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="Q-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------R Right ------------------------- --------------->
<tr>
<td width="10" class="lineno"><font size="+1">R</font></td>
<?php for($i=37;$i<=48;$i++){
$num_padded = sprintf("%02s", $i);?>
<td id="R-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>





</tbody>
</table>
</div>




</div>




<?php
//$num = 4;
//$num_padded = sprintf("%02s", $num);
//echo $num_padded; // returns 04
?>

</div>
<div>
<div class="ticket_and_rate" style="float:left;">
<section>You have Selected<font style="font-weight: bold;font-size: 20px;margin-left: 10px;"><span id="selected"></span></font><br/><span id="">Total amount =<font style="font-weight: bold;font-size: 20px;">$&nbsp;</font><font id="sum" style="font-weight: bold;font-size: 20px;"></font></span></section>
<br/>
<div style="clear:both;"></div>
<div class="proceedbutton">
<button class="button_example" id="ticketproceed" disabled style="padding: 8px 15px;font-size: 20px;" title="Please Select No. Of Seats.Then Proceed">Proceed</button>
</div>
</div>
<div class="imgdesc" style="float:right;">
	<table>
    	<tr><!--td><img src="img/chairicon_cir_26.png"></td><td>Available</td-->
        <td><img src="img/chairicon_cir_26_green.png"></td><td>Selected</td>
        <td><img src="img/chairicon_cir_26_red.png"></td><td>Booked</td></tr>
    </table>

</div>
</div>
</div>
</div>
<!--div id="counter"></div-->
</div>
</body>
</html>