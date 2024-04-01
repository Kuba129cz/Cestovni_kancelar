<form @submit.prevent="submitItem">
    <select x-model="newItem.fk_Adresa">
        <option>Vybrat</option>
        <template x-for="adresa in adresy" :key="adresa.id_Adresa">
            <option x-bind:value="adresa.id_Adresa" x-text="adresa.stat + ' - ' + adresa.mesto+ ', ' + adresa.ulice"></option>
        </template>
    </select>

    <select x-model="newItem.fk_strava">
        <option>Vybrat</option>
        <template x-for="strava in stravy" :key="strava.id_strava">
            <option x-bind:value="strava.id_strava" x-text="strava.typ_stravy"></option>
        </template>
    </select>

    <textarea x-model="newItem.popis" placeholder="Popis"></textarea>

    <input type="date" id="dateFrom" x-model="newItem.datum_odjezdu"/>
    <input type="date" id="dateTo" x-model="newItem.datum_prijezdu"/>
    <script>
        document.getElementById('dateFrom').valueAsDate = new Date();
        document.getElementById('dateTo').valueAsDate = new Date();
    </script>

    <input type="number" id="cena_numer" x-model="newItem.cena_osoba" min="1">

    <button type="submit" class="btn btn--primary">Vložit</button>
</form>
