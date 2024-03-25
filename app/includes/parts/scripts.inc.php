<script src="//unpkg.com/alpinejs" defer></script>

<script>
    function adminApp() {
        return {
            items: [], // output
            fetchItems() {//zavolej API
                fetch('/app/api/items/index.php')
                    .then(Response => Response.json())
                    .then(data => {
                        this.items = data;
                    });
                console.log(this.items);
            },
            init() {
                this.fetchItems();
            }
        };
    }
</script>