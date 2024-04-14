<?php include __DIR__.'/../includes/parts/head.inc.php'; ?>
    <body x-data="{ open: false }">
      <?php include __DIR__.'/../components/header.inc.php'; ?>
      <div class="container" x-data="loginApp()">

        <main class="col-9">
            <form @submit.prevent="login">
               <div class="flex-container">
                <div>Nick:</div>
                <div><input type="text" x-model="username"/><br></div>
                <div>Password:</div>
                <div><input type="password" x-model="password"/><br></div>
                 <div> <button type="submit">login</button><div>
                 </div>
              
               </form>     
          </main>    
      </div>

      <?php include __DIR__.'/../components/footer.inc.php'; ?>
      <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
      <?php include __DIR__.'/../js/loginApp.js.php'; ?>
    <body>
</html>
