<script src="//unpkg.com/alpinejs" defer></script>

<script>
    function adminApp() {
        return {
            items:[],
            destinations: [], // output
            authors: [], // output
            newItem: { author_id: '', destination_id: '', description: '' },//input submit
			delItem: { id: '', author_id: '', destination_id: '', description: ''},//input?
            fetchItems() {//zavolej API
                fetch('/app/api/endpoints/items/index.php')
                    .then(Response => Response.json())
                    .then(data => {
                        this.items = data;
                    });
            },
            fetchDest() {//zavolej API
                fetch('/app/api/endpoints/destinations/index.php')
                    .then(Response => Response.json())
                    .then(data => {
                        this.destinations = data;
                    });
            },
            fetchAuthors() {//zavolej API
                fetch('/app/api/endpoints/Authors/index.php')
                    .then(Response => Response.json())
                    .then(data => {
                        this.authors = data;
                    });
            },
            submitItem() {
					// console.log(this.newTicket);
					fetch('/app/api/endpoints/items/index.php', {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify(this.newItem)
					}).then(() => {
						this.newItem.author_id = '';
						this.newItem.description = '';
						this.newItem.destination_id = '';
						this.fetchItems();
					});
				},
            init() {//zavola metody
                this.fetchItems();
                this.fetchDest();
                this.fetchAuthors();
            }
        };
    }
</script>