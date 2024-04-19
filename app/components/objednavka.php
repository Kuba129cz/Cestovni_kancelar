<template x-if="objednavky.length>0">
  <template x-for="objednavka in objednavky" :key="objednavka.id_objednavka">
    <div class="item"><!--alpine je virtual tak musim pouzit realni DOM-->
      <span x-text="objednavka.id_objednavka"></span>
      <span x-text="objednavka.stat + ' - ' + objednavka.mesto"></span>
      <span x-text="objednavka.datum_prijezdu + ' - ' + objednavka.datum_odjezdu"></span>
      <span x-text="objednavka.cena_celkem + ' Kč'"></span>
      <a class="btn btn--small DX-find" x-bind:href="'/tour?id=' + objednavka.id_zajezd"></a>
    </div>               
  </template>
</template>
<template x-if="objednavky.length===0">
  <div>žádná objednávka</div>
</template>