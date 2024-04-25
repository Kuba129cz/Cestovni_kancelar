<header>
    <div class="userPanel">
        <div class="dropdown">
            <div class="center-div">
                <img class="img-icon" src="app\resources\images\icons\user.png" alt="User Icon">           
            </div>
            <div class="center-div">
                <?php if(!$is_loged){echo"<a href='/login' class='user-btn'> login</a>";}
                        else{echo"<span class='user-name'>$username</span>";}
                ?>
            </div>

            <div class="
                <?php if($is_loged){echo'dropdown-content';}
                        else{echo 'invisible';}
                ?>
            ">
            <?php if($rights>=2){echo"<a href='/admin' class='user-btn'> administrace</a>";}?>
            <?php if($rights>=0){echo"<a href='/objednavky' class='user-btn'> objednávky</a>";}?>
            <?php if(!$is_loged){echo"<a href='/login' class='user-btn'> login</a>";}
                    else{echo"<button @click='logout()' class='user-btn'> logout</button>";}
        ?>
            </div>
        </div>
        <script>
            function logout() {
            	fetch('/app/api/endpoints/login/',{
					    method: 'DELETE'
					})
            	    .then(data => {
						window.location.href = '/login';
					});
            }
        </script>
    </div>
    <div class="obr-bg">
        <a class="no-decor" href="/">
            <h1>cestovka</h1>
        </a>
    </div>
    <div class="header-menu">
        <a class="header-menuButton" href="/kategorie?k=tuzemske">Tuzemské</a>
        <a class="header-menuButton" href="/kategorie?k=hory">Hory</a>
        <a class="header-menuButton" href="/kategorie?k=pamatky">Památky</a>
        <a class="header-menuButton" href="/kategorie?k=lyze">Lyžování</a>
        <a class="header-menuButton" href="/kategorie?k=more">Moře</a>
        <a class="header-menuButton" href="/kategorie?k=camp">Camping</a>
    </div>
</header>
