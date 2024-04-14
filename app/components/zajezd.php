  

  <template x-if="zajezdy.length>0">
      <template x-for="zajezd in zajezdy" :key="zajezd.id_zajezd">
            <div class="grid-container">
            <div class="cena">Price: <span x-text="zajezd.cena_osoba"></span> Kč</div>
            <div class="nazev"><span x-text="zajezd.mesto"></span>/<span x-text="zajezd.stat"></span></div> <!--Název-->
            <div class="prijezd">From: <span x-text="zajezd.datum_prijezdu"></span></div>  
            <div class="objednat"><a class="btn-order" x-bind:href="'/tour?id=' + zajezd.id_zajezd">Nekup to !</a></div>
            <div class="odjezd">To: <span x-text="zajezd.datum_odjezdu"></span></div>
            <div class="hodnoceni">Rating:<span x-text="zajezd.hodnoceni"></span> </div>
            </div> 
      </template>
    
      </template>
    <template x-if="zajezdy.length===0">
  <div>null</div>
  </template>

  
    
 
 
