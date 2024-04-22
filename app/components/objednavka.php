<template x-if="objednavky.length>0">
  <template x-for="objednavka in objednavky" :key="objednavka.id_objednavka">
    <div class="item"><!--alpine je virtual tak musim pouzit realni DOM-->
      <div class="sidePair">
        <span>ID: </span>
        <span x-text="objednavka.id_objednavka"></span>
      </div>
      <div class="sidePair long-pair">
        <!--<span>destinace</span>-->
        <span x-text="objednavka.stat + ' - ' + objednavka.mesto"></span>
        <!--<span x-text="objednavka.stat"></span>
        <span x-text="objednavka.mesto"></span>-->
      </div>
      <div class="sidePair long-pair">
        <span>termín: </span>
        <span x-text="objednavka.datum_prijezdu + ' - ' + objednavka.datum_odjezdu"></span>
      </div>
      <div class="sidePair">
        <span>cena: </span>
        <span x-text="objednavka.cena_celkem + '&nbsp;Kč'"></span>
      </div>
      <a class="btn btn--small DX-find" x-bind:href="'/tour?id=' + objednavka.id_zajezd"></a>
    </div>               
  </template>
</template>
<template x-if="objednavky.length===0">
  <div>žádná objednávka</div>
</template>