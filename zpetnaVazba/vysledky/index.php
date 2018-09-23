<?php
include '../../variables.php';
include "../../dbconnect.php";
include "../../header.php";
?>
  <meta http-equiv="refresh" content="20;url=./">
  <title>Výsledky - Zpětná vazba - Pohádkový les Rudice</title>
  <meta property="og:title" content="Zpětná vazba - Pohádkový les Rudice" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php print($_SERVER['REQUEST_URI']); ?>" />
  <meta property="og:image" content="https://pohles.buchticka.eu/background.jpg" />
  <meta property="og:description" content="Výsledky zpětné vazby" />

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
<body style="background-color: transparent; font-family: Trebuchet MS;">
  <div class="mui-container">
      <div style="background-color: rgba(255, 255, 255, 0.85);" class="mui-panel" >
        <div style="text-align:center">
          <h1 style="text-align:center">Výsledky - Zpětná vazba</h1>
          <?php include '../../menu.php'; ?>
          <?php
            header("Content-Type: text/html;charset=UTF-8");
            mysqli_query($conn, "SET NAMES 'UTF-8'");
            $sql = 'SELECT * FROM zpetna_vazba';
            $query = mysqli_query($conn, $sql);

            if (!$query) {
            	die ('SQL Error: ' . mysqli_error($conn));
            }
          ?>
 
		      <table class="mui-table mui-table--bordered">
          <thead>
            <tr>
              <th style="width: 12%">Číslo vzkazu</th>
              <th>Zpětná vazba</th>
            </tr>
          </thead>
          <tbody>
          <?php
        		$no 	= 1;
        		while ($row = mysqli_fetch_array($query))
        		{
        			echo '
              <tr>
              <td>'.$row['id_vzkazu'].'</td>
              <td>'.$row['vzkaz_zpetne_vazby'].'</td>
              </tr>';
        			$no++;
        		}
          ?>
          </tbody>
        </table>
      <div class="paticka" style="text-align: center;">
        <hr ><p style="text-align: center; font-size: 75%; border:0%; padding:0%"> Copyright &copy; 2018, <a href="https://buchticka.eu">Buchticka.eu</a> Team <!--<a href="mailto:posta@buchticka.eu" class="blind">posta@buchticka.eu</a>--></p>
      </div>
    </div>
  </div>
</div>

</body>
</html>