<?php include('functions.php');
$ticketlist=array();
$date = new DateTime();
	$timestamp=$date->format('U');
	$rand=rand();
	$abc=$timestamp."".$rand;
	$_SESSION["item_no"]=md5($abc);
$ticketrate=array();


//print_r($ticketrate[0]);
?>
<div class="count_container">You have<span id="countdown"></span> seconds to proceed</div>
<div class="ticketlist" style="padding-left:4%;margin-top:20px;">
<h3>You Have Selected</h3>
<?php
echo "<div class='seat_list' style='width:900px;'>";
$ticketlist=$_SESSION['tickets_step1'];
foreach($ticketlist as $key=>$value)
	{
    // and print out the values
    echo "<span>".$value."</span>";
    }
	echo "</div>";
	$price=0;

	for($i=0;$i<sizeof($ticketlist);$i++)
	{
		//$ticketno=$ticketlist[$i];
		$q="SELECT price FROM ticket_rate WHERE name='".$ticketlist[$i]."'";
		//echo $q;
		$r=mysql_query($q);
		if(mysql_num_rows($r)>0)
		{
		while($row=mysql_fetch_array($r))
		{
			$price=$price+$row["price"];
			//array_push($ticketrate,$p);
		}
		}
	}
	echo "<br/><div style='clear:both;'></div><h1>Ticket Price:&nbsp;&nbsp;<font class='totalrate'>$ &nbsp;".$price."</font></h1>";
	$_SESSION['price']=$price;
?>
  </div>

<section class="c_form">


        <form id="buyticketform" method="post" action="#">

            <label>Name</label>
            <input class="tbxText" name="name" type="text" placeholder="Type Here" required>

            <label>Email</label>
            <input name="email" type="email" placeholder="Type Here" required>

            <label>Contact No</label>
            <input  name="cno1" type="text" maxlength="10" placeholder="Type Here" required>

             <label>Alternate No</label>
            <input  name="cno2" type="text" maxlength="10" placeholder="Type Here" >

         <input id="buyticket" class="button_example" style="margin-top: 10px;float: right;margin-right: 20px;" name="submit" type="submit" value="Buy Ticket">

        </form>


    </section>
    <div style="clear:both;"></div>
  <img src="img/secure-paypal.jpg" width="220" height="100" style="
    padding-left: 16%;
">
