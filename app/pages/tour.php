<?php
    $title="tour";
    include __DIR__.'/../includes/parts/head.inc.php';
    $id = isset($_GET['id']) ? $_GET['id'] : null;
?>
    <body x-data="{ open: false }">
    <div class="container-grid-tour">
        <?php include __DIR__.'/../components/header.inc.php'; ?>
    
        <main class="main-grid-tour">
            <div x-data="detailApp('id_zajezd=<?php echo"$id"?>')">
                <div class="heading-destination">
                    <h1 class="destinace" x-text="zajezd.stat + ' - ' + zajezd.mesto"></h1>
                    <div class="progress-bar" x-bind:style="`--rating: ${zajezd.hodnoceni}`">
                </div>    
                <div class="tour-info">
                <img :src="zajezd.image_path" alt="Fotografie rezortu" class="img-tour">
                    <div class="destination-info">
                        <p><b>Termín:</b> <span x-text="zajezd.datum_prijezdu"></span> - <span x-text="zajezd.datum_odjezdu"></span></p>
                        <p><b>Strava:</b> <span x-text="zajezd.typ_stravy"></span></p>
                        <p><b>Cena na osobu:</b> <span x-text="zajezd.cena_osoba"></span> Kč</p>
                        <button class="btn-tour-order">Mám zájem</button>
                    </div>
                </div>
                <h2>Popis</h2>
                <p x-text="zajezd.popis"></p>
                <h2>Adresa místa</h2>
                <p>
                    <span x-text="zajezd.stat"></span>,<br>
                    <span x-text="zajezd.mesto"></span>,<br>
                    <span x-text="zajezd.ulice"></span>,<br>
                    <span x-text="zajezd.psc"></span>
                </p>
            </div>
        </main>
        <?php include __DIR__.'/../components/footer.inc.php'; ?>
    </div>
    <?php  include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
    <?php  include __DIR__.'/../js/detailApp.js.php'; ?>
  </body>
</html>