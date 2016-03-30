<?php session_start();
include('config.php');
$data=array();

function getticketinfo($con_e1,$data)
{
$q="SELECT * FROM ticket_detail";
$r=mysql_query($q);
if(mysql_num_rows($r)>0)
{
	while($row=mysql_fetch_array($r))
	{

		$seat= $row['seat_no'];
		array_push($data,$seat);

	}
}
$dataarray=array("booked"=>$data);
        echo json_encode($dataarray);
//print_r($data);
mysql_close($con_e1);
}
//getticketinfo($con_e1,$data);

function getactivetickets($con_e1)
{
$activeticket=array();
$q="SELECT * FROM ticket_currently_active";
$r=mysql_query($q);
if(mysql_num_rows($r)>0)
{
	while($row=mysql_fetch_array($r))
	{
		$seat= $row['seatno'];
		array_push($activeticket,$seat);
	}
}
$activeticketarray=array("active"=>$activeticket);
        echo json_encode($activeticketarray);
mysql_close($con_e1);
}

function set_ticket_color_from_rate()
{

	$ticket_list=array();
	$ticket_100=array();
	$ticket_75=array();
	$ticket_50=array();
	$ticket_30=array();
	$q="SELECT * FROM ticket_rate";
	$r=mysql_query($q);
	if(mysql_num_rows($r)>0)
	{
		while($row=mysql_fetch_array($r))
		{
			$seat=$row['name'];
			$price=$row['price'];

			switch($price)
			{
				case 100:
				array_push($ticket_100,$seat);
				break;
				case 75:
				array_push($ticket_75,$seat);
				break;
				case 50:
				array_push($ticket_50,$seat);
				break;
				case 30:
				array_push($ticket_30,$seat);
				break;
			}

		}

	}
	$ticket_list=array("100"=>$ticket_100,"75"=>$ticket_75,"50"=>$ticket_50,"30"=>$ticket_30);
	echo json_encode($ticket_list);
	//mysql_close($con_e1);
}
/*--------------------- ---- Get Ticket Rates ------------------------------ */
function getrates()
{
	$pricearray=array();
$q="SELECT * FROM ticket_rate";
$r=mysql_query($q);
if(mysql_num_rows($r)>0)
{
	while($row=mysql_fetch_array($r))
	{
	$t_price=$row["price"];
	array_push($pricearray,$t_price);
	}

}
//print_r($pricearray);
$pricejson=array("ticket_price"=>$pricearray);
        echo json_encode($pricejson);
//print_r($pricearray);
}

//getrates();

function get_ticket_rate_from_db($ticket)
{
$q="SELECT price FROM ticket_rate WHERE name ='".$ticket."'";
$r=mysql_query($q);
if(mysql_num_rows($r)>0)
{
	while($row=mysql_fetch_array($r))
	{
	$t_price=$row["price"];
	echo $t_price;
	}
}
}
function check_if_booked($con_e1)
{
	$stat="ok";
	$status="active";
	$booked_ticket=array();
	$seats=array();
	$seats=$_POST["seatno"];
	//getticketinfo($con_e1,$data);
	//echo $data;
	//$seats=$_POST["seatno"];
	//print_r($seats);
	$q1="SELECT * FROM ticket_detail";
	$r1=mysql_query($q1);
	if(mysql_num_rows($r1)>0)
	{
		while($row=mysql_fetch_array($r1))
		{
			$seat= $row['seat_no'];
			array_push($booked_ticket,$seat);

		}
	}
	//print_r($booked_ticket);
	$active_ticket=array();

	$q2="SELECT * FROM ticket_currently_active";
	$r2=mysql_query($q2);
	if(mysql_num_rows($r2)>0)
	{
		while($row=mysql_fetch_array($r2))
		{
			$seat= $row['seatno'];
			array_push($active_ticket,$seat);

		}
	}


	//print_r($active_ticket);

	$date = new DateTime();
	$timestamp=$date->format('U');

	for($i=0;$i<sizeof($seats);$i++)
	{
		//echo $seats[$i];
		if(in_array($seats[$i],$booked_ticket) || in_array($seats[$i],$active_ticket))
		{
			$stat="error";
		}
	}
	$final_status_step1_array=array();
	if($stat=='error')
	{
		echo "error";
	}
	else
	{

		for($i=0;$i<sizeof($seats);$i++)
		{
			$seat_n=$seats[$i];
			$query="INSERT INTO ticket_currently_active VALUES(NULL,'$seat_n','$status','$timestamp')";
			$r=mysql_query($query);
			if($r)
			{
				array_push($final_status_step1_array,$seat_n);
			}
		}
		echo "success";
	}
	$_SESSION['tickets_step1']=$final_status_step1_array;
	//echo $stat."<br>";
	/* for($i=0;$i<sizeof($seats);$i++)
	{
		if(in_array($seats[i],$data))
		{
			$stat="error";
		}
	}
	echo $stat;*/


mysql_close($con_e1);
}

