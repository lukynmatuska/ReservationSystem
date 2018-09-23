<?php
include "./../dbconnectDone.php";
header('Content-Type: text/html; charset=utf-8');

function dbWrite($conn, $vzkaz="Nezadano"){
  $sql = "SET NAMES utf8";
  if($conn->query($sql)===TRUE){
      echo "utf8 OK<br/>";
  }else{
      echo "utf8 NOK<br/>";
  } 
  $sql = "INSERT INTO objednano(vzkaz_zpetne_vazby) VALUES('$vzkaz')"; 
  if($conn->query($sql)===TRUE){
      echo "inserted data<br/>";
  }else{
      echo "failed<br/>";
  } }
    

    function utf8mail($to,$s,$body,$from_name="x",$from_a = "buchticka.eu@gmail.com", $reply="CarodkyRC@seznam.cz"){
    $s= "=?utf-8?b?".base64_encode($s)."?=";
    $headers = "MIME-Version: 1.0\r\n";
    $headers.= "From: =?utf-8?b?".base64_encode($from_name)."?= <".$from_a.">\r\n";
    $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
    $headers.= "Reply-To: $reply\r\n";  
    $headers.= "X-Mailer: PHP/" . phpversion();
    mail($to, $s, $body, $headers);
}


if(isset($_POST['naPresun'])){
  while ($row = mysqli_fetch_array($query))
    {
      if($row['id_zadosti'] == $_POST){
        dbWrite()
    

    
if(isset($_POST['zpetnaVazba'])){
try{
utf8mail($to,$subject,$message, "BUCHTICKA WEBSITES"/*"buchticka.eu@gmail.com"*/, "IDK"/*$email_from*/, "CarodkyRC@seznam.cz");
dbWrite($conn, $_POST['zpetnaVazba']);
$conn->close(); 
header("Location: dikyZVazba.html");
}
catch(Exception $problem){echo $problem;}
}

    }

?>