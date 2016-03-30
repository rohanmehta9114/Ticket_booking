<?php include("config.php"); 
include("functions.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jonita Concert Ticket Booking</title>
<link rel="stylesheet" href="style.css" />
<script src="jquery-1.10.2.min.js"></script>
<!--[if IE 7]>
<script src="notyjs/html5.js" type="text/javascript"></script>
<![endif]-->
<style type="text/css">
.seat_select_row div
{
	float:left;
	
}
.seat_select_row select
{
	width:100px !important;
}
</style>
<script src="jquery_timer.js"></script>
<script type="text/javascript" src="notyjs/noty/packaged/jquery.noty.packaged.min.js"></script>
<script type="text/javascript" src="notyjs/mask.js"></script>
<script>

/*--------------------- ---- Error Noty Alert------------------------------ */
    function errornoty(layout,text) {
        var n = noty({
            text        :text ,
            type        : 'error',
            dismissQueue: true,
            layout      : layout,
            theme       : 'defaultTheme',
			
			timeout:5000
        });
		$("#noty_top_layout_container li").css("background-color","rgb(187, 44, 44)");
		//$("#noty_top_layout_container li").css("transition","linear");
		//rgb(12, 119, 12) /*success
       // console.log('html: ' + n.options.id);
    }
	/*--------------------- ---- Success Noty Alert------------------------------ */
	 function successnoty(layout,text) {
        var n = noty({
            text        :text ,
            type        : 'success',
            dismissQueue: true,
            layout      : layout,
            theme       : 'defaultTheme',
			timeout:5000
        });
		$("#noty_top_layout_container li").css("background-color","rgb(12, 119, 12)");
		//rgb(12, 119, 12) /*success
        //console.log('html: ' + n.options.id);
    }
	
	/*--------------------- ---- Information Noty Alert------------------------------ */
	
	
	function infonoty(layout,text) {
        var n = noty({
            text        :text ,
            type        : 'information',
            dismissQueue: true,
            layout      : layout,
            theme       : 'defaultTheme',
			timeout:5000
        });
		//$("#noty_top_layout_container li").css("background-color","rgb(12, 119, 12)");
		$("#noty_top_layout_container li").css("background-color","#2784ea");
		
       // console.log('html: ' + n.options.id);
    }
$(document).ready(function(e) {
    	var bookedTickets = [];
		$.ajax({
            url : 'getaction.php',
            method : 'POST',
			async: false, 
            data : {action:"get_booked_mem_ticket"},
            success: function(result){
                bookedTickets=result;
            }
        });
		
		
//console.log(bookedTickets);
var bookedticketno=$.parseJSON(bookedTickets);
//bookedticketno=bookedTickets.split(" ");
var seats=[];
$(bookedticketno).each(function(i,val){
    $.each(val,function(k,seats){
        //console.log(seats); 
		for(var i=0;i<seats.length;i++)
		{
		$("#"+seats[i]).attr("background","img/chairicon_cir_26_red.png");   
		$("#"+seats[i]).removeAttr("class");
		$("#"+seats[i]).css("cursor","context-menu");
		}
});


});
$("#selectmax").change(function(e) {
	var val=$(this).val();
	var price=0;
	for ( var i = 0; i < val; i++ ) {
	price=Number(price);
	price=price+15;
	}
	fprice="$"+price;
	$("#fprice").html(fprice);
	
});

$("#req_mem_ticket_form").on('submit', function (event) {
	event.preventDefault();	
	 var val=$(this).serialize();
	 infonoty('top','Thank You For Your Request.Check The Mail');
	 $(".c_form").html("Thanks For Your Request");
	 $.ajax({
            url : 'getaction.php',
            type : 'POST',
			data : {action:"get_mem_record",val:val},
            success: function(result){
				
            }
        });
	 
});
});


$(document).on('mousewheel', '#main', function (e) {
         var delta = e.originalEvent.wheelDelta;
        this.scrollLeft += (delta < 0 ? 1 : -1) * 50;
        e.preventDefault();
			
	
		
	
});

  $(document).on("keypress",".tbxText",function (e) {
          /* if ((e.which < 97 || e.which > 122 )) {
        	 e.preventDefault();
	 }
	 if((e.which > 65 || e.which < 90))
	 {
		 //e.preventDefault();
		}
		
		
	*/if ((e.which < 97 || e.which > 122 ) ||(e.which > 65 || e.which < 90)) {
		//e.preventDefault()
	}
	else
	{
		// e.preventDefault();
	}
        });
		
		/*
  $(document).on("focus",".quantity",function (e) {
     $(this).mask("(999) 999-9999");
	 //if the letter is not digit then display error and don't type anything
	 
    // if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
      //         return false;
	 
   });
   */
</script>


<script type="text/javascript">

function insert_member_names_row(obj)
{
	var members = $(obj).val();
	var str='';
	for(i=0;i<members;i++)
	{
		str = str + '<input type="text" id="member'+(i+1)+'" placeholder="Enter Name for Member'+(i+1)+'" onblur="append_members_name('+members+');" required /><br/>';
	}
	//document.getElementById('members_name_div').innerHTML(str);
	$('#members_name_div').html(str);
}

function append_members_name(total_members)
{
	var str='';
	for(i=0;i<total_members;i++)
	{
		var mem_name = $('#member'+(i+1)).val();
		if(mem_name!="")
		{
		 str = str + (i+1) + ". " + mem_name + "  ";
		}
	}
	$('#member_names').val(str);
}

</script>



</head>

<body>
<div id="main_container">
<div class="header" >

<div style="float:right;text-align:right;font-size: 20px;margin-top: 6px;">
All tickets for members.<b>$15</b> Each

</div>

</div>
<div style="clear:both;"></div>
<div class="flyerimage" style="margin: 0 auto;width: 40%;">

</div>
<div id="wrapper" style="display:block;">
<div id="main">

<div id="only_for_scroll" style="width:1710px;">


<!-- -----------------------------------Left Div Start ------------------------- --------------->  


<div id="leftarea">

<div class="heading">Left</div>

<table class="leftseatstable" id="seats" border="0" cellspacing="2" cellpadding="0" width="455">
 <tbody style="width: 450px;">

<!-- -----------------------------------Q LEFT ------------------------- --------------->   
<tr>
<td width="10" class="lineno"><font size="+1">Q</font></td>
<?php for($i=50;$i>=37;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="Q-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------R LEFT ------------------------- --------------->   
<tr>
<td width="10" class="lineno"><font size="+1">R</font></td>
<?php for($i=51;$i>=38;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="R-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------S LEFT ------------------------- --------------->   
<tr>
<td width="10" class="lineno"><font size="+1">S</font></td>
<?php for($i=51;$i>=38;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="S-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------T LEFT ------------------------- --------------->   
<tr>
<td width="10" class="lineno"><font size="+1">T</font></td>
<?php for($i=50;$i>=38;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="T-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>


<!-- -----------------------------------U LEFT ------------------------- --------------->   
<tr>
<td width="10" class="lineno"><font size="+1">U</font></td>
<?php for($i=50;$i>=39;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="U-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
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


<!-- -----------------------------------Q Center LEFT ------------------------- --------------->   
<tr align="center">
<td width="10" class="lineno"><font size="+1">Q</font></td>
<?php for($i=36;$i>=28;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="Q-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------R Center LEFT ------------------------- --------------->   
<tr align="center">
<td width="10" class="lineno"><font size="+1">R</font></td>
<?php for($i=37;$i>=28;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="R-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------S Center LEFT ------------------------- --------------->   
<tr align="center">
<td width="10" class="lineno"><font size="+1">S</font></td>
<?php for($i=37;$i>=28;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="S-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------T Center LEFT ------------------------- --------------->   
<tr align="center">
<td width="10" class="lineno"><font size="+1">T</font></td>
<?php for($i=37;$i>=28;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="T-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------U Center LEFT ------------------------- --------------->   
<tr align="center">
<td width="10" class="lineno"><font size="+1">U</font></td>
<?php for($i=37;$i>=28;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="U-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
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
 <tbody style="width: 350px;">




<!-- -----------------------------------Q Center ------------------------- --------------->    
<tr align="center">
<td width="10" class="lineno"><font size="+1">Q</font></td>
<?php for($i=27;$i>=17;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="Q-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------R Center ------------------------- --------------->    
<tr align="center">
<td width="10" class="lineno"><font size="+1">R</font></td>
<?php for($i=27;$i>=17;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="R-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------S Center ------------------------- --------------->    
<tr align="center">
<td width="10" class="lineno"><font size="+1">S</font></td>
<?php for($i=27;$i>=17;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="S-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------T Center ------------------------- --------------->    
<tr align="center">
<td width="10" class="lineno"><font size="+1">T</font></td>
<?php for($i=27;$i>=16;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="T-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------U Center ------------------------- --------------->    
<tr align="center">
<td width="10" class="lineno"><font size="+1">U</font></td>
<?php for($i=27;$i>=18;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="U-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
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


<!-- -----------------------------------Q Center Right ------------------------- --------------->    
<tr align="center">
<td width="10" class="lineno"><font size="+1">Q</font></td>
<?php for($i=16;$i>=8;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="Q-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------R Center Right ------------------------- --------------->    
<tr align="center">
<td width="10" class="lineno"><font size="+1">R</font></td>
<?php for($i=16;$i>=7;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="R-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------S Center Right ------------------------- --------------->    
<tr align="center">
<td width="10" class="lineno"><font size="+1">S</font></td>
<?php for($i=16;$i>=7;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="S-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------T Center Right ------------------------- --------------->    
<tr align="center">
<td width="10" class="lineno"><font size="+1">T</font></td>
<?php for($i=15;$i>=6;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="T-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------U Center Right ------------------------- --------------->    
<tr align="center">
<td width="10" class="lineno"><font size="+1">U</font></td>
<?php for($i=16;$i>=8;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="U-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
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
<table class="right_area_table" id="seats" border="0" cellspacing="2" cellpadding="0" width="315">
 <tbody style="width: 300px;">


<!-- -----------------------------------Q Right ------------------------- --------------->    
<tr>
<td width="10" class="lineno"><font size="+1">Q</font></td>
<?php for($i=7;$i>=1;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="Q-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------R Right ------------------------- --------------->    
<tr>
<td width="10" class="lineno"><font size="+1">R</font></td>
<?php for($i=6;$i>=1;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="R-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------S Right ------------------------- --------------->    
<tr>
<td width="10" class="lineno"><font size="+1">S</font></td>
<?php for($i=6;$i>=1;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="S-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------T Right ------------------------- --------------->    
<tr>
<td width="10" class="lineno"><font size="+1">T</font></td>
<?php for($i=5;$i>=1;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="T-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

<!-- -----------------------------------U Right ------------------------- --------------->    
<tr>
<td width="10" class="lineno"><font size="+1">U</font></td>
<?php for($i=4;$i>=1;$i--){ 
$num_padded = sprintf("%02s", $i);?>
<td id="U-<?php echo $i; ?>" class="available" valign="middle" background="img/chairicon_cir_26.png" style="">
<font size="+1"><?php echo $num_padded; ?></font>
</td>
<?php } ?>
</tr>

</tbody>
</table>
</div>




</div>




<?php
// $num = 4;
// $num_padded = sprintf("%02s", $num);
// echo $num_padded;
// returns 04
?>

</div>
<div>
<div style="float:left;text-align:right;font-size: 20px;margin-top: 6px;">
2014 Members are requested to fill our following information to get $ 15/- tickets
</div>


</div>
<div class="imgdesc" style="float:right;">
	<table>
    	<tr><td><img src="img/chairicon_cir_26.png"></td><td>Available</td>
        <td><img src="img/chairicon_cir_26_green.png"></td><td>Selected</td>
        <td><img src="img/chairicon_cir_26_red.png"></td><td>Booked</td></tr>
    </table>

</div>
</div>
</div>
</div>
<!--div id="counter"></div-->
<div style="clear:both;"></div>
<section class="c_form">
    
    	    
        <form id="req_mem_ticket_form" method="post" action="#">
        
            <label>Name</label>
            <input class="tbxText" name="name" placeholder="Enter Name Here" required>
            
            <label>Email</label>
            <input name="email" type="email" placeholder="Enter Email Here" required>
            
                      
             <label>Address</label>
            <input class="tbxText" name="address" type="text"  placeholder="Enter Address Here" required>
            
             <label>Contact No</label>
            <input class="quantity" name="cno" type="text" maxlength="20" placeholder="Enter Contact no. Here" required>
            <br/><br/>
            <b style="font-family:'Calibri';"> We are members of 2014 and want to book 
             <select required id="selectmax" name="no_ticket" style="border: 2px solid #0E4B99;width:137px;padding:2px;8px;" onchange="insert_member_names_row(this);">
	<option value="" selected>--No Select--</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
   </select>
Name of the members are as following :</b>
            <input type="hidden" name="member_names" id="member_names" value="" />
			<!--
			<div style="display:none;">
            <textarea class="tbxText" name="member_names" rows="3" placeholder="Enter Member's Name Here" style="font-size: 17px;
font-family: Calibri;"></textarea>
			</div>
			-->
			<div id="members_name_div">
			
			</div>


<br/> <b style="font-family:'Calibri';">We agree to pay total
 <font id="fprice" style="font-size: 25px;">__</font> upon receipt of your confirmation.</b>
                                   <div style="clear:both;"></div>
            <label>Message</label>
            <textarea class="tbxText" name="message" rows="3" placeholder="Enter Message Here" style="font-size: 17px;
font-family: Calibri;"></textarea>
          *<b style="font-family:'Calibri';">After verification of your membership data we will send you confirmation within 24 hours.</b><br/>
         <button id="req_mem_ticket" class="button_example" style="margin-top: 10px;float: right;margin-right: 20px;" name="submit" type="submit" value="Submit">Request For Ticket</button>
         <div style="clear:both;"></div>
         
        </form>
   
    
    </section>
</div>
</body>
</html>