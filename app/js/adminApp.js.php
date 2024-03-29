<script>
    function adminApp_new() {
        return {
            zajezdy:[],
            adresy: [], // output
            stravy: [], // output
            newItem: { author_id: '', destination_id: '', description: '' },//input submit
			delItem: { id: '', author_id: '', destination_id: '', description: ''},//input?
            fetchZajezdy() {//zavolej API
                fetch('/app/api/endpoints/Zajezd')
                    .then(Response => Response.json())
                    .then(data => {
                        this.zajezdy = data;
                    });
            },
            fetchAdrs() {//zavolej API
                fetch('/app/api/endpoints/Adresa')
                    .then(Response => Response.json())
                    .then(data => {
                        this.adresy = data;
                    });
            },
            fetchStrava() {//zavolej API
                fetch('/app/api/endpoints/Strava')
                    .then(Response => Response.json())
                    .then(data => {
                        this.stravy = data;
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
						this.fetchZajezdy();
					});
				},
            init() {//zavola metody
                this.fetchZajezdy();
                this.fetchAdrs();
                this.fetchStrava();
            }
        };
    }
</script>