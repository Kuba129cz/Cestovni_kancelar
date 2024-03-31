<script>
    function prehledApp(filtr) {
        return {
            zajezdy:[],
            adresy: [], // output
            stravy: [], // output
            filtrLimit: { cena_min: 0, cena_max: 0, },//input submit
            sideFiltr: { datum_prijezdu: '', datum_odjezdu: '',cena_osoba: 0, popis: '',fk_strava:'',fk_Adresa:''},//input submit
            fetchZajezdy() {//zavolej API
                fetch('/app/api/endpoints/Zajezd')
                    .then(Response => Response.json())
                    .then(data => {
                        this.zajezdy = data;
                    });
            },
            fetchZajezdy_filtr() {//zavolej API
                fetch('/app/api/endpoints/Zajezd/filter.php', {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify({where:filtr})
					})
                    .then(Response => Response.json())
                    .then(data => {
                        this.zajezdy = data;
                        this.filtrLimit.cena_max = data.reduce((max, obj) => Math.max(max, obj.cena_osoba), 0);
                        this.filtrLimit.cena_min = data.reduce((min, obj) => Math.min(min, obj.cena_osoba), Infinity);
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
            init() {//zavola metody
                if(!filtr)
                {
                    console.log("nefiltrovano");
                    this.fetchZajezdy();
                }
                else
                {
                    this.fetchZajezdy_filtr(filtr);
                }
                this.fetchAdrs();
                this.fetchStrava();
            }
        };
    }
</script>