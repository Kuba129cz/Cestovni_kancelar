<?php
    $title="tour";
    include __DIR__.'/../includes/parts/head.inc.php';
    $id = isset($_GET['id']) ? $_GET['id'] : null;
?>
    <body x-data="{ open: false }">
    <?php include __DIR__.'/../components/header.inc.php'; ?>
  <!--  <div class="container-wholeScreen"> -->
    
       <!-- <main class="col-9"> -->
            <div x-data="detailApp('id_zajezd=<?php echo"$id"?>')">
                <div class="heading-destination">
                    <h1 class="destinace" x-text="zajezd.stat + ' - ' + zajezd.mesto"></h1>
                  <!--  <div class="progress-bar" x-bind:style="`--rating: ${zajezd.hodnoceni}`">-->
                </div>    
                
                <div class="gallery">
                    <div class="gallery-main-image">
                        <img width="660" height="330" :src="zajezd.image_path + '/kokorinsky_dul.jpg'" alt="Fotografie rezortu">
                    </div>
                    <div class="gallery-thumb gallery-thumb-one">
                        <img width="220" height="110" :src="zajezd.image_path + '//kokorin.jpg'" alt="Fotografie rezortu">
                    </div>
                    <div class="gallery-thumb gallery-thumb-two">
                        <img width="220" height="110" :src="zajezd.image_path + '/trasa_po_zelene.jpg'" alt="Fotografie rezortu">
                    </div>
                    <div class="gallery-thumb gallery-thumb-three">
                        <img width="440" height="220" :src="zajezd.image_path + '/kokorinsky_domek.jpg'" alt="Fotografie rezortu">
                    </div>
                </div>    

                    <div class="destination-info">
                        <p><b>Termín:</b> <span x-text="zajezd.datum_prijezdu"></span> - <span x-text="zajezd.datum_odjezdu"></span></p>
                        <p><b>Strava:</b> <span x-text="zajezd.typ_stravy"></span></p>
                        <p><b>Cena na osobu:</b> <span x-text="zajezd.cena_osoba"></span> Kč</p>
                        <button class="btn-tour-order">Mám zájem</button>

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
        <!-- </main> -->
    <!-- </div> -->

    <?php include __DIR__.'/../components/footer.inc.php'; ?>
    <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
    <?php include __DIR__.'/../js/detailApp.js.php'; ?>
  </body> 
</html>