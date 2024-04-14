<form @submit.prevent="submitItem">
    <label for="zajezd_adr">adresa</label>
    <select id="zajezd_adr" x-model="newItem.fk_Adresa">
        <option>Vybrat</option>
        <template x-for="adresa in adresy" :key="adresa.id_Adresa">
            <option x-bind:value="adresa.id_Adresa" x-text="adresa.stat + ' - ' + adresa.mesto+ ', ' + adresa.ulice"></option>
        </template>
    </select>

    <label for="zajezd_strava">strava</label>
    <select id="zajezd_strava" x-model="newItem.fk_strava">
        <option>Vybrat</option>
        <template x-for="strava in stravy" :key="strava.id_strava">
            <option x-bind:value="strava.id_strava" x-text="strava.typ_stravy"></option>
        </template>
    </select>

    <textarea x-model="newItem.popis" placeholder="Popis"></textarea>

    <label for="zajezd_dateFrom">od</label>
    <input type="date" id="zajezd_dateFrom" x-model="newItem.datum_odjezdu"/>
    <label for="zajezd_dateTo">do</label>
    <input type="date" id="zajezd_dateTo" x-model="newItem.datum_prijezdu"/>
    <script>
        document.getElementById('zajezd_dateFrom').valueAsDate = new Date();
        document.getElementById('zajezd_dateTo').valueAsDate = new Date();
    </script>

    <label for="zajezd_cena">cena na osobu</label>
    <input type="number" id="zajezd_cena" x-model="newItem.cena_osoba" min="1">

    <button type="submit" class="btn btn--primary">Vložit</button>
</form>
