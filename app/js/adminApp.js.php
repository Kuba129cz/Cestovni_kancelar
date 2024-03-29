<script>
    function adminApp_new() {
        return {
            zajezdy:[],
            adresy: [], // output
            stravy: [], // output
            newItem: { datum_prijezdu: '', datum_odjezdu: '',cena_osoba: 0, popis: '',fk_strava:'',fk_Adresa:''},//input submit
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
					fetch('/app/api/endpoints/zajezd/', {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify(this.newItem)
					}).then(() => {
						this.newItem.datum_prijezdu = '';
                        this.newItem.datum_odjezdu = '';
                        this.newItem.cena_osoba = '';
                        this.newItem.popis = '';
						this.newItem.fk_strava = '';
						this.newItem.fk_Adresa = '';
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