//check_if_booked($con_e1);


function insert_active_ticket($con_e1)
{
	//$seats_insidetable=array();
	$status="active";
	$seats=array();
	$seats=$_POST["seatno"];

	$date = new DateTime();
	$timestamp=$date->format('U');

	//$seats_insidetable=getallactiveticketinarray();
	//echo $seats_insidetable;
	for($i=0;$i<sizeof($seats);$i++)
	{
		/*if(in_array($seats[i],$seats_insidetable))
		{
			echo "Error";
		}
		else
		{*/
		$seat_n=$seats[$i];
		$query="INSERT INTO ticket_currently_active VALUES(NULL,'$seat_n','$status','$timestamp')";
		$r=mysql_query($query);

		echo $seat_n;

	}
//echo "In PHP function".$_POST["seatno"];

mysql_close($con_e1);
}
function del_expired_inserted_active_seats($con_e1)
{
	$date = new DateTime();
	$timestamp=$date->format('U');
	$timestamp=(int)$timestamp;
	$timelimit=$timestamp-180;
	echo $timestamp."<br/>",$timelimit."<br/>";
	$q="SELECT * FROM ticket_currently_active WHERE status='active'";
	$r=mysql_query($q);
	if(mysql_num_rows($r)>0)
	{
		while($row=mysql_fetch_array($r))
			{
				$table_timestamp=$row["timestamp"];
				if($table_timestamp<$timelimit)
				{
					$q1="DELETE FROM ticket_currently_active WHERE status='active' and timestamp='$table_timestamp'";
					mysql_query($q1);

				}
				//echo $table_timestamp."<br/>";
			}
	}
	mysql_close($con_e1);
}

function del_expired_inserted_payment_seats($con_e1)
{
	$date = new DateTime();
	$timestamp=$date->format('U');
	$timestamp=(int)$timestamp;
	$timelimit=$timestamp-480;
	echo $timestamp."<br/>",$timelimit."<br/>";
	$q="SELECT * FROM ticket_currently_active WHERE status='payment'";
	$r=mysql_query($q);
	if(mysql_num_rows($r)>0)
	{
		while($row=mysql_fetch_array($r))
			{
				$table_timestamp=$row["timestamp"];
				if($table_timestamp<$timelimit)
				{
					$q1="DELETE FROM ticket_currently_active WHERE status='payment' and timestamp='$table_timestamp'";
					mysql_query($q1);

				}
				//echo $table_timestamp."<br/>";
			}
	}
	mysql_close($con_e1);
}

function delete_active_ticket($con_e1)
{
	//$seat_no=$_POST["seatno"];
	//$status="active";
	$seats=array();
	$seats=$_POST["seatno"];
	//print_r($seats);
	for($i=0;$i<sizeof($seats);$i++)
	{
		$seat_n=$seats[$i];
		$query="DELETE FROM ticket_currently_active WHERE seatno='$seat_n'";
		$r=mysql_query($query);
		echo $seat_n;
	}
//echo "In PHP function".$_POST["seatno"];

mysql_close($con_e1);
}


