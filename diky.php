<?php
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
          
          <?php if (isset($_GET["id"])) {

            echo '

            <h2>Registrace proběhla úspěšně!</h2>
          <p>Děkujeme.</p>
          
            <h2>Shrnutí registrace</h2>
          <table class="mui-table mui-table--bordered" align="center" style="width: 75%;">
            <thead>
              <th style="text-align: center;">ID</th>
              <th style="text-align: center;">Jméno</th>
              <th style="text-align: center;">Příjmení</th>
              <th style="text-align: center;">Čas</th>
              <th style="text-align: center;">Dětí</th>
              <th style="text-align: center;">Dospělých</th>
            </thead>
            <tbody';

            header("Content-Type: text/html;charset=UTF-8");
            mysqli_query($conn, "SET NAMES 'UTF-8'");
            $sql = "SELECT * FROM `ucastnici` WHERE `klicek` = " . intval($_GET['id']);
            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($query)){
              echo '
              <tr>
              <td>'.$row['klicek'].'</td>
              <td>'.$row['jmeno'].'</td>
              <td>'.$row['prijmeni'].'</td>
              <td>'.$row['cas'].'</td>
              <td>'.$row['deti'].'</td>
              <td>'.$row['dospelych'].'</td>
              </tr>';
            }

            if (!$query) {
              die ('SQL Error: ' . mysqli_error($conn));
            }
            echo '</tbody></table><p>Tyto informace doporučejeme uschovat pro prokázání, že je rezervace Vaše.</p>
            <form class="mui-form" method="get" action="mail.php">
              <input type="hidden" name="id" value="'. $_GET["id"] .'" />
              <div class="mui-textfield mui-textfield--float-label">
                <input type="text" name="email" id="email" required >
                <label style="text-align: left; ">Váš email <b style="color: red; ">*</b></label>
              </div>
              <p style="text-align: center; font-size: 100%; border:0%; padding:0%"><b style="text-align: left; color: red; ">* </b> Povinné pole</p>
              <button type="submit" style="margin-left:auto; margin-right:auto; margin-top:auto; " class="mui-btn mui-btn--primary mui-btn--raised">Poslat shrnutí na email</button>
            </form>';
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