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
              <div x-data="adminApp()">
              <templat x-if="items.lenght>0">
              <template x-for="items in item" :key="item.id">
                <div>
                  <span x-text="item.id"></span>
                  <span x-text="time_stamp"></span>
                  <span x-text="description"></span>
                  <span x-text="destination_id"></span>
                  <span x-text="author_id"></span>
                </template>
              </template>
              <templat x-if="items.lenght==0"><div>null</div></template>
              </div>
            </div>
        </main>

      </div>
    </div>
  </body>
  <?php include __DIR__.'/../components/footer.inc.php'; ?>
  <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
</html>
