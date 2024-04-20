<form @submit.prevent="submitItem">
    <div class="flex">
        <label for="zajezd_adr">adresa</label>
            <select id="zajezd_adr" x-model="newItem.fk_Adresa">
            <option>Vybrat</option><div>
            <template x-for="adresa in adresy" :key="adresa.id_Adresa">
         <option x-bind:value="adresa.id_Adresa" x-text="adresa.stat + ' - ' + adresa.mesto+ ', ' + adresa.ulice"></option>
        </template>
        </select>

        <div> <label for="zajezd_strava">strava</label></div>
        <select id="zajezd_strava" x-model="newItem.fk_strava">
        <div><option>Vybrat</option></div>
        <template x-for="strava in stravy" :key="strava.id_strava"></div>
        <div><option x-bind:value="strava.id_strava" x-text="strava.typ_stravy"></option>
        </template>
        </select>
    


        <div><label for="zajezd_cena">cena na osobu</label></div>
        <div><input type="number" id="zajezd_cena" x-model="newItem.cena_osoba" min="1"></div>
        </div>

        <div clas="flex-date">
            <div><label for="zajezd_dateFrom">od</label></div>
            <div><input type="date" id="zajezd_dateFrom" x-model="newItem.datum_odjezdu"/></div>
            <div><label for="zajezd_dateTo">do</label></div>
            <div><input type="date" id="zajezd_dateTo" x-model="newItem.datum_prijezdu"/></div>
            <script>
                document.getElementById('zajezd_dateFrom').valueAsDate = new Date();
                document.getElementById('zajezd_dateTo').valueAsDate = new Date();
             </script>

        </div>


        <div clas="flex-btn">
            <div><textarea x-model="newItem.popis" placeholder="Popis" style="width: 850px; height: 88px;"></textarea></div>
            <div><button type="submit" class="btn btn--primary">Vložit</button></div>
        </div>
    
</form>
