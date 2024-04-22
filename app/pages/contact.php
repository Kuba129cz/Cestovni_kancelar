<?php
    $title="kontakt";   
  include __DIR__.'/../includes/parts/head.inc.php';
?>
    <body x-data="{ open: false }">
    <?php include __DIR__.'/../components/header.inc.php'; ?>
    <div class="container" x-data="prehledApp(<?php echo"$filtr"?>)">
  
      <main class="col-9">
        <h3>Kontaktní údaje</h3>
        <div class="contact-layout">
            <div class="contact-layout__col">
                <div class="contact-layout__row">
                    <span class="contact-layout__label contact-bold contact-email">
                        E-mail:
                    </span>
                    <span class="contact-bold contact-email-value">
                        cestovkaSunShine@idk.com
                    </span>
                </div>
                <div class="contact-layout__row">
                    <span class="contact-layout__label contact-bold contact-phone">
                        Telefon:
                    </span>
                    <span class="contact-bold contact-phone-value">
                        (+420) 658 474 899
                    </span>
                </div>
            </div>
            <div class="contact-layout__col">
                <div class="contact-layout__row contact-layout__row--address">
                    <span class="contact-layout__label contact-adress">
                        <span class="contact-bold">Adresa</span>
                    </span>
                    <div>
                        <p class="contact-adress"><span >Česká zemědělská univerzita v Praze </span></p>
                        <p class="contact-adress"><span >Kamýcká 129</span></p>
                        <p class="contact-adress"><span >165 00 Praha - Suchdol</span></p>
                    </div>
                </div>
            </div>
        </div>
    <br><br><br>

        <iframe class= "contact-map"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12166.652676782505!2d14.364610639102182!3d50.12889284733815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470beaa584b528cd%3A0xf1116b8a274347f7!2sTechnick%C3%A1%20fakulta%20%C4%8CZU%20v%20Praze!5e0!3m2!1scs!2scz!4v1713774630175!5m2!1scs!2scz" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </main>
    </div>

  
    <?php include __DIR__.'/../components/footer.inc.php'; ?>
    <?php include __DIR__.'/../includes/parts/scripts.inc.php'; ?>
    <?php include __DIR__.'/../js/prehledApp.js.php'; ?>
  </body>
</html>