function getallactiveticketinarray()
{
$activeticket=array();
$q="SELECT * FROM ticket_currently_active";
$r=mysql_query($q);
if(mysql_num_rows($r)>0)
{
	while($row=mysql_fetch_array($r))
	{
		$seat= $row['seatno'];
		array_push($activeticket,$seat);
	}
}
print_r($activeticket);
}
//$abc=array('B-31','B-30','B-25','B-32','B-27');
//sort($abc);
//print_r($abc);

function inside_payment_update_limit()
{
	//$seat_no_array_aftr_buy=array('T-40','T-41','S-43');
	$seat_no_array_aftr_buy=$_SESSION['tickets_step1'];
	//print_r($seat_no_array_aftr_buy);

	for($i=0;$i<sizeof($seat_no_array_aftr_buy);$i++)
		{
			$seat_np=$seat_no_array_aftr_buy[$i];
			$query="UPDATE ticket_currently_active SET status='payment' WHERE seatno='$seat_np' and status='active'";
			$r=mysql_query($query);

		}

}

function checktokenno()
{
//	print_r($_POST["val"]);
parse_str($_POST["val"]);
	$ticketlist=array();
	$ticketrate=array();
$q="SELECT * FROM ticket_customer WHERE itemnumber='$token'";
$r=mysql_query($q);
if(mysql_num_rows($r)>0)
{
	while($row=mysql_fetch_array($r))
	{
	$c_id=$row["id"];
	$c_name=$row["name"];
	$c_email=$row["email"];
	$c_cno=$row["contact1"];
	$c_seatno=$row["seatno"];
	$_SESSION["item_no"]=$row["itemnumber"];
$_SESSION['tickets_step1']=explode(',',$c_seatno);
?>
<div class="ticketlist" style="padding-left:4%;margin-top:80px;">
<h3>Tickets Booked For You</h3>
<?php
echo "<div class='seat_list' style='width:900px;'>";
foreach($_SESSION['tickets_step1'] as $key=>$value)
	{
    // and print out the values
    echo "<span>".$value."</span>";
    }
	echo "</div>";
	$price=0;
	$ticketlist=$_SESSION['tickets_step1'];
	//if()
	for($i=0;$i<sizeof($ticketlist);$i++)
	{
		$ticketno=$ticketlist[$i];
		$q="SELECT price from ticket_rate WHERE name='".$ticketno."'";
		//echo $q;
		$r=mysql_query($q);
		if(mysql_num_rows($r)>0)
		{
			while($row=mysql_fetch_array($r))
			{

					$price=$price+$row["price"];
			}
		}

	}
	echo "<br/><div style='clear:both;'></div><h1>Ticket Price:&nbsp;&nbsp;<font class='totalrate'>$ &nbsp;".$price."</font></h1>";
	$_SESSION['price']=$price;
?>
  </div>
  <div style="clear:both;"></div>
<section class="c_form">


        <form id="customer_paypal_redirect" method="post" action="">

            <label>Name :</label>
            <h3><?php echo $c_name; ?></h3>

            <label>Email :</label>
            <h3><?php echo $c_email ?></h3>

            <label>Contact No :</label>
           <h3><?php echo $c_cno; ?></h3>

         <button class="button_example" style="margin-top: 10px;float: right;margin-right: 20px;" name="submit" type="submit" value="Submit">Pay Money</button>

        </form>


    </section>

	<?php
	}

}
else
{
echo "error";
}

}
function paypal_customer_direct_redirect()
{
	?>
	<div id="wait" style="display:block;text-align:center;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='img/demo_wait.gif' width="64" height="64" /><br>Loading..</div>
	<?php
	 $seatno_array=$_SESSION['tickets_step1'];
//print_r($_SESSION['tickets_step1']);
$seatlist=implode(",", $seatno_array);
//echo $seatlist;
$price=$_SESSION['price'];
//print_r($_SESSION['price']);
$item_no=$_SESSION["item_no"];
	?>

	<form id="c_paypalform" action="https://www.paypal.com/cgi-bin/webscr" method="post">

	<input type="hidden" name="cmd" value="_xclick">

	<input type="hidden" name="business" value="office@gujaratisocietycfl.com">

	<input type="hidden" name="item_name" value="Book Ticket---<?php echo $seatlist;?>">

	<input type="hidden" name="custom" value="<?php echo $item_no; ?>">


	<input type="hidden" name="no_note" value="1">
	<input type="hidden" name="currency_code" value="USD">

	<input type="hidden" name="return" value="http://gujaratisocietycfl.com/thanks_ticket.php">

	<input type="hidden" class="input-text"  name="amount" value="<?php echo $price; ?>" />



	</form>

    <?php session_destroy();
}

