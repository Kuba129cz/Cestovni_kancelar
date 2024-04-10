<?php include __DIR__.'/../includes/parts/head.inc.php'; ?>
    <body x-data="{ open: false }">
      <?php include __DIR__.'/../components/header.inc.php'; ?>
      <div class="container" x-data="loginApp()">

        <main class="col-9">
            <form @submit.prevent="login">
                nick<input type="text" x-model="username"/><br>
                pass<input type="password" x-model="password"/><br>
                <button type="submit">login</button>
            </form>     
        </main>    
      </div>

      <?php include __DIR__.'/../components/footer.inc.php'; ?>
      <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
      <?php include __DIR__.'/../js/loginApp.js.php'; ?>
    <body>
</html>
