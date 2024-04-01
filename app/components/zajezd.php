  <template x-if="zajezdy.length>0">
      <template x-for="zajezd in zajezdy" :key="zajezd.id_zajezd">
          <div class="item"><!--alpine je virtual tak musim pouzit realni DOM-->
              <span x-text="zajezd.id_zajezd"></span>
              <span x-text="zajezd.datum_prijezdu"></span>
              <span x-text="zajezd.datum_odjezdu"></span>
              <span x-text="zajezd.cena_osoba"></span>
              <!--<span x-text="zajezd.popis"></span>-->

              <span x-text="zajezd.typ_stravy"></span>

              <span x-text="zajezd.stat"></span>
              <span x-text="zajezd.mesto"></span>


          </div>                
      </template>
</template>
<template x-if="zajezdy.length===0">
  <div>null</div>
</template>