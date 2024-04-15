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
                fetch('/app/api/endpoints/objednavka/', {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify(this.newItem)
					}).then(() => {
						this.newItem.fk_zajezd = '';
                        this.newItem.fk_zakaznik = '';
                        this.newItem.pocet_osob = 0;
					});
				},
            init() {//zavola metody
                if(filtr.charAt(filtr.length - 1)=='=')               
                {
                   //window.location.replace("./404");
                   alert("chybí ?id");
                }
                else
                {
                    //this.fetchZajezdy();
                }
            }
        };
    }
</script>