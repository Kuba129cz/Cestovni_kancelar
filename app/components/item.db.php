  <template x-if="items.length>0">
      <template x-for="item in items" :key="item.id">
          <div class="item"><!--alpine je virtual tak musim pouzit realni DOM-->
              <span x-text="item.id"></span>
              <span x-text="item.time_stamp"></span>
              <span x-text="item.description"></span>
              <span x-text="item.dest_name"></span>
              <span x-text="item.author_id"></span>
          </div>                
      </template>
</template>
<template x-if="items.length===0">
  <div>null</div>
</template>

<?php include __DIR__.'/../api/endpoints/items/itemScript.inc.php'; ?>
