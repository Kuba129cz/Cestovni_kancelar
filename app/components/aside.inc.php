<aside class="aside col-3" x-bind:class="{ 'aside--close': open }">
    <div>    
        <a href="#" class="btn btn--primary DX-menu" @click="open = !open"></a>
    </div>
    <form @submit.prevent="applyFiltr" x-bind:class="{ 'sidemenu--close': open }">

        <div class="sideGroup">
            <div class="sidePair">
                <span>od</span>
                <input type="date" id="dateFrom" name="trip-start"/>
            </div>
            <div class="sidePair">
                <span>do</span>
                <input type="date" id="dateTo" name="trip-end"/>
            </div>
            <script>
              document.getElementById('dateFrom').valueAsDate = new Date();
              document.getElementById('dateTo').valueAsDate = new Date();
            </script>
        </div>

        <div class="sideGroup">
            <div class="sidePair">
                <span>destinace</span>
                <select x-model="sideFiltr.fk_Adresa">
                    <option>Vybrat</option>
                    <template x-for="adresa in adresy" :key="adresa.id_Adresa">
                        <option x-bind:value="adresa.id_Adresa" x-text="adresa.stat + ' - ' + adresa.mesto"></option>
                    </template>
                </select>
            </div>
            <div class="sidePair">
                <span>typ stravy</span>
                <select x-model="sideFiltr.fk_strava">
                    <option>Vybrat</option>
                    <template x-for="strava in stravy" :key="strava.id_strava">
                        <option x-bind:value="strava.id_strava" x-text="strava.typ"></option>
                    </template>
                </select>
            </div>
        </div>

        <div class="sideGroup">
            <div class="sidePair">
                <span>cena</span>
                <input type="range" id="cena_slider" name="cena_slider" 
                    x-bind:min="filtrLimit.cena_min" x-bind:max="filtrLimit.cena_max" 
                    x-bind:value="filtrLimit.cena_max" oninput="changeNumericValue(this.value)" class="slider">                
            </div>
            <div class="sidePair">
                <span x-text="filtrLimit.cena_min"></span>
                <input x-model="sideFiltr.cena_osoba" type="number" id="cena_numer" name="cena_numer" 
                    x-bind:min="filtrLimit.cena_min" x-bind:max="filtrLimit.cena_max" 
                    x-bind:value="filtrLimit.cena_max" onkeyup="changeRangeValue(this.value)" class="numeric">                       
            </div>
            <script>
                function changeRangeValue(val){
                    document.getElementById("cena_slider").value = val;
                }

                function changeNumericValue(val){
                    document.getElementById("cena_numer").value = val;
                }
            </script>
        </div>

        <button>filtruj</button>
    </form>
</aside>