function get_booked_member_ticket($con_e1,$data)
{
$q="SELECT * FROM ticket_detail WHERE status='pending' or status='completed'";
$r=mysql_query($q);
if(mysql_num_rows($r)>0)
{
	while($row=mysql_fetch_array($r))
	{

		$seat= $row['seat_no'];
		array_push($data,$seat);

	}
}
$dataarray=array("member_booked"=>$data);
        echo json_encode($dataarray);
//print_r($data);
mysql_close($con_e1);
}
//get_booked_member_ticket($con_e1,$data);

function insert_mem_record()
{
//print_r($_POST["val"]);
parse_str($_POST["val"]);
$date = new DateTime();
	$timestamp=$date->format('U');
	$rand=rand();
	//echo $timestamp."<br/>";
	//echo $rand."<br/>";
	$abc=$timestamp."".$rand;
	//echo $abc."<br/>";
	$itemnumber=md5($abc);

$q="INSERT INTO ticket_customer(name,email,address,contact1,itemnumber,status) VALUES('$name','$email','$address','$cno','$itemnumber','mem_request')";

		$r=mysql_query($q);
		//$to = 'crpcomfort@yahoo.com';
		//$to = 'dhaval301092@gmail.com';

		$to1=$email;
$subject = 'Members booking request for $ 15 tickets';

$headers = "From:info@gujaratisocietycfl.com\r\n";
$headers .= "Reply-To:info@gujaratisocietycfl.com\r\n";
$headers .= "CC:jpatel5000@yahoo.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type:text/html; charset=ISO-8859-1\r\n";

$headers1 = "From:info@gujaratisocietycfl.com\r\n";
$headers1 .= "Reply-To:info@gujaratisocietycfl.com\r\n";
//$headers .= "CC:jpatel5000@yahoo.com\r\n";
$headers1 .= "MIME-Version: 1.0\r\n";
$headers1 .= "Content-Type:text/html; charset=ISO-8859-1\r\n";

 $message123=member_book_ticket_notify_email($name,$email,$no_ticket,$cno,$member_names,$message);
		//echo $message;
		//$m1="You Requested";
		mail($to, $subject, $message123, $headers);
		mail($to1, $subject, $message123, $headers1);
		mail("crpcomfort@gmx.com", $subject, $message123, $headers1);
		mail("gspictureid@yahoo.com", $subject, $message123, $headers1);

}
function member_book_ticket_notify_email($name,$email,$no_ticket,$cno,$member_names,$message)
{

return "<table border='1' cellpadding='0' cellspacing='0' width='100%'><tr><td style='padding: 0 0 30px 0;'>
				<!-- Table1 -->
				<table align='center' border='1' cellpadding='0' cellspacing='0' width='600'><tr><td align='center' bgcolor='#FFFFFF' style='padding: 4px 0 3px 0;'>
							<img src='http://gujaratisocietycfl.com/test/gs_logo_1.png' alt='Gujarati Society of Central Florida Logo' width='160' height='120' style='display: block;'/></td>
					</tr><tr><td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
                        <h3>$15 Members Ticket Request Received.Following are the details.</h3>
							<table id='designed_table' style='width: 100%;border-collapse: collapse'><tr style='background: #eee'><th style='background: #333;color: white;font-weight: bold;padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'/>
			<th style='background: #333;color: white;font-weight: bold;padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'/>

		</tr><tr><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Name</td>
			<td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$name."</td>

		</tr>
		<tr><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>No. Of Tickets</td>
			<td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$no_ticket."</td>

		</tr>
		<tr><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Member's name</td>
			<td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$member_names."</td>

		</tr>

		<tr style='background: #eee'><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Email</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$email."</td>

		</tr><tr><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Contact No.</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$cno."</td>

		</tr>



		<tr style='background: #eee'><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Message</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$message."</td>

		</tr>
		</table></td>
					</tr><tr><td bgcolor='#FFFFFF' style='padding: 30px 30px 30px 30px;'>
							<table border='1' cellpadding='0' cellspacing='0' width='100%'><tr><td>
										®Gujarati Society, Florida 2014<br/><a href='#'>Unsubscribe</a> 									</td>
									<td align='right'>
										<table border='0' cellpadding='0' cellspacing='0'><tr><td>
													<a href='http://www.twitter.com/'>
														<img src='http://gujaratisocietycfl.com/test/facebook.jpg' alt='Twitter' width='38' height='38' style='display: block;' border='0'/></a>
												</td>
												<td style='font-size: 0; line-height: 0;' width='20'> </td>
												<td>
													<a href='http://www.twitter.com/'>
														<img src='http://gujaratisocietycfl.com/test/twiter.jpg' alt='Facebook' width='38' height='38' style='display: block;' border='0'/></a>
												</td>
											</tr></table></td>
								</tr></table></td>
					</tr></table><!-- Table1 --></td>
		</tr></table>";

}

