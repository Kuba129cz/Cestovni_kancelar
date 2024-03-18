<?php
    $title="dashboard";
    include __DIR__.'/../includes/parts/head.inc.php';
?>
    <body>
    <div class="container">
      <div class="row">
      <?php include __DIR__.'/../includes/layout/aside.inc.php'; ?>

      <?php include __DIR__.'/../components/ticketBox.inc.php'; ?>
      
        <main class="col-9">main (col9)</main>
      </div>
    </div>
  </body>
  <?php include __DIR__.'/../includes/parts/footer.inc.php'; ?>
  <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
</html>
    
    
