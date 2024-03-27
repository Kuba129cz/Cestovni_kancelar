<script>
    function loadItems() {
        return {
            items: [], // output           
            fetchItems() {//zavolej API
                fetch('/app/api/endpoints/items/index.php')
                    .then(Response => Response.json())
                    .then(data => {
                        this.items = data;
                    });
            },
            init() {//zavola metody
                this.fetchItems();
            }
        };
    }
    function loadItemsFilter(filtr) {
        return {
            items: [], // output           
            fetchItems() {//zavolej API
                fetch('/app/api/endpoints/items/filter.php', {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify({where:filtr})
					})
                    .then(Response => Response.json())
                    .then(data => {
                        this.items = data;
                    });
                    alert(where);
            },           
            init() {//zavola metody
                this.fetchItems();
            }
        };
    }
</script>