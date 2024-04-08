  

  <template x-if="zajezdy.length>0">
      <template x-for="zajezd in zajezdy" :key="zajezd.id_zajezd">
            <div class="grid-container">
            <div class="item1">Price: <span x-text="zajezd.cena_osoba"></span></div>-
            <div class="item2"><span x-text="zajezd.mesto"></span>/<span x-text="zajezd.stat"></span></div> <!--Název-->
            <div class="item3">From: <span x-text="zajezd.datum_prijezdu"></span></div>  
            <div class="item4">Order:
            <button type="button"> <a x-bind:href="'/tour?id=' + zajezd.id_zajezd">klikni</a></button>

            </div>
            <div class="item5">To: <span x-text="zajezd.datum_odjezdu"></span></div>
            <div class="item6">Rating: </div>
            </div> 
      </template>
    
      </template>
    <template x-if="zajezdy.length===0">
  <div>null</div>
  </template>

  
    
 
 
