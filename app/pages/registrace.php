<?php include __DIR__.'/../includes/parts/head.inc.php'; ?>
    <body x-data="{ open: false }">
      <?php include __DIR__.'/../components/header.inc.php'; ?>
      <div class="container-wholeScreen" x-data="loginApp()">

        <main class="col-9">
            <form @submit.prevent="registruj">    
              <div class="flex-container">
                <div class="zarovnani">
                  <!--<label for="user_nick">Nick:</label>-->
                  <div>Nick:</div>
                  <div>
                    <input id="user_nick" type="text" x-model="newZakaznik.nick"/>
                  </div>

                  <!--<label for="user_pass">Password:</label>-->
                  <div>Password:</div>
                  <div>
                    <input id="user_pass" type="password" x-model="newZakaznik.password"/>
                  </div>

                  <!--<label for="user_tel">Telefon:</label>-->
                  <div>Telefon:</div>
                  <div>
                    <input id="user_tel" type="text" x-model="newZakaznik.telefon"/>
                  </div>

                  <!--<label for="user_mail">Mail:</label>-->
                  <div>Mail:</div>
                  <div>
                    <input id="user_mail" type="text" x-model="newZakaznik.email"/>
                  </div>

                  <!--<label for="zak_jmen">Jméno:</label>-->
                  <div>Jméno:</div>
                  <div>
                    <input id="zak_jmen" type="text" x-model="newZakaznik.jmeno"/>
                  </div>

                  <!--<label for="zak_prijm">Příjmení:</label>-->
                  <div>Příjmení:</div>
                  <div>
                    <input id="zak_prijm" type="text" x-model="newZakaznik.prijmeni"/>
                  </div>

                  <!--<label for="zak_nar">Datum narození:</label>-->
                  <div>Datum narození:</div>
                  <div>
                    <input id="zak_nar" type="date" x-model="newZakaznik.datum_narozeni"/>
                  </div>

                  <div>
                    <button type="submit">registrovat</button>
                  <div>
                </div>
              </div>
            </form>     
          </main>    
      </div>

      <?php include __DIR__.'/../components/footer.inc.php'; ?>
      <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
      <?php include __DIR__.'/../js/loginApp.js.php'; ?>
    <body>
</html>
