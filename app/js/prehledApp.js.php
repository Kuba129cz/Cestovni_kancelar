<script>
    function prehledApp(filtr) {
        return {
            zajezdy:[], // output
            adresy: [], // output
            stravy: [], // output
            filtr,//kopie inputu
            filtrLimit: { cena_min: 0, cena_max: 0, },//limity pro filtr
            sideFiltr: { datum_prijezdu: '', datum_odjezdu: '',cena_osoba: 0, fk_strava:'',fk_Adresa:''},//input submit
            orderdir:{hodnoceni:false,cena_osoba:false,datum_odjezdu:false},
            orderAct:{hodnoceni:true,cena_osoba:false,datum_odjezdu:false},
            orderLock:false,//brani zacykleni watchera
            fetchZajezdy_filtr() {//zavolej API
                fetch('/app/api/endpoints/Zajezd/filter.php', {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify({where:this.filtr})
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
            applyFiltr() {//zavolej API
                if(this.sideFiltr.fk_strava=='Vybrat'){this.sideFiltr.fk_strava='';}
                if(this.sideFiltr.fk_Adresa=='Vybrat'){this.sideFiltr.fk_Adresa='';}

                let where=this.filtr?this.filtr:"id_zajezd>0";//tautologie aby se to nesesypalo kvůli AND
                if(this.sideFiltr.datum_prijezdu){where+=" AND datum_prijezdu='"+this.sideFiltr.datum_prijezdu+"'";}
                if(this.sideFiltr.datum_odjezdu){where+=" AND datum_odjezdu='"+this.sideFiltr.datum_odjezdu+"'";}
                if(this.sideFiltr.cena_osoba){where+=" AND cena_osoba<="+this.sideFiltr.cena_osoba;}
                if(this.sideFiltr.fk_strava){where+=" AND fk_strava="+this.sideFiltr.fk_strava;}
                if(this.sideFiltr.fk_Adresa){where+=" AND fk_Adresa="+this.sideFiltr.fk_Adresa;}
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
                this.fetchZajezdy_filtr();
            },
            orderBy(atribut){
                /*var desc=this.orderdir[atribut]
                const ordered = sortByAttribute(this.zajezdy, atribut,desc);
                this.zajezdy=ordered;
                console.log(`Sorted by ${atribut} (${desc?'desc':'asc'}):`, ordered);

                this.orderdir[atribut]=!this.orderdir[atribut];
                this.orderAct={hodnoceni:false,cena_osoba:false,datum_odjezdu:false};
                this.orderAct[atribut]=true;*/
                var result = shared_orderBy(atribut, this.orderdir, this.zajezdy, this.orderAct);
                this.zajezdy = result.ordered;
                this.orderdir = result.orderdir;
                this.orderAct = result.orderAct;
            },
            init() {//zavola metody
                this.filtr=filtr?filtr:"id_zajezd>0";//tautologie aby se to nesesypalo kvůli AND
                this.fetchZajezdy_filtr();
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