<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<meta http-equiv="refresh" content="2; url=Enquiry.php"> <!-- Redirecting Page code *********** important********** -->

<title>Processing Page...........</title>
<meta name="keywords" content="" />
<meta name="description" content="" />


</head>

<body>

 <?php

  $name = $_POST['name'] ; 
  
  $country = $_POST['country'] ; 
  
  $phno = $_POST['phno'] ; 
  
  $email = $_POST['email'] ;
  
  $product_name = $_POST['product_name'] ;
  
  $quantity = $_POST['quantity'] ;
  
  $product_desc = $_POST['product_desc'] ;
  
   $port_des = $_POST['port_des'] ;
  
  $subject1 = $_POST['subject1'] ;
 
  $message = $_POST['message'] ;
  
  
  
  $headers = 'MIME-Version: 1.0' . "\n\n" .

'From: ' . 'Enquiry Message from this Email Id :' . $email . "\n\n"; 
 
 $subject = "Terra Neem - Enquiry Message !";
     
   $to="kishore@sixtyonesteps.com";
   
 /*  $to="taaruna.skill@gmail.com"; */
  
   
  /* $from= "From :". $name . "--". "Information's"; */
  
 $com = "\n\nProduct Name : " .$product_name. "\n\nPort Destination : " .$port_des.  "\n\nSubject : " .$subject1. "\n\nCustomer Name : " . $name. "\n\nCountry : " . $country. "\n\nPhone Number : " . $phno. "\n\nCustomer Email Id: " . $email. "\n\nProduct Name : " . $product_name. "\n\nQuantity : " . $quantity. "\n\nProduct Description : " . $product_desc.  "\n\nEnquiry Message: " . $message;
  
if (mail($to,$subject,$com, $headers)) {

 echo('<p>Message successfully sent!</p>
  


<div id="wrapper">
<br />
<br />
<br />
<div id="page">
	<div id="content">
		<div class="post">
			<h2 class="title">&nbsp;</h2>
			<p class="date"></p>
		  <div class="entry">
		  <table width="707" border="0" align="center">
  
 
  <tr>
     <td colspan="3" align="center" class="header">&nbsp;</td>
  </tr>
 <tr>
 <td class="header"><h3><b>Thank You for your interest to send Your Informations and Feedback...!<br />We received your Feedback. Will contact you soon.</b></h3></td>
 </tr>
  <tr>
   
  </tr>
</table>

		  </div>
		</div>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>

</div>
');
}



 else
  {
   echo('<p>Message delivery failed...</p>
   <div id="wrapper">
<br />
<br />
<br />
<div id="page">
	<div id="content">
		<div class="post">
			<h2 class="title">&nbsp;</h2>
			<p class="date"></p>
		  <div class="entry">
		  <table width="707" border="0" align="center">
  
 
  <tr>
     <td colspan="3" align="center" class="header">&nbsp;</td>
  </tr>
 <tr>
 <td class="header"><h3><b>Sorry ...! We Did not get Your Informations. Sending Failed. Try Again Later or Give Your Correct Informations</b></h3></td>
 </tr>
  <tr>
    <td class="header">&nbsp;</td>
    
  </tr>
</table>

		  </div>
		</div>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>

</div> ');
  }
?>

			
</body>
</html>
