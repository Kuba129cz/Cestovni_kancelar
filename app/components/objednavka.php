<template x-if="objednavky.length>0">
  <template x-for="objednavka in objednavky" :key="objednavka.id_objednavka">
    <div class="grid-container"><!--alpine je virtual tak musim pouzit realni DOM-->
      <div class="cena">Price: <span x-text="objednavka.cena_celkem"></span> Kč</div>
      <div class="nazev"><span x-text="objednavka.mesto"></span>/<span x-text="objednavka.stat"></span></div> <!--Název-->
      <div class="prijezd">From: <span x-text="objednavka.datum_prijezdu"></span></div>  
      <div class="objednat"><a class="btn-order" x-bind:href="'/tour?id=' + objednavka.id_zajezd">Nekup to !</a></div>
      <div class="odjezd">To: <span x-text="objednavka.datum_odjezdu"></span></div>
      <div class="hodnoceni">Rating:<span x-text="objednavka.hodnoceni"></span> </div>
    </div>               
  </template>
</template>
<template x-if="objednavky.length===0">
  <div>žádná objednávka</div>
</template>