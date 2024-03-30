<?php
    $title="tour";
    include __DIR__.'/../includes/parts/head.inc.php';
    $id = isset($_GET['id']) ? $_GET['id'] : null;
?>
    <body x-data="{ open: false }">
    <?php include __DIR__.'/../components/header.inc.php'; ?>
    <div class="container">
        <?php include __DIR__.'/../components/aside.inc.php'; ?>
    
        <main class="col-9">
            <div x-data="detailApp('id_zajezd=<?php echo"$id"?>')">
                <div class="heading-destination">
                    <h1 class="destinace" x-text="zajezd.stat + ' - ' + zajezd.mesto"></h1>
                    <svg  fill="yellow" stroke="black"><path d="M0 12.514c0-.432.288-.718 1.078-.862l9.632-1.366 4.318-8.77c.129-.423.49-.735.93-.791l.006-.001c.432 0 .718.288.936.791l4.318 8.77 9.704 1.366q1.078.216 1.078.862c-.035.38-.223.711-.501.934l-.003.002-6.973 6.83 1.654 9.632v.36c0 .288 0 .576-.216.718a.748.748 0 0 1-.575.288h-.001a1.377 1.377 0 0 1-.724-.22l.006.003-8.626-4.529-8.636 4.524c-.227.133-.5.212-.791.216h-.001a.752.752 0 0 1-.575-.286l-.001-.002a1.09 1.09 0 0 1-.288-.717v-.001a.973.973 0 0 1 .074-.367l-.002.007 1.656-9.628-7.037-6.83a1.222 1.222 0 0 1-.432-.932v-.005z"></path></svg>   
                </div>    
                <div class="tour-info">
                    <img src="https://dcontent.inviacdn.net/shared/img/web-1200x1024/2019/3/8/d6/18413530-long-beach.jpg" alt="Popisek obrázku">
                    <div class="destination-info">
                        <p><b>Termín:</b> <span x-text="zajezd.datum_prijezdu"></span> - <span x-text="zajezd.datum_odjezdu"></span></p>
                        <p><b>Strava:</b> <span x-text="zajezd.typ"></span></p>
                        <p><b>Cena na osobu:</b> <span x-text="zajezd.cena_osoba"></span> Kč</p>
                        <button class="btn-tour-order">Mám zájem</button>
                    </div>
                </div>
                <h2>Popis</h2>
                <p x-text="zajezd.popis"></p>
                <h2>Adresa m�sta</h2>
                <p>
                    <span x-text="zajezd.stat"></span>,<br>
                    <span x-text="zajezd.mesto"></span>,<br>
                    <span x-text="zajezd.ulice"></span>,<br>
                    <span x-text="zajezd.psc"></span>
                </p>
            </div>
        </main>

    </div>
  </body>
  <?php include __DIR__.'/../components/footer.inc.php'; ?>
  <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
  <?php include __DIR__.'/../js/detailApp.js.php'; ?>
</html>