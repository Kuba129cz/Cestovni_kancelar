<script>
    function detailApp(filtr) {
        return {
            zajezd:'',
            newItem: { fk_zajezd: '', fk_zakaznik: '',pocet_osob: 0},//input submit
            fetchZajezdy() {//zavolej API
                fetch('/app/api/endpoints/zajezd/filter.php', {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify({where:filtr})
					})
                    .then(Response => Response.json())
                    .then(data => {
                        if(data.length==0)
                        {                           
                           //window.location.replace("./404");
                           alert("404");
                        }
                        this.zajezd = data[0];                       
                    });
            },
            submitItem() {
                console.log("neimplementováno");
				/*	
                fetch('/app/api/endpoints/objednavky/', {
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
                    */
				},
            init() {//zavola metody
                if(filtr.charAt(filtr.length - 1)=='=')               
                {
                   //window.location.replace("./404");
                   alert("chybí ?id");
                }
                else
                {
                    this.fetchZajezdy();
                }
            }
        };
    }
</script>