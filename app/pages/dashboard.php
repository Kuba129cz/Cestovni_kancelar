<?php
    $title="dashboard";
    include __DIR__.'/../includes/parts/head.inc.php';
?>
    <body x-data="{ open: false }">
    <?php include __DIR__.'/../components/header.inc.php'; ?>
    <div class="container" x-data="prehledApp()">
      <?php include __DIR__.'/../components/aside.inc.php'; ?>
   
      <main class="col-9">
          <div class="row">
            <!--ponecháno pouze jako vzor po nastylování smazat-->
              <?php include __DIR__.'/../components/item.inc.php'; ?>
              <?php include __DIR__.'/../components/item.inc.php'; ?>
          </div>
        <?php include __DIR__.'/../components/zajezd.php'; ?>

      </main>
    </div>
  </body>
  <?php include __DIR__.'/../components/footer.inc.php'; ?>
  <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
  <?php include __DIR__.'/../js/prehledApp.js.php'; ?>
</html>
