<div x-data="adminApp()">
    <form @submit.prevent="submitTicket">
        <select x-model="newTicket.author_id">
            <option>Vybrat</option>
            <template x-for="author in authors" :key="author.id">
                <option x-bind:value="author.id" x-text="author.firstname + ' ' + author.lastname"></option>
            </template>
        </select>
        <select x-model="newTicket.priority_id">
            <option>Vybrat</option>
            <template x-for="priority in priorities" :key="priority.id">
                <option x-bind:value="priority.id" x-text="priority.name"></option>
            </template>
        </select>
        <textarea x-model="newTicket.description" placeholder="Popis"></textarea>
        <button type="submit" class="btn btn--primary">Vložit</button>
    </form>
</div>
