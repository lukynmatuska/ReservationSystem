<?php
header("Content-Type: text/html;charset=UTF-8");
/*
$db_host = 'localhost'; // Server Name
$username = 'root'; // Username
$password = ''; // Password
$dbname = 'carodky2018'; // Database Name*/
include "./../../dbconnect.php";

/*$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}*/
mysqli_query($conn, "SET NAMES 'UTF-8'");
$sql = 'SELECT * 
		FROM zpetna_vazba';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
 <html>
 <head>
    <meta charset="utf-8">
    <title>Data from MySQL</title> 
    <!-- load MUI -->
    <link href="//cdn.muicss.com/mui-0.9.30/css/mui.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-0.9.30/js/mui.min.js"></script>

    </head>
<body>
	
		<table class="mui-table mui-table--bordered">
  <thead>
    <tr>
      <th>Číslo vzkazu</th>
      <th>Zpětná vazba</th>
    </tr>
  </thead>
  <tbody>
    <!--<tr>
      <td>Lukyn Matuška</td>
      <td>Martin the DJ</td>
      <td>Pro Martina<i class="em em-heart"></i></td>
      <td>Ofenbach - Be Mine✔️</td>
      <td>✔️✅</td>
    </tr>-->
    <!--<tr>
      <td>Objednavatel 2</td>
      <td>Příjimač 2</td>
      <td>Pozdravuju přijímače</td>
      <td>Scooter - How much is the fish?</td>
      <td>❌❎</td>
    </tr>-->
  <?php
		$no 	= 1;
		while ($row = mysqli_fetch_array($query))
		{
    	//$vzkaz_zpetne_vazby  = $row['vzkaz_zpetne_vazby'] == 0 ? '' : number_format($row['vzkaz_zpetne_vazby']);
		//	$vzkaz_zpetne_vazby  = $row['vzkaz_zpetne_vazby'] == 0 ? '' : number_format($row['vzkaz_zpetne_vazby']);
			echo utf8_encode('
      <tr>
      <!--<td>'.$no.'</td>-->
      <!--<td>'.$row['vzkaz_zpetne_vazby'].'</td>-->
      <td>'.$row['id_vzkazu'].'</td>
      <td>'.$row['vzkaz_zpetne_vazby'].'</td>
      </tr>');
			$no++;
		}?>
    </tbody>
</table>
</body>
</html>