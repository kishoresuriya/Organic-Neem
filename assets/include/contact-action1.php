<?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'phpmailer/Exception.php';
        require 'phpmailer/PHPMailer.php';
        require 'phpmailer/SMTP.php';

        // Please replace your email address below in $recip_address field to start receiving form responses. If you want to add multiple email recipients, simply just add a comma(,) separation. For Example: email@domain.com, email2@domain.com

        $recip_address = "export@sunasia.in";
        $name       = addslashes(strip_tags($_POST['name'])); 
        $country        = addslashes(strip_tags($_POST['country']));
        $mobile      = addslashes(strip_tags($_POST['mobile'])); 
        $email    = addslashes(strip_tags($_POST['email'])); 
        $product    = addslashes(strip_tags($_POST['product']));
        $quantity    = addslashes(strip_tags($_POST['quantity'])); 
        $port    = addslashes(strip_tags($_POST['port']));
        $sub    = addslashes(strip_tags($_POST['subject'])); 
        $message    = addslashes(strip_tags($_POST['message'])); 
          

        if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($message)) {
                    http_response_code(400);
                    $msg = 'Please complete the form and try again.';
                    echo $msg;
                    exit;
        }

        /* Method 1 - PHP default mail function code starts */
        // $e_subject = 'You\'ve been contacted by ' . $name . '';
        // $e_body = 'You have been contacted by: $name </br>' . PHP_EOL . PHP_EOL;
        // $e_reply = 'E-mail: $email </br>' . PHP_EOL . PHP_EOL;
        // $e_subject = 'Subject: $sub';

        // $msg = wordwrap( $e_body . $e_reply .$e_subject , 1000 );

        // $headers = "From: $email" . PHP_EOL;
        // $headers .= "Reply-To: $email" . PHP_EOL;
        // $headers .= "MIME-Version: 1.0" . PHP_EOL;
        // $headers .= "Content-type:text/html;charset=UTF-8" . PHP_EOL;
        // $headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

        // mail($recip_address, $e_subject, $msg, $headers);

        // if(mail($recip_address, $e_subject, $msg, $headers)) {
        //     echo 'Thank You! Your message has been sent. We will get back to you soon!';
        // } else {
        //     echo "Oops! Something went wrong, we couldn't send your message.";
        // } /* Method 1 - PHP default mail function code ends */ 

        /* If your server does not support PHP default mail functionality, then comment out Method 2 code and insert comment in Method 1. You should start receiving form responses now. */

        /* Method 2 - PHPMailer code starts */

        $mail = new PHPMailer();
        $mail->SMTPOptions = array(
             'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
             )
         );

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress($recip_address);     // Add a recipient 

        //Content
        $mail->Subject = $sub;
        $mail->Body    =  "Dear Team,  Please find the details filled by a website visitor in the free sample form (free sample page) of the website. 
        <br> <br><b>Name:  </b>".$name. "
        <br><b>E-mail Address :</b> ".$email."   
        <br><b>Mobile Number :</b> ".$mobile."
        <br><b>Product Required :</b> ".$product."
        <br><b>Quantity Amount :</b> ".$quantity."
        <br><b>Destination Port  :</b> ".$port."
        <br><b>Country Name : </b>".$country."
        <br><b>Message For You: </b>".$message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->isHTML(true);                   // Set email format to HTML
  
        
        if ($mail->send()) {
            echo "Thank You! Your message has been sent. We will get back to you soon!";
        } else {
            echo "Oops! Something went wrong, we couldn't send your message.";
        } /* Method 2 - PHPMailer code ends */

?>