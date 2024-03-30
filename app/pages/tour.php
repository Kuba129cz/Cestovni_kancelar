<?php
    $title="tour";
    include __DIR__.'/../includes/parts/head.inc.php';
?>
    <body x-data="{ open: false }">
    <?php include __DIR__.'/../components/header.inc.php'; ?>
    <div class="container">
      <div class="row">
        <?php include __DIR__.'/../components/aside.inc.php'; ?>
        <main class="col-9">
            <div class="heading-destination">
                <h1> Turecká republika </h1>
                <svg  fill="yellow" stroke="black"><path d="M0 12.514c0-.432.288-.718 1.078-.862l9.632-1.366 4.318-8.77c.129-.423.49-.735.93-.791l.006-.001c.432 0 .718.288.936.791l4.318 8.77 9.704 1.366q1.078.216 1.078.862c-.035.38-.223.711-.501.934l-.003.002-6.973 6.83 1.654 9.632v.36c0 .288 0 .576-.216.718a.748.748 0 0 1-.575.288h-.001a1.377 1.377 0 0 1-.724-.22l.006.003-8.626-4.529-8.636 4.524c-.227.133-.5.212-.791.216h-.001a.752.752 0 0 1-.575-.286l-.001-.002a1.09 1.09 0 0 1-.288-.717v-.001a.973.973 0 0 1 .074-.367l-.002.007 1.656-9.628-7.037-6.83a1.222 1.222 0 0 1-.432-.932v-.005z"></path></svg>   
            </div>    
        <div class="tour-info">
           <!-- sem prijde kod -->
                <img src="https://dcontent.inviacdn.net/shared/img/web-1200x1024/2019/3/8/d6/18413530-long-beach.jpg" alt="Popisek obrázku">
            <div class="destination-info">
                <p>Termín: (07.04.2024 - 14.04.2024)</p>
                <p>Strava: (All Inclusive)</p>
                <p>Cena na osobu: (23000 Kč)</p>
                <button class="btn-tour-order">Mám zájem</button>
            </div>
        </div>
            <h2>Popis</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam magni debitis illum. Eaque pariatur quaerat est. Quo voluptate doloribus amet culpa qui expedita nulla aliquam ipsam voluptatibus, molestias laudantium hic!</p>
            <h2>Adresa místa</h2>
            <p>Turecká republika,<br> Kemer,<br>Limak Limra Resort,<br>07980</p>

        </main>
      </div>
    </div>
  </body>
  <?php include __DIR__.'/../components/footer.inc.php'; ?>
  <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
  <?php include __DIR__.'/../api/endpoints/items/itemScript.inc.php'; ?>
