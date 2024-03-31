<script>
    function pocasiApp(place) {
        return {
            pocasi:[],
			delItem: { id: '', author_id: '', destination_id: '', description: ''},//input?
            fetchPocasi() {//zavolej API
                let url="https://wapi.pocasi.seznam.cz/v2/forecast?place_id="+place+"&include=current%2Cplace%2Centries%2Cdaily";
                console.log(url);
                fetch(url)
                    .then(Response => Response.json())
                    .then(data => {
                        this.pocasi = data.daily;
                    });
            },
            init() {//zavola metody
                this.fetchPocasi();
            }
        };
    }
</script>