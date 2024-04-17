<script>
    function loginApp() {
        return {
            username:'',
            password:'',
			newZakaznik: { nick:'',password:'',telefon:'',email:'',jmeno: '', prijmeni: '',datum_narozeni: '',fk_Adresa:1},//input submit
            login(){
                fetch("/app/api/endpoints/login/", {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify({username: this.username, password: this.password})//convert to JSON + !!! password is unencrypted !!!
					})
					.then(Response => Response.json())
					.then(data => {
						if (data.success) {
							//alert(data.message);
							window.location.href = '/'; // Redirect to the dashboard
						} else {
							alert(data.message);
						}
					})
					.catch(error => alert(error.message))
			},
			registruj() {
                fetch('/app/api/endpoints/login/register.php', {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify(this.newZakaznik)
					})
					.then(Response => Response.json())
					.then(data => {
						if (data.success) {
							//alert(data.message);
							window.location.href = '/login'; // Redirect to the dashboard
						} else {
							alert(data.message);
						}
					});
			},
            init() {//zavola metody

            }
        };
    }
</script>