<?php
include('functions.php');
$action=$_POST["action"];

if($action=="getticket")
{
    getticketinfo($con_e1,$data);
}

if($action=="setactive")
{
    check_if_booked($con_e1);
}
if($action=="delactive")
{
    delete_active_ticket($con_e1);
}
if($action=="delexpireactiveticket")
{
    del_expired_inserted_active_seats($con_e1);
}
if($action=="delexpirepaymentticket")
{
    del_expired_inserted_payment_seats($con_e1);
}
if($action=="getbooked")
{
check_if_booked($con_e1);
}
if($action=="getactivetickets")
{
	getactivetickets($con_e1);
}
if($action=="insidepaypal")
{
inside_payment_update_limit();
}
if($action=="viewrates")
{
	getrates();
//inside_payment_update_limit();
}
if($action=="checktoken")
{
checktokenno();

}

if($action=="customer_paypal_redirect")
{
paypal_customer_direct_redirect();

}

if($action=="get_booked_mem_ticket")
{
get_booked_member_ticket($con_e1,$data);
}



if($action=="get_mem_record")
{
//get_booked_member_ticket($con_e1,$data);
insert_mem_record();
}

if($action=="get_ticket_rate")
{
	$ticket=$_POST["ticket"];
//echo "Selected Ticket".$ticket;
get_ticket_rate_from_db($ticket);
}
if($action=="get_ticket_color")
{
  set_ticket_color_from_rate();
}
?>
