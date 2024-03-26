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
</script>