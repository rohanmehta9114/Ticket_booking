<div id="wait" style="display:block;text-align:center;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='img/demo_wait.gif' width="64" height="64" /><br>Loading..</div>
<?php error_reporting(0);
include('functions.php');
  $seatno_array=$_SESSION['tickets_step1'];
//print_r($_SESSION['tickets_step1']);
$seatlist=implode(",", $seatno_array);
//echo $seatlist;
$price=$_SESSION['price'];
//print_r($_SESSION['price']);
$item_no=$_SESSION["item_no"];
$status="requested";
 parse_str($_POST["val"]);
 //echo $name,$email,$cno1,$cno2,$seatlist,$item_no,$status;
//$to = 'dhaval301092@gmail.com';

$subject = 'Florida Society-Book Ticket Request';

$headers = "From:info@gujaratisocietycfl.com\r\n";
$headers .= "Reply-To:info@gujaratisocietycfl.com\r\n";
$headers .= "CC:jpatel5000@yahoo.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type:text/html; charset=ISO-8859-1\r\n";
 $message=mailtemplate($name,$email,$cno1,$cno2,$seatlist);
		//echo $message;
		//$m1="You Requested";
		mail("crpcomfort@gmx.com", $subject, $message, $headers);
    mail("gspictureid@yahoo.com", $subject, $message, $headers);


$q1="INSERT INTO ticket_customer(name,email,contact1,contact2,seatno,itemnumber,status) VALUES('$name','$email','$cno1','$cno2','$seatlist','$item_no','$status')";
$r1=mysql_query($q1);

if(!$r1)
{
 echo mysql_errno()."".mysql_error();
}

?>
	<form id="paypalform" action="https://www.paypal.com/cgi-bin/webscr" method="post">

	<input type="hidden" name="cmd" value="_xclick">

	<input type="hidden" name="business" value="office@gujaratisocietycfl.com">

	<input type="hidden" name="item_name" value="Book Ticket---<?php echo $seatlist;?>">

	<input type="hidden" name="custom" value="<?php echo $item_no; ?>">
  <input type="hidden" name="item_number" value="2">
	<input type="hidden" name="no_note" value="1">
	<input type="hidden" name="currency_code" value="USD">

	<input type="hidden" name="return" value="http://gujaratisocietycfl.com/thanks_ticket.php">

	<input type="hidden" class="input-text"  name="amount" value="<?php echo $price; ?>" />



	</form>

<?php session_destroy();?>