function mailtemplate($name,$email,$cno1,$cno2,$seatlist)
{

return "<table border='1' cellpadding='0' cellspacing='0' width='100%'><tr><td style='padding: 0 0 30px 0;'>
				<!-- Table1 -->
				<table align='center' border='1' cellpadding='0' cellspacing='0' width='600'><tr><td align='center' bgcolor='#FFFFFF' style='padding: 4px 0 3px 0;'>
							<img src='http://gujaratisocietycfl.com/test/gs_logo_1.png' alt='Gujarati Society of Central Florida Logo' width='160' height='120' style='display: block;'/></td>
					</tr><tr><td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
                        <h3>Ticket Request Received.Following are the details.</h3>
							<table id='designed_table' style='width: 100%;border-collapse: collapse'><tr style='background: #eee'><th style='background: #333;color: white;font-weight: bold;padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'/>
			<th style='background: #333;color: white;font-weight: bold;padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'/>

		</tr><tr><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Name</td>
			<td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$name."</td>

		</tr><tr style='background: #eee'><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Email</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$email."</td>

		</tr><tr><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Contact No.</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$cno1."</td>

		</tr>
		<tr><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Alternate No.</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$cno2."</td>

		</tr>

		<tr style='background: #eee'><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Requested Ticket</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$seatlist."</td>

		</tr></table></td>
					</tr><tr><td bgcolor='#FFFFFF' style='padding: 30px 30px 30px 30px;'>
							<table border='1' cellpadding='0' cellspacing='0' width='100%'><tr><td>
										®Gujarati Society, Florida 2014<br/><a href='#'>Unsubscribe</a> 									</td>
									<td align='right'>
										<table border='0' cellpadding='0' cellspacing='0'><tr><td>
													<a href='http://www.twitter.com/'>
														<img src='http://gujaratisocietycfl.com/test/facebook.jpg' alt='Twitter' width='38' height='38' style='display: block;' border='0'/></a>
												</td>
												<td style='font-size: 0; line-height: 0;' width='20'> </td>
												<td>
													<a href='http://www.twitter.com/'>
														<img src='http://gujaratisocietycfl.com/test/twiter.jpg' alt='Facebook' width='38' height='38' style='display: block;' border='0'/></a>
												</td>
											</tr></table></td>
								</tr></table></td>
					</tr></table><!-- Table1 --></td>
		</tr></table>";

}

