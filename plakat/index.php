<?php
include '../variables.php';
include "../dbconnect.php";
include "../header.php";
?>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <title>Plakát - Pohádkový les Rudice</title>
  <meta property="og:title" content="Plakát - Pohádkový les Rudice" />
  <meta property="og:type" content="websites" />
  <meta property="og:url" content="<?php print($_SERVER['REQUEST_URI']); ?>" />
  <meta property="og:image" content="https://pohles.buchticka.eu/background.jpg" />
  <meta property="og:description" content="Letošní plakát" />

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
    <div style="background-color: rgba( 255, 255, 255, 0.85);" class="mui-panel" >
      <div style="text-align:center">
        <h1 style="text-align:center">Pohádkový les Rudice</h1>
        <h2 style="text-align:center">Plakát</h2>
        <?php include '../menu.php'; ?>
        <img src="plakat.png" style="width: 100%; ">
        <div class="paticka" style="text-alig: center;">
          <hr ><p style="text-align: center; font-size: 75%; border: 0%; padding: 0%"> Copyright &copy; 2018, <a href="https://buchticka.eu">Buchticka.eu</a> Team <!--<a href="mailto:posta@buchticka.eu" class="blind">posta@buchticka.eu</a>--></p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>