<script>
    function loadDestinations() {
        return {
            destinations: [], // output           
            fetchDest() {//zavolej API
                fetch('/app/api/endpoints/destinations/index.php')
                    .then(Response => Response.json())
                    .then(data => {
                        this.destinations = data;
                    });
            },
            init() {//zavola metody
                this.fetchdest();
            }
        };
    }
</script>