<script src="//unpkg.com/alpinejs" defer></script>

<script>
    function adminApp() {
        return {
            items: [], // output
            destinations: [], // output
            authors: [], // output
            fetchItems() {//zavolej API
                fetch('/app/api/endpoints/items/index.php')
                    .then(Response => Response.json())
                    .then(data => {
                        this.items = data;
                    });
            },
            fetchDest() {//zavolej API
                fetch('/app/api/endpoints/destinations/index.php')
                    .then(Response => Response.json())
                    .then(data => {
                        this.destinations = data;
                    });
            },
            fetchAuthors() {//zavolej API
                fetch('/app/api/endpoints/Authors/index.php')
                    .then(Response => Response.json())
                    .then(data => {
                        this.authors = data;
                    });
            },
            init() {//zavola metody
                this.fetchItems();
                this.fetchDest();
                this.fetchAuthors();
            }
        };
    }
</script>