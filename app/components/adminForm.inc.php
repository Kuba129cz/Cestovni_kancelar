<form @submit.prevent="submitItem">
    <select x-model="newItem.author_id">
        <option>Vybrat</option>
        <template x-for="author in authors" :key="author.id">
            <option x-bind:value="author.id" x-text="author.firstname + ' ' + author.lastname"></option>
        </template>
    </select>
    <select x-model="newItem.destination_id">
        <option>Vybrat</option>
        <template x-for="destination in destinations" :key="destination.dest_id">
            <option x-bind:value="destination.dest_id" x-text="destination.dest_name"></option>
        </template>
    </select>
    <textarea x-model="newItem.description" placeholder="Popis"></textarea>
    <button type="submit" class="btn btn--primary">Vložit</button>
</form>
