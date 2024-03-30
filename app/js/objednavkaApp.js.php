<script>
    function objednavkaApp(filtr) {
        return {
            objednavky:[],
			delItem: { id: '', author_id: '', destination_id: '', description: ''},//input?
            fetchObjednavky() {//zavolej API
                fetch('/app/api/endpoints/Objednavka/filter.php', {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify({where:filtr})
					})
                    .then(Response => Response.json())
                    .then(data => {
                        this.objednavky = data;
                    });
            },
            init() {//zavola metody
                this.fetchObjednavky();
            }
        };
    }
</script>