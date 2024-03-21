<?php
    $title="dashboard";
    include __DIR__.'/../includes/parts/head.inc.php';
?>
    <body x-data="{ open: false }">
    <div class="container">
      <div class="row">
      <?php include __DIR__.'/../includes/layout/aside.inc.php'; ?>

      
      
        <main class="col-9">
            main (col9)
            <div class="row">
                <!--
                <?php include __DIR__.'/../components/ticketBox.inc.php'; ?>
                <?php include __DIR__.'/../components/ticketBox.inc.php'; ?>
                -->
            </div>
            <div class="row">
                <?php include __DIR__.'/../components/item.inc.php'; ?>
                <?php include __DIR__.'/../components/item.inc.php'; ?>
            </div>
        </main>
      </div>
    </div>
  </body>
  <?php include __DIR__.'/../components/footer.inc.php'; ?>
  <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
</html>
