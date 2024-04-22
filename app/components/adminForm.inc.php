<form @submit.prevent="submitItem">

<div class="zarovnat">
    <div class="flex">
        <div>
            <label for="zajezd_adr">Adresa: </label>
            <select id="zajezd_adr" x-model="newItem.fk_Adresa">
                <option>Vybrat</option>
                <template x-for="adresa in adresy" :key="adresa.id_Adresa">
                    <option x-bind:value="adresa.id_Adresa"
                        x-text="adresa.stat + ' - ' + adresa.mesto+ ', ' + adresa.ulice"></option>
                </template>
            </select>
        </div>
        <div>
            <label for="zajezd_strava">Strava:</label>
            <select id="zajezd_strava" x-model="newItem.fk_strava">
                <option>Vybrat:</option>
                <template x-for="strava in stravy" :key="strava.id_strava">
                <option x-bind:value="strava.id_strava" x-text="strava.typ_stravy"></option>
                </template>
            </select>
        </div>
        <div>
            <label for="zajezd_dateFrom">Od:</label>
            <input type="date" id="zajezd_dateFrom" x-model="newItem.datum_odjezdu" />
            <label for="zajezd_dateTo">Do:</label>
            <input type="date" id="zajezd_dateTo" x-model="newItem.datum_prijezdu" />
            <script>
                document.getElementById('zajezd_dateFrom').valueAsDate = new Date();
                document.getElementById('zajezd_dateTo').valueAsDate = new Date();
            </script>
        </div>
        <div>
            <label for="zajezd_cena">Cena na osobu:</label>
            <input type="number" id="zajezd_cena" x-model="newItem.cena_osoba" min="1">
        </div>
    </div>
    <div class="flex-btn">
        <div><textarea x-model="newItem.popis" placeholder="Popis" class = "area"></textarea></div>
        <div><button type="submit" class="btn btn--primary">Vložit</button></div>
    </div>
</div>
</form>
