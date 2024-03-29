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
        <div x-data="adminApp()">
          <div class="row">
            <?php include __DIR__.'/../components/adminForm.inc.php'; ?>
          </div>
        </div><!--temp-->
        <div x-data="adminApp_new()"><!--temp-->
          <div class="row">
            <div style="width: 100%;"><!--wayaround nez nekdo fixne styly-->
              <?php include __DIR__.'/../components/zajezd.php'; ?>
            </div>
          </div>
        </div>
      </main>

    </div>
  </div>
</body>
<?php include __DIR__.'/../components/footer.inc.php'; ?>
<?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
<?php include __DIR__.'/../js/adminApp.js.php'; ?>

</html>