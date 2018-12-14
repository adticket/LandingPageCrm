<?php
    
if(isset($_POST)){

//    $firstName = $_POST['fname'];
//    $seconName = $_POST['sname'];
   $email = $_POST['email'];
   $msg = $_POST['message'];
// $from = $firstName.' '. $seconName;
//     $to = "abdulwasa.osman@reservix.de";
//  $result = mail($to, $msg, $from);

//  echo 'It sand successfluy';
//Receiever of the mail
$to="abdulwasa.osman@reservix.de";
 
//subject of the mail
$subject = "ProductDetails";
 
//message
$message = $msg;
 
 
$headers = "From:'.$email.'";

 if(empty($to) || empty($email) || empty($msg)){
    echo 'Die Felder muss ausfegühlt werden';
 }else{
     echo 'Deine E-Mail ist bereit gesendet worden!';
     mail($to, $subject, $message, $headers);
 }
 
}
