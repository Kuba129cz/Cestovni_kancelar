<form @submit.prevent="submitItem">
    <select x-model="newItem.author_id">
        <option>Vybrat</option>
        <template x-for="adresa in adresy" :key="adresa.id_Adresa">
            <option x-bind:value="adresa.id_Adresa" x-text="adresa.stat + ' - ' + adresa.mesto+ ', ' + adresa.ulice"></option>
        </template>
    </select>

    <select x-model="newItem.destination_id">
        <option>Vybrat</option>
        <template x-for="strava in stravy" :key="strava.id_strava">
            <option x-bind:value="strava.id_strava" x-text="strava.typ"></option>
        </template>
    </select>

    <textarea x-model="newItem.description" placeholder="Popis"></textarea>

    <button type="submit" class="btn btn--primary">Vložit</button>
</form>
