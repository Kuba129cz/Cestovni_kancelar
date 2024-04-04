<?php
    $title="dashboard";
    include __DIR__.'/../includes/parts/head.inc.php';
?>
    <body x-data="{ open: false }">
    <div class="container-grid-dashboard" x-data="prehledApp()">
      <?php include __DIR__.'/../components/header.inc.php'; ?>
      <?php include __DIR__.'/../components/aside.inc.php'; ?>
   
      <main class="main-grid-dashboard"class="col-9">
          <div class="row">
            <!--ponecháno pouze jako vzor po nastylování smazat-->
              <?php include __DIR__.'/../components/item.inc.php'; ?>
              <?php include __DIR__.'/../components/item.inc.php'; ?>
          </div>
        <?php include __DIR__.'/../components/zajezd.php'; ?>
      </main>
      
    <?php include __DIR__.'/../components/footer.inc.php'; ?>
    </div>
    <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
    <?php include __DIR__.'/../js/prehledApp.js.php'; ?>
  </body>
</html>