function eventbooked($address_name,$payer_email,$address_street,$custom,$temp)
{

return "<table border='1' cellpadding='0' cellspacing='0' width='100%'><tr><td style='padding: 0 0 30px 0;'>
				<!-- Table1 -->
				<table align='center' border='1' cellpadding='0' cellspacing='0' width='600'><tr><td align='center' bgcolor='#FFFFFF' style='padding: 4px 0 3px 0;'>
							<img src='http://gujaratisocietycfl.com/test/gs_logo_1.png' alt='Gujarati Society of Central Florida Logo' width='160' height='120' style='display: block;'/></td>
					</tr><tr><td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
                        <h3>Thanks for Purchasing Ticket.Please Come with Identity Proof.Following are the details.</h3>
							<table id='designed_table' style='width: 100%;border-collapse: collapse'><tr style='background: #eee'><th style='background: #333;color: white;font-weight: bold;padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'/>
			<th style='background: #333;color: white;font-weight: bold;padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'/>

		</tr><tr><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Name</td>
			<td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$address_name."</td>

		</tr><tr style='background: #eee'><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Email</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$payer_email."</td>

		</tr><tr><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Address</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$address_street."</td>

		</tr>
		<tr><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Security No.</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$custom."</td>

		</tr>

		<tr style='background: #eee'><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Requested Ticket</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$temp."</td>

		</tr></table></td>
					</tr><tr><td bgcolor='#FFFFFF' style='padding: 30px 30px 30px 30px;'>
							<table border='1' cellpadding='0' cellspacing='0' width='100%'><tr><td>
										®Gujarati Society, Florida 2014<br/><a href='#'>Unsubscribe</a> 									</td>
									<td align='right'>
										<table border='0' cellpadding='0' cellspacing='0'><tr><td>
													<a href='http://www.twitter.com/'>
														<img src='http://gujaratisocietycfl.com/test/facebook.jpg' alt='Twitter' width='38' height='38' style='display: block;' border='0'/></a>
												</td>
												<td style='font-size: 0; line-height: 0;' width='20'> </td>
												<td>
													<a href='http://www.twitter.com/'>
														<img src='http://gujaratisocietycfl.com/test/twiter.jpg' alt='Facebook' width='38' height='38' style='display: block;' border='0'/></a>
												</td>
											</tr></table></td>
								</tr></table></td>
					</tr></table><!-- Table1 --></td>
		</tr></table>";

}


