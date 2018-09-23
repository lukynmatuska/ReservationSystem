<?php
header("Content-Type: text/html;charset=UTF-8");
/*
$db_host = 'localhost'; // Server Name
$username = 'root'; // Username
$password = ''; // Password
$dbname = 'carodky2018'; // Database Name*/
include "./../dbconnect.php";

/*$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}*/
mysqli_query($conn, "SET NAMES 'UTF-8'");
$sql = 'SELECT * 
		FROM pisnicky_na_prani';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
 <html>
 <head>
    <meta charset="utf-8">
    <title>Objednáno - Čarodky Rudice</title> 
    <!-- load MUI -->
    <link href="//cdn.muicss.com/mui-0.9.30/css/mui.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-0.9.30/js/mui.min.js"></script>

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
<body>
	
		<table class="mui-table mui-table--bordered">
  <thead>
    <tr>
      <th>ID žádosti</th>
      <th>Kdo</th>
      <th>Komu</th>
      <th>Vzkaz</th>
      <th>Song</th>
      <th>Hotovo</th>
    </tr>
  </thead>
  <tbody>
    <!--<tr>
      <td>test</td>
      <td>Lukyn Matuška</td>
      <td>Martin the DJ</td>
      <td>Pro Martina<i class="em em-heart"></i></td>
      <td>Ofenbach - Be Mine✔️</td>
      <td>✔️✅</td>
    </tr>
    <tr>
      <td>test</td>
      <td>Objednavatel 2</td>
      <td>Příjimač 2</td>
      <td>Pozdravuju přijímače</td>
      <td>Scooter - How much is the fish?</td>
      <td>❌❎</td>
    </tr>     -->
  <?php
		while ($row = mysqli_fetch_array($query))
		{if($row['hotovo'] =! 0){
    $done = "Ne";    
    }else{
    $done = "Ano";
    }echo '
      <tr>
      <td>'.$row['id_zadosti'].'</td>
      <td>'.$row['kdo'].'</td>                  <!-- //kdo, komu, vzkaz, song--> 
      <td>'.$row['komu'].'</td>
      <td>'.$row['vzkaz'].'</td>
      <td>'.$row['song'].'</td>
      <td>'.$done.'</td>
      </tr>';
		}?>
    </tbody>
</table>
</body>
</html>