<?php
    $title="admin";
    include __DIR__.'/../includes/parts/head.inc.php';
?>
    <body x-data="{ open: false }">
    <?php include __DIR__.'/../components/header.inc.php'; ?>
    <div class="container">
      <div class="row">
      <?php include __DIR__.'/../components/aside.inc.php'; ?>     
      
        <main class="col-9">
            <div class="row">
              <div x-date="adminApp()">
              
              </div>
            </div>
        </main>

      </div>
    </div>
  </body>
  <?php include __DIR__.'/../components/footer.inc.php'; ?>
  <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
</html>
