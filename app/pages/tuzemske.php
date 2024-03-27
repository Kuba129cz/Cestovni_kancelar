<?php
    $title="tuzemske";
    include __DIR__.'/../includes/parts/head.inc.php';
?>
    <body x-data="{ open: false }">
    <?php include __DIR__.'/../components/header.inc.php'; ?>
    <div class="container">
      <div class="row">
        <?php include __DIR__.'/../components/aside.inc.php'; ?>
    
        <main class="col-9">
            <div x-data="loadItemsFilter('destination_id=2')">
              <?php include __DIR__.'/../components/item.db.php'; ?>
            </div>
        </main>
      </div>
    </div>
  </body>
  <?php include __DIR__.'/../components/footer.inc.php'; ?>
  <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
  <?php include __DIR__.'/../api/endpoints/items/itemScript.inc.php'; ?>
</html>
