<?php 
#let's get all form values
$username = $_POST['username'];
$email = $_POST['email'];
$server = $_POST['server'];
$message = $_POST['message'];
if(!empty($email) && !empty($username)){
#if email and message are not empty;
if(filter_var($email,FILTER_VALIDATE_EMAIL)){
#if the email is valid 
$reciver = "m.daya.nutrino@gmail.com";
$subject = "form : $username <$email>?";
$body = "Name : $username \n Email : $email \n server : $server \n ";
$sender = "From : $email";
    if(mail($reciver,$subject,$body,$sender)){
#mail() is a built in function in php to send php
echo "Your Message Has Benn Sent Succecfully \n";
echo "We Will Reply Wethen 24 Hours.";
    }else{
        echo "Sorry Failed To Send Your Message !";
    }
}else{
    echo "Please Enter A Valid Email Adress";

}
}
else{
    echo "Email And Username Fields Are Required !";
}

?>