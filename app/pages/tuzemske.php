<?php
    $title="tuzemske";
    include __DIR__.'/../includes/parts/head.inc.php';
?>
    <body x-data="{ open: false }">
    <?php include __DIR__.'/../components/header.inc.php'; ?>
    <div class="container">
      <?php include __DIR__.'/../components/aside.inc.php'; ?>
  
      <main class="col-9">
      <div x-data="prehledApp('stat=\'Česká republika\'')">
            <?php include __DIR__.'/../components/zajezd.php'; ?>
          </div>
      </main>
    </div>
  </body>
  <?php include __DIR__.'/../components/footer.inc.php'; ?>
  <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
  <?php include __DIR__.'/../js/prehledApp.js.php'; ?>
</html>
