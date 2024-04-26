<?php
    $title="o nás";   
  include __DIR__.'/../includes/parts/head.inc.php';
?>
    <body x-data="{ open: false }">
    <?php include __DIR__.'/../components/header.inc.php'; ?>
    <div class="container" x-data="prehledApp(<?php echo"$filtr"?>)">
  
      <main class="col-9">
        <h3>O nás</h3>
            <p>
                Společnost Sunshine byla založena 14.02.2024 a z malého start-upu se stala respektovanou cestovní společností. 
                Sunshine je součástí dynamického cestovního průmyslu a jejím cílem je usnadňovat všem poznávat svět.
            </p>

            <p>
                Společnost Sunshine investuje do technologií, které usnadňují cestování, a díky tomu přináší hostům 
                nezapomenutelné zážitky, možnosti dopravy a výběr hotelů, ubytování v soukromí a dalších fantastických ubytování. 
                Sunshine jako jedna z největších cestovních platforem umožňuje ubytováním z celého světa oslovit globální publikum 
                a rozvíjet jejich podnikání, ať už se jedná o již známé společnosti, nebo soukromá ubytování různých velikostí.
            </p>

            <p>
                Sunshine je k dispozici ve více jazycích a nabízí více než 25 zájezdů do 7 zemí. Zákaznický servis je vám navíc k 
                dispozici 24 hodin denně 7 dní v týdnu bez ohledu na to, kam pojedete a jaké jsou vaše plány
            </p>
      </main>
    </div>
  
    <?php include __DIR__.'/../components/footer.inc.php'; ?>
    <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
    <?php include __DIR__.'/../js/prehledApp.js.php'; ?>
  </body>
</html>