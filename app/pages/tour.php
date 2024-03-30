<?php
    $title="tour";
    include __DIR__.'/../includes/parts/head.inc.php';
?>
    <body x-data="{ open: false }">
    <?php include __DIR__.'/../components/header.inc.php'; ?>
    <div class="container">
      <div class="row">
        <?php include __DIR__.'/../components/aside.inc.php'; ?>
    
        <main class="col-9">
            <div x-data="detailApp('id_zajezd=1')">
                <span x-text="zajezd.stat + ' - ' + zajezd.mesto"></span>
                <span x-text="zajezd.cena_osoba"></span>
            </div>
        </main>
      </div>
    </div>
  </body>
  <?php include __DIR__.'/../components/footer.inc.php'; ?>
  <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
  <?php include __DIR__.'/../js/detailApp.js.php'; ?>
</html>