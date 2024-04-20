<template x-if="zajezdy.length>0">
  <template x-for="zajezd in zajezdy" :key="zajezd.id_zajezd">
    <div class="grid-container"><!--alpine je virtual tak musim pouzit realni DOM-->
      <div class="cena">Price: <span x-text="zajezd.cena_osoba"></span> Kč</div>
      <div class="nazev"><span x-text="zajezd.mesto"></span>/<span x-text="zajezd.stat"></span></div> <!--Název-->
      <div class="prijezd">From: <span x-text="zajezd.datum_prijezdu"></span></div>
      <div class="objednat col">
        <a class="btn btn--small DX-find" x-bind:href="'/tour?id=' + zajezd.id_zajezd"></a>
        <a class="btn btn--small DX-bin" @click="alert('click')" ></a>
        <!--<a class="btn btn--small DX-edit" @click="alert('click')" ></a>-->
      </div>
      <div class="odjezd">To: <span x-text="zajezd.datum_odjezdu"></span></div>
      <div class="hodnoceni">Rating:<span x-text="zajezd.hodnoceni"></span> </div>
    </div> 
  </template>   
</template>
<template x-if="zajezdy.length===0">
<div>žádný zájezd</div>
</template>