function eventbooked_admin_notify($address_name,$payer_email,$address_street,$custom,$temp)
{

return "<table border='1' cellpadding='0' cellspacing='0' width='100%'><tr><td style='padding: 0 0 30px 0;'>
				<!-- Table1 -->
				<table align='center' border='1' cellpadding='0' cellspacing='0' width='600'><tr><td align='center' bgcolor='#FFFFFF' style='padding: 4px 0 3px 0;'>
							<img src='http://gujaratisocietycfl.com/test/gs_logo_1.png' alt='Gujarati Society of Central Florida Logo' width='160' height='120' style='display: block;'/></td>
					</tr><tr><td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
                        <h3>Following Person Has Purchased Tickets Successfully.</h3>
							<table id='designed_table' style='width: 100%;border-collapse: collapse'><tr style='background: #eee'><th style='background: #333;color: white;font-weight: bold;padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'/>
			<th style='background: #333;color: white;font-weight: bold;padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'/>

		</tr><tr><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Name</td>
			<td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$address_name."</td>

		</tr><tr style='background: #eee'><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Email</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$payer_email."</td>

		</tr><tr><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Address</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$address_street."</td>

		</tr>
		<tr><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Security No.</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$custom."</td>

		</tr>

		<tr style='background: #eee'><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Requested Ticket</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$temp."</td>

		</tr></table></td>
					</tr><tr><td bgcolor='#FFFFFF' style='padding: 30px 30px 30px 30px;'>
							<table border='1' cellpadding='0' cellspacing='0' width='100%'><tr><td>
										®Gujarati Society, Florida 2014<br/><a href='#'>Unsubscribe</a> 									</td>
									<td align='right'>
										<table border='0' cellpadding='0' cellspacing='0'><tr><td>
													<a href='http://www.twitter.com/'>
														<img src='http://gujaratisocietycfl.com/test/facebook.jpg' alt='Twitter' width='38' height='38' style='display: block;' border='0'/></a>
												</td>
												<td style='font-size: 0; line-height: 0;' width='20'> </td>
												<td>
													<a href='http://www.twitter.com/'>
														<img src='http://gujaratisocietycfl.com/test/twiter.jpg' alt='Facebook' width='38' height='38' style='display: block;' border='0'/></a>
												</td>
											</tr></table></td>
								</tr></table></td>
					</tr></table><!-- Table1 --></td>
		</tr></table>";

}


function eventRefunded($address_name,$payer_email,$address_street,$custom,$temp)
{

return "<table border='1' cellpadding='0' cellspacing='0' width='100%'><tr><td style='padding: 0 0 30px 0;'>
				<!-- Table1 -->
				<table align='center' border='1' cellpadding='0' cellspacing='0' width='600'><tr><td align='center' bgcolor='#FFFFFF' style='padding: 4px 0 3px 0;'>
							<img src='http://gujaratisocietycfl.com/test/gs_logo_1.png' alt='Gujarati Society of Central Florida Logo' width='160' height='120' style='display: block;'/></td>
					</tr><tr><td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
                        <h3>You have Successfully Refunded the tickets with following details.</h3>
							<table id='designed_table' style='width: 100%;border-collapse: collapse'><tr style='background: #eee'><th style='background: #333;color: white;font-weight: bold;padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'/>
			<th style='background: #333;color: white;font-weight: bold;padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'/>

		</tr><tr><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Name</td>
			<td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$address_name."</td>

		</tr><tr style='background: #eee'><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Email</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$payer_email."</td>

		</tr><tr><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Address</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$address_street."</td>

		</tr>
		<tr><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Security No.</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$custom."</td>

		</tr>

		<tr style='background: #eee'><td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>Requested Ticket</td>
		  <td style='padding: 6px;border: 1px solid #ccc;text-align: center;vertical-align: middle'>".$temp."</td>

		</tr></table></td>
					</tr><tr><td bgcolor='#FFFFFF' style='padding: 30px 30px 30px 30px;'>
							<table border='1' cellpadding='0' cellspacing='0' width='100%'><tr><td>
										®Gujarati Society, Florida 2014<br/><a href='#'>Unsubscribe</a> 									</td>
									<td align='right'>
										<table border='0' cellpadding='0' cellspacing='0'><tr><td>
													<a href='http://www.twitter.com/'>
														<img src='http://gujaratisocietycfl.com/test/facebook.jpg' alt='Twitter' width='38' height='38' style='display: block;' border='0'/></a>
												</td>
												<td style='font-size: 0; line-height: 0;' width='20'> </td>
												<td>
													<a href='http://www.twitter.com/'>
														<img src='http://gujaratisocietycfl.com/test/twiter.jpg' alt='Facebook' width='38' height='38' style='display: block;' border='0'/></a>
												</td>
											</tr></table></td>
								</tr></table></td>
					</tr></table><!-- Table1 --></td>
		</tr></table>";

}

?>
