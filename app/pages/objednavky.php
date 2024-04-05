<?php
    $title="objednavky";
    include __DIR__.'/../includes/parts/head.inc.php';
?>
    <body x-data="{ open: false }">
    <?php include __DIR__.'/../components/header.inc.php'; ?>
    <div class="container">
      <?php include __DIR__.'/../components/aside.inc.php'; ?>
  
      <main class="col-9">
          <div x-data="objednavkaApp('fk_zakaznik>0')">
          <?php include __DIR__.'/../components/objednavka.php'; ?>
          </div>
      </main>
    </div>

    <?php include __DIR__.'/../components/footer.inc.php'; ?>
    <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
    <?php include __DIR__.'/../js/objednavkaApp.js.php'; ?>
  </body>
</html>