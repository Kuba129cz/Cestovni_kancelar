<script>
    function adminApp_new() {
        return {
            zajezdy:[],
            adresy: [], // output
            stravy: [], // output

            newItem: { datum_prijezdu: '', datum_odjezdu: '',cena_osoba: 0, popis: '',fk_strava:'',fk_Adresa:''},//input submit

            filtrLimit: { cena_min: 0, cena_max: 0, },//limity pro filtr
            sideFiltr: { datum_prijezdu: '', datum_odjezdu: '',cena_osoba: 0, fk_strava:'',fk_Adresa:''},//input submit
            orderdir:{hodnoceni:false,cena_osoba:false,datum_odjezdu:false},
            orderAct:{hodnoceni:true,cena_osoba:false,datum_odjezdu:false},
            orderLock:false,//brani zacykleni watchera

            fetchZajezdy() {//zavolej API
                fetch('/app/api/endpoints/Zajezd')
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
            submitItem() {
					// console.log(this.newTicket);
					fetch('/app/api/endpoints/zajezd/', {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify(this.newItem)
					})
                    .then(Response => Response.json())
					.then(data => {
						if (data.success) {
                            this.newItem.datum_prijezdu = '';
                            this.newItem.datum_odjezdu = '';
                            this.newItem.cena_osoba = '';
                            this.newItem.popis = '';
						    this.newItem.fk_strava = '';
						    this.newItem.fk_Adresa = '';
                            //this.newItem= { datum_prijezdu: '', datum_odjezdu: '',cena_osoba: 1, popis = '',fk_strava:'',fk_Adresa:''};
						    this.fetchZajezdy();
						} else {
							alert(data.message);
						}
					});
			},
            deleteItem(id) {
					// console.log(this.newTicket);
					fetch('/app/api/endpoints/zajezd/', {
						method: 'DELETE',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify({id_zajezd: id})
					})
                    .then(Response => Response.json())
					.then(data => {
						if (data.success) {
						    this.fetchZajezdy();
						} else {
							alert(data.message);
						}
					});
			},
            applyFiltr() {//zavolej API
                if(this.sideFiltr.fk_strava=='Vybrat'){this.sideFiltr.fk_strava='';}
                if(this.sideFiltr.fk_Adresa=='Vybrat'){this.sideFiltr.fk_Adresa='';}

                let where=buildWhere(this.sideFiltr, "id_zajezd>0");
                console.log(where);

                fetch('/app/api/endpoints/Zajezd/filter.php', {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify({where:where})
					})
                    .then(Response => Response.json())
                    .then(data => {
                        this.zajezdy = data;
                    });
            },
            resetFiltr() {
                this.sideFiltr= { datum_prijezdu: '', datum_odjezdu: '',cena_osoba: this.filtrLimit.cena_max, fk_strava:'',fk_Adresa:''};
                this.fetchZajezdy();
            },
            orderBy(atribut){
                var result = shared_orderBy(atribut, this.orderdir, this.zajezdy, this.orderAct);
                this.zajezdy = result.ordered;
                this.orderdir = result.orderdir;
                this.orderAct = result.orderAct;
            },
            init() {//zavola metody
                this.fetchZajezdy();
                this.fetchAdrs();
                this.fetchStrava();

                this.$watch('zajezdy', value => {
                    if(!this.orderLock)
                    {
                        const active = Object.keys(this.orderAct).filter(key => this.orderAct[key] === true);
                        const atribut=active[0];
                        this.orderdir[atribut]=!this.orderdir[atribut];//aby byl stejný jako je ted (negace negace po skončení)
                        this.orderBy(atribut);
                        this.orderLock=true;
                    }
                    else{
                        this.orderLock=!this.orderLock
                    }                   
                });
            }
        };
    }
</script>
<?php include __DIR__.'/side.js.inc.php'; ?>