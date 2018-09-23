<?php
include "./../dbconnect.php";
header('Content-Type: text/html; charset=utf-8');
$badCaptcha = "badcaptcha.php"; // reCAPTCHA error page

if(isset($_POST['g-recaptcha-response'])){
  $captcha = $_POST['g-recaptcha-response'];
}
if(!$captcha){
  header("Location: $badCaptcha");
 } 
$secretKey = "6Ld1l0AUAAAAAKn_3kPTvNAeQS5RL70O5HvkihRt";
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha);
$responseKeys = json_decode($response,true);
 
if(isset($_POST['zpetnaVazba']) and $captcha){
    $to = "CarodkyRC@seznam.cz"; // this is your Email address
    /*$from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];*/
    $subject = "Zpětná vazba";
    //$message = /*$first_name . " " . $last_name . */" wrote the following:" . "\n\n" . $_POST['message'];
    $message = "Co by jste vylepšil(a)?:\r\n".$_POST['zpetnaVazba'];
    
    $headers = "From: CARODKY.BUCHTICKA.EU"/* . $from*/;
    //mail($to,$subject,$message,$headers);
    function dbWrite($conn, $vzkaz="Nezadano"){
  $sql = "SET NAMES utf8";
  if($conn->query($sql)===TRUE){
      echo "utf8 OK<br/>";
  }else{
      echo "utf8 NOK<br/>";
  } 
  $sql = "INSERT INTO zpetna_vazba(vzkaz_zpetne_vazby) VALUES('$vzkaz')"; 
  if($conn->query($sql)===TRUE){
      echo "inserted data<br/>";
  }else{
      echo "failed<br/>";
  } }
    function utf8mail($to,$s,$body,$from_name="x",$from_a = "buchticka.eu@gmail.com", $reply="CarodkyRC@seznam.cz")
{
    $s= "=?utf-8?b?".base64_encode($s)."?=";
    $headers = "MIME-Version: 1.0\r\n";
    $headers.= "From: =?utf-8?b?".base64_encode($from_name)."?= <".$from_a.">\r\n";
    $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
    $headers.= "Reply-To: $reply\r\n";  
    $headers.= "X-Mailer: PHP/" . phpversion();
    mail($to, $s, $body, $headers);
}
if(isset($_POST['zpetnaVazba'])){
try{
utf8mail($to,$subject,$message, "BUCHTICKA WEBSITES"/*"buchticka.eu@gmail.com"*/, "IDK"/*$email_from*/, "CarodkyRC@seznam.cz");
dbWrite($conn, $_POST['zpetnaVazba']);
$conn->close(); 
header("Location: dikyZVazba.php");
}
catch(Exception $problem){echo $problem;}
}

    }

?>