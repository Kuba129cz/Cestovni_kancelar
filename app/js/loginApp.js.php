<script>
    function loginApp() {
        return {
            username:'',
            password:'',
            login(){
                fetch("/app/api/endpoints/login", {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify({username:this.username,password:this.password})
					})
                    .then(Response => Response.json())
                    .then(data => {
                        if(data.success){alert("ok");}
                        if(data.success){alert("fuck off");}
                    })
                    .catch(error=>alert(error.message));
            },
            fetchZajezdy() {//zavolej API
                fetch('/app/api/endpoints/Zajezd')
                    .then(Response => Response.json())
                    .then(data => {
                        this.zajezdy = data;
                    });
            },
            init() {//zavola metody

            }
        };
    }
</script>