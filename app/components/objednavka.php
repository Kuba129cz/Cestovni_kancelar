  <template x-if="objednavky.length>0">
      <template x-for="objednavka in objednavky" :key="objednavka.id_objednavka">
          <div class="item"><!--alpine je virtual tak musim pouzit realni DOM-->
              <span x-text="objednavka.stat + ' - ' + objednavka.mesto"></span>
              <span x-text="objednavka.datum_prijezdu"></span>
              <span x-text="objednavka.datum_odjezdu"></span>

          </div>                
      </template>
</template>
<template x-if="objednavky.length===0">
  <div>null</div>
</template>