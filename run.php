<?php
include "./dbconnect.php";
header('Content-Type: text/html; charset=utf-8');
$badCaptcha = "spatnaRecaptcha.php"; // reCAPTCHA error page
$thankyou = "diky.php"; // thank you page
$message = "";

if(isset($_POST['g-recaptcha-response'])){
  $captcha = $_POST['g-recaptcha-response'];
}                                                          
if(!$captcha){
  header("Location: $badCaptcha");
 } 
$secretKey = "6Ld1l0AUAAAAAKn_3kPTvNAeQS5RL70O5HvkihRt";
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha);
$responseKeys = json_decode($response,true);
      
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
if(isset($_POST['jmeno'])){
    if($captcha /* and strlen($_POST['song']) > 1 */){
        try{
            //utf8mail($to,$subject,$message, "BUCHTICKA WEBSITES"/*"buchticka.eu@gmail.com"*/, "IDK"/*$email_from*/, "CarodkyRC@seznam.cz"); 

            $cas = $_POST["cas"];
            $jmeno = $_POST["jmeno"];
            $prijmeni = $_POST["prijmeni"];
            $pocetDeti = $_POST["pocetDeti"];
            $pocetDospelych = $_POST["pocetDospelych"];

            #$sql = mysql_real_escape_string("INSERT INTO pisnicky_na_prani(kdo, komu, vzkaz, song, hotovo) VALUES ('$kdo', '$komu', '$vzkaz', '$song', 0)");
            $sql = "INSERT INTO ucastnici(jmeno, prijmeni, cas, deti, dospelych) VALUES ('$jmeno', '$prijmeni','$cas', '$pocetDeti', '$pocetDospelych')";
            $conn->query($sql);
            
            $query = mysqli_query($conn, "SELECT `obsazenost_casu` FROM `casy` WHERE `cas` = '$cas';");
            
            if (!$query) {
                die ('SQL Error: ' . mysqli_error($conn));
            }else{
                while ($row = mysqli_fetch_array($query)) {
                    $obsazenostCasu =  $row["obsazenost_casu"];
                }
                $obsazenostCasu += $pocetDeti;

                if ($obsazenostCasu > (string) 10){
                    header("Location: mocDeti.php");
                }else{
                    $sql = "UPDATE casy SET obsazenost_casu  = '$obsazenostCasu' WHERE `cas` = '$cas';";
                    $conn->query($sql);
                }
                
                
            }

            
            $query = mysqli_query($conn, "SELECT `klicek` FROM `ucastnici` WHERE `jmeno` = '$jmeno';");

            if (!$query) {
                die ('SQL Error: ' . mysqli_error($conn));
            }else{
                while ($row = mysqli_fetch_array($query)) {
                    $klicek =  $row["klicek"];
                }
            }
            //$klicek = 3;
            header("Location: $thankyou?id=" . $klicek);
            
            

            $conn->close();  
        }catch(Exception $problem){
            echo $problem;}
    }
}

    

?>