<script>
    function prehledApp() {
        return {
            zajezdy:[],
            adresy: [], // output
            stravy: [], // output
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
            init() {//zavola metody
                this.fetchZajezdy();
                this.fetchAdrs();
                this.fetchStrava();
            }
        };
    }
</script>