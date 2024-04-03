<?php
    $title="tuzemske";   

    $kategorie = array(
      "tuzemske" => array("tuzemske", "'stat=\'Česká republika\''"),
      "more" => array("more", "'kategorie=\'Moře\''")
  );
  $key = isset($_GET['k']) ? $_GET['k'] : null;

  $title= $kategorie[$key][0]; // Outputs: value1
  $filtr= $kategorie[$key][1]; // Outputs: value2
  
  include __DIR__.'/../includes/parts/head.inc.php';
?>
    <body x-data="{ open: false }">
    <?php include __DIR__.'/../components/header.inc.php'; ?>
    <div class="container" x-data="prehledApp(<?php echo"$filtr"?>)">
      <?php include __DIR__.'/../components/aside.inc.php'; ?>
  
      <main class="col-9">
        <?php include __DIR__.'/../components/zajezd.php'; ?>
      </main>
    </div>
  </body>
  <?php include __DIR__.'/../components/footer.inc.php'; ?>
  <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
  <?php include __DIR__.'/../js/prehledApp.js.php'; ?>
</html>
