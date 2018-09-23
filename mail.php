<?php
function utf8mail($to,$s,$body,$from_name="Pohádkový les Rudice", $from_a="buchticka.eu@gmail.com", $reply="lukynmatuska@gmail.com"){
    $s = "=?utf-8?b?".base64_encode($s)."?=";
    $headers = "MIME-Version: 1.0\r\n";
    $headers.= "From: =?utf-8?b?".base64_encode($from_name)."?= <".$from_a.">\r\n";
    $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
    $headers.= "Reply-To: $reply\r\n";  
    $headers.= "X-Mailer: PHP/" . phpversion();
    mail($to, $s, $body, $headers);
}?><?php
  include './variables.php';
  include "./dbconnect.php";
  include "./header.php";
?>
    <title>Díky - Pohádkový les Rudice</title>
    <meta property="og:title" content="Díky - Pohádkový les Rudice" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php print($_SERVER['REQUEST_URI']); ?>" />
    <meta property="og:image" content="https://pohles.buchticka.eu/background.jpg" />
    <meta property="og:description" content="Děkujeme za registraci!" />
  </head>
  <body style="min-width: 500px; background-color: transparent; font-family: Trebuchet MS">
      
    <div class="mui-container">
      <div style="min-width: 369px;" class="mui-panel" >
        <div style="text-align:center">
          <h1 style="text-align:center">Pohádkový les Rudice</h1>
          
          <?php if (isset($_GET["email"]) || isset($_GET["id"])) {
            try {

              $strToSend = "
Dobrý den,

gratulujeme k úspěšné registraci s těmito údaji:
";

            header("Content-Type: text/html;charset=UTF-8");
            mysqli_query($conn, "SET NAMES 'UTF-8'");
            $sql = "SELECT * FROM `ucastnici` WHERE `klicek` = " . intval($_GET['id']);
            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($query)){
              $strToSend .= ' 
ID:               '.$row['klicek'].'
Jméno:            '.$row['jmeno'].'
Příjmení:         '.$row['prijmeni'].'
Čas:              '.$row['cas'].'
Počet dětí:       '.$row['deti'].'
Počet dospělých:  '.$row['dospelych'].'

';
            }

$strToSend .= "Děkujeme za registraci, budeme se na Vás těšit v Rudici!

Pořadatelé.";

            if (!$query) {
              die ('SQL Error: ' . mysqli_error($conn));
            }

              utf8mail($_GET["email"], "Potvrzení o registraci", $strToSend);


              echo '<h2>Poslání shrnutí registrace na email</h2>
                    <p>Email byl úspěšně odeslán.</p>';  


              } catch (Exception $e) {
              echo '<h1 style="text-align: center; ">Něco se pokazilo, kontaktujte nás na emailu <a href="mailto:lukynmatuska@gmail.com">.</h1>
                    <h2 style="text-align: center; ">Chyba:</h2>'.$e;
              
            }

            

            /*echo '<p style="text-align: center; font-size: 100%; border:0%; padding:0%"><b style="text-align: left; color: red; ">* </b> Povinné pole</p>
                    <a href="/mail.php?id='.$_GET["id"].'"><button style="margin-left:auto; margin-right:auto; margin-top:auto; " class="mui-btn mui-btn--primary mui-btn--raised">Odeslat</button></a>';*/
          }else{
            echo "<h2> Vyplňte prosím přihlášku na hlavní stránce. </h2>";
          } ?>

          <p style="font-size: 100%"><a href="/" >Vrátit se zpět.</a></p>  
        </div>
        <div class="paticka" style="text-align: center;">
          <hr ><p style="text-align: center; font-size: 75%; border: 0%; padding: 0%"> Copyright &copy; 2018, <a href="https://buchticka.eu">Buchticka.eu</a> Team</p>
        </div>
      </div>
    </div>
  </body>
</html>