<?php
	//Fetching Values from URL
	$name = $_POST['name1'];
	$email = $_POST['email1'];
	$message = $_POST['message1'];
	$contact = $_POST['contact1'];
	
	//sanitizing email
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	//After sanitization Validation is performed
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				
		$subject = $name;
		// To send HTML mail, the Content-type header must be set
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= 'From:' . $email. "\r\n"; // Sender's Email
		//$headers .= 'Cc:' . $email. "\r\n"; // Carbon copy to Sender
		$template = '<div style="padding:20px; color:white; font-size: 14;"><h3>Nuevo Mensaje de '. $name . '</h3><br/>'
		. '<h4>E-mail:</h4>' . $email . '<br/>'
		. '<h4>Tel:</h4>' . $contact . '<br/><br/>'
		. '<h4>Mensaje:</h4><p>' . $message . '</p><br/>'
		. '</div>';
		$sendmessage = "<div style=\"background-color:#3d0000; color:white;\">" . $template . "</div>";
		// message lines should not exceed 70 characters (PHP rule), so wrap it
		$sendmessage = wordwrap($sendmessage, 70);

			// Send mail by PHP Mail Function
		mail("reyesrivascp@gmail.com", $subject, $sendmessage, $headers);
		echo "Enviado";
	
	} 
	else {
		echo "<span>Dirección de correo invalida</span>";
	}

?>