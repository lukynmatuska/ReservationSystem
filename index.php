<?php
include './variables.php';
include "./dbconnect.php";
include "./header.php";
?>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <title>Přihláška - Pohádkový les Rudice</title>
  <meta property="og:title" content="Přihláška - Pohádkový les Rudice" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php print($_SERVER['REQUEST_URI']); ?>" />
  <meta property="og:image" content="https://pohles.buchticka.eu/background.jpg" />
  <meta property="og:description" content="Přihlaste své dítě ještě dnes na Pohádkový les do Rudice" />
  <style type="text/css">
  /* The Modal (background) */
  .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 5%; /* 100px Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }

  /* Modal Content */
  .modal-content {
      background-color: transparent; /* #fefefe; */
      margin: auto;
      padding: 20px; /* 20px */
      /* border: 1px solid #888; */
      width: 80%;
  }

  /* The Close Button */
  .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
  }

  .close:hover,
  .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
  }
  </style>

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
      <h2 style="text-align:center;">Přihláška</h2>
      <?php
      include 'menu.php';
      ?>
<?php
mysqli_query($conn, "SET NAMES 'UTF-8'");
  //$sql = 'SELECT * FROM muzi';
  $sql = 'SELECT * FROM casy ORDER BY cas';
  $query = mysqli_query($conn, $sql);

  if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
  }
?>
  <form class="mui-form" method="post" action="run.php">
    
  <div class="mui-select">
    <select name="cas">
      <?php
      while ($row = mysqli_fetch_array($query)){
        if ($row["obsazenost_casu"] < (string)10) {
          echo '<option value="'.$row["cas"].'">'.$row["cas"].'</option>';
        }else{
          echo '<option value="'.$row["cas"].'" disabled>'.$row["cas"].'</option>';
        }
        //echo '<option>'.$row["cas"].'</option>';
      }
      ?>
    </select>
    <label style="text-align: left; ">Čas <b style="color: red; ">*</b></label>
  </div>
  <div class="mui-textfield  mui-textfield--float-label">
    <input type="text" name="jmeno" id="jmeno" required >
    <label style="text-align: left; ">Jméno <b style="color: red; ">*</b></label>
  </div>
  <div class="mui-textfield  mui-textfield--float-label">
    <input type="text" name="prijmeni" id="prijmeni" required >
    <label style="text-align: left; ">Příjmení <b style="color: red; ">*</b></label>
  </div>
  <div class="mui-textfield mui-textfield--float-label">
    <input type="text" name="pocetDeti" id="pocetDeti" required >
    <label style="text-align: left; ">Počet dětí <b style="color: red; ">*</b></label>
  </div>
  <div class="mui-textfield mui-textfield--float-label">
    <input type="text" name="pocetDospelych" id="pocetDospelych" >
    <!--<label style="text-align: left; ">Jméno písničky <b style="color: red; ">*</b> / odkaz na Spotify / YouTube, atd.</label>-->
    <label style="text-align: left; ">Počet dospělých</label>
  </div>                        
  <div style="text-align: center; " align="center">
    <label style="border-bottom: 5px solid transparent; text-align: center;">Ověření ReCaptcha: <b style="color: red; ">*</b></label>
    <br>
    <div style="border-bottom: 10px solid transparent; " align="center" class="g-recaptcha" data-sitekey="6Ld1l0AUAAAAAEU00Mds60evT-RIID6_37V9UYX2"></div>
    <button  type="submit" class="mui-btn mui-btn--primary mui-btn--raised">Odeslat</button>
  </div>
</form>
<br>
<p style="text-align: center; font-size: 100%; border:0%; padding:0%"><b style="text-align: left; color: red; ">* </b> Povinné pole</p>
<p style="text-align: center; font-size:  85%; border:0%; padding:0%">Odeslání formuláře může chvíli trvat.</p>
<p style="text-align: center; font-size:  95%; border:0%; padding:0%">Pro zrušení, nebo změnu přihlášky nás kontaktujte na <a href="mailto:lukynmatuska@gmail.com">lukynmatuska@gmail.com</a>.</p>

  <div class="paticka" style="text-align: center;">
    <hr ><p style="text-align: center; font-size: 75%; border:0%; padding:0%"> Copyright &copy; 2018, <a href="https://buchticka.eu">Buchticka.eu</a> Team</p>
   </div>

   
   </div>
</div>
</div>
   <!--
  <div style="text-align: center;"><a href="https://www.toplist.cz"><script language="JavaScript" type="text/javascript">
<!--
document.write('<img src="https://toplist.cz/count.asp?id=1782012&logo=mc&http='+
escape(document.referrer)+'&t='+escape(document.title)+
'&wi='+escape(window.screen.width)+'&he='+escape(window.screen.height)+'&cd='+
escape(window.screen.colorDepth)+'" width="88" height="60" border=0 alt="TOPlist" />');
//--></script><noscript><img src="https://toplist.cz/count.asp?id=1782012&logo=mc" border="0"
alt="TOPlist" width="88" height="60" /></noscript></a>
</div>        <a style="color: transparent;" href="https://www.toplist.cz/stat/result/1782012/day-graph/browser/os/entry-page/referrer/resolution/color/country/?day=0">DETAILNÍ STATISTIKY</a>
-->


<!-- The Modal -->
<div id="myModal" class="modal">
      <!-- Modal content -->
  <div class="modal-content" style=" width: 75%; height: 75%;">
    <span class="close">&times;</span>
    <!-- <p>Some text in the Modal..</p> -->
    <iframe src="countdown/index.html" width="100%" height="95%" frameborder="0" align="baseline" scrolling="no" name="ramecek"></iframe>

  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    
</body>
</html>