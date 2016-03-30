<?php include("config.php"); 
include("functions.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jonita Concert-Payment</title>
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
<div id="main_container_payform">
<section class="c_form">
    
    	    
        <form id="paytickettockenform" method="post" action="">
        
            <label>Please Enter Token No.</label>
            <input class="tbxText" name="token" placeholder="Type Here" required>
            
           
        
         <button class="button_example" style="margin-top: 10px;float: right;margin-right: 20px;" type="submit" value="Submit">View</button>
        
        </form>
        </section>

	
        </div>
        </body>
        </html>