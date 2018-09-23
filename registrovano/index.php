<?php
include './../variables.php';
include "./../dbconnect.php";
include "./../header.php";
?>
  <title>Registrováno - Pohádkový les Rudice</title>
  <meta property="og:title" content="Registrováno - Pohádkový les Rudice" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php print($_SERVER['REQUEST_URI']); ?>" />
  <meta property="og:image" content="https://pohles.buchticka.eu/background.jpg" />
  <meta property="og:description" content="Seznam registrací" />

  <!-- Matomo -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//www.buchticka.eu/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '2']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->
    
</head>
<body onload="btn.onclick()" style="background-color: transparent; font-family: Trebuchet MS; /*min-width: 600px;*/">
  <div style="text-align:center" class="mui-container">
    <div style="background-color: rgba( 255, 255, 255, 0.85);" class="mui-panel" >
      <h1 style="text-align:center;">Pohádkový les Rudice</h1>
      <h2 style="text-align:center;">Seznam registrací</h2>
      <?php
      include '..\menu.php';
      ?>
  
<?php
header("Content-Type: text/html;charset=UTF-8");
mysqli_query($conn, "SET NAMES 'UTF-8'");
$sql = 'SELECT * FROM ucastnici ORDER BY cas';
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}?>
 
		<table class="mui-table mui-table--bordered">
  <thead>
    <tr>
      <th style="text-align: center; width: 8%; ">ID</th>
      <th style="text-align: center; ">Jméno</th>
      <th style="text-align: center; ">Příjmení</th>
      <th style="text-align: center; ">Čas</th>
      <th style="text-align: center; width: 10%; ">Dětí</th>
      <th style="text-align: center; width: 10%; ">Dospělých</th>
      <!--<th style="text-align: center">Hotovo</th>-->
    </tr>
  </thead>
  <tbody>
  <?php
		while ($row = mysqli_fetch_array($query)){
      echo '
      <tr>
      <td style="text-align: center">'.$row['klicek'].'</td>
      <td style="text-align: center">'.$row['jmeno'].'</td>
      <td style="text-align: center">'.$row['prijmeni'].'</td>
      <td style="text-align: center">'.$row['cas'].'</td>
      <td style="text-align: center">'.$row['deti'].'</td>
      <td style="text-align: center">'.$row['dospelych'].'</td>
      </tr>';
		}?>
    </tbody>
</table>
<p>Mohou chybět vymazané žádosti.</p>
<div class="paticka" style="text-align: center;">
   <hr ><p style="text-align: center; font-size: 75%; border=0%; padding=0%"> Copyright &copy; 2018, <a href="https://buchticka.eu">Buchticka.eu</a> Team <!--<a href="mailto:posta@buchticka.eu" class="blind">posta@buchticka.eu</a>-->
   </p>
   </div>
   
   </div>
</div>
</div>

</body>
</html>