<?php

# change in php.ini :
	# sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"
	
# change in sendmail\sendmail.ini
	# smtp_server=smtp.gmail.com
	# smtp_port = 465
	# auth_ursername
	# auth_password

$to = 'recipients@email-address.com';
$subject = "WELCOME MESSAGE.";
$message = "HELLO WORLD!";
$headers = "From: the dev\r\n";
if(mail($to, $subject, $message, $headers)){
	echo "SUCCESS";
}else{
	echo "ERROR";
}