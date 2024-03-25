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

        <?php include __DIR__.'/../components/item.db.php'; ?>


          <div x-data="adminApp()">
            <template x-if="items.length>0">
              <template x-for="item in items" :key="item.id">
                <div><!--alpine je virtual tak musim pouzit realni DOM-->
                  <span x-text="item.id"></span>
                  <span x-text="item.time_stamp"></span>
                  <span x-text="item.description"></span>
                  <span x-text="item.destination_id"></span>
                  <span x-text="item.author_id"></span>
                </div>                
              </template>
            </template>


            <div>-------------------------</div>
            <template x-if="destinations.length>0">
              <template x-for="dest in destinations" :key="dest.id">
                <div><!--alpine je virtual tak musim pouzit realni DOM-->
                  <span x-text="dest.id"></span>
                  <span x-text="dest.name"></span>
                </div>                
              </template>
            </template>

            <div>-------------------------</div>
            <template x-if="authors.length>0">
              <template x-for="author in authors" :key="author.id">
                <div><!--alpine je virtual tak musim pouzit realni DOM-->
                  <span x-text="author.id"></span>
                  <span x-text="author.firstname"></span>
                  <span x-text="author.lastname"></span>
                </div>                
              </template>
            </template>

            <template x-if="items.length===0">
              <div>null</div>
            </template>
          </div>
        </div>
      </main>

    </div>
  </div>
</body>
<?php include __DIR__.'/../components/footer.inc.php'; ?>
<?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>

</html>