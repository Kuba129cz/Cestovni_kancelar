<script>
    function loginApp() {
        return {
            username:'',
            password:'',
			newZakaznik: { nick:'',password:'',telefon:'',email:'',jmeno: '', prijmeni: '',datum_narozeni: '',fk_Adresa:0},//input submit
            login(){
                fetch("/app/api/endpoints/login/", {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify({username: this.username, password: this.password})//convert to JSON + !!! password is unencrypted !!!
					})
					.then(Response => Response.json())
					.then(data => {
						if (data.success) {
							alert(data.message);
							window.location.href = '/'; // Redirect to the dashboard
						} else {
							alert(data.message);
						}
					})
					.catch(error => alert(error.message))
			},
			registruj() {
                /*fetch('/app/api/endpoints/objednavka/', {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify(this.newItem)
					}).then(() => {
						this.newItem.fk_zajezd = '';
                        this.newItem.fk_zakaznik = '';
                        this.newItem.pocet_osob = 0;
					});*/
					console.log(this.newZakaznik);
				},
            init() {//zavola metody

            }
        };
    }
</script>