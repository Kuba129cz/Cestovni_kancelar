<?php
$title = "tour";
include __DIR__ . '/../includes/parts/head.inc.php';
$id = isset($_GET['id']) ? $_GET['id'] : null;
if(empty($id))
{
    header('Location: /404');
    exit();
}
$zakaznik_id=isset($_SESSION['zakaznik'])?$_SESSION['zakaznik']['id_zakaznik']:0;

require 'app/api/controllers/AdresaController.php';
$controller = new AdresaController();
$zajezd = $controller->getAdresaZajezdByID($id);
if(count($zajezd)==0)
{
    header('Location: /404');
    exit();
}

$adresar = $zajezd[0]["image_path"];
$soubory_jpg = array();

if (is_dir($adresar) && is_readable($adresar)) {
    if ($handle = opendir($adresar)) {
        while (false !== ($file = readdir($handle))) {
            if (is_file($adresar . '/' . $file) && strtolower(pathinfo($file, PATHINFO_EXTENSION)) == 'jpg') {
                $soubory_jpg[] = $file;
            }
        }
        closedir($handle);
    }
}

$images = array();
foreach ($soubory_jpg as $jpg) {
    $images[] = $jpg;
}
$stat = $zajezd[0]["stat"];
$mesto = $zajezd[0]["mesto"];
$ulice = $zajezd[0]["ulice"];
$psc = $zajezd[0]["psc"];
$popis = $zajezd[0]["popis"];
$datum_prijezdu = $zajezd[0]["datum_prijezdu"];
$datum_odjezdu = $zajezd[0]["datum_odjezdu"];
$typ_stravy = $zajezd[0]["typ_stravy"];
$cena_osoba = $zajezd[0]["cena_osoba"];
$hodnoceni = $zajezd[0]["hodnoceni"];

// var_dump($zajezd); pro ladeni

?>
<body x-data="{ open: false }">
    <?php include __DIR__ . '/../components/header.inc.php'; ?>

    <div class="container-wholeScreen">

        <main class="col-9">
            <div x-data="detailApp('id_zajezd=<?php echo"$id"?>')">
                <div class="heading-destination">
                <h1 class="destinace"><?php echo $stat . ' - ' . $mesto; ?></h1>
                <div class="progress-bar" style="--rating: <?php echo"$hodnoceni"?>"></div>
                </div>

                <div class="gallery">
                    <div class="gallery-main-image">
                        <a href="<?php echo $zajezd[0]["image_path"] . '/' . $images[0]; ?>" data-fancybox="gallery">
                            <img width="660" height="330" src="<?php echo $zajezd[0]["image_path"] . '/' . $images[0]; ?>" alt="Fotografie rezortu">
                        </a>
                    </div>
                    <div class="gallery-thumb gallery-thumb-one">
                        <a href="<?php echo $zajezd[0]["image_path"] . '/' . $images[1]; ?>" data-fancybox="gallery">
                            <img width="220" height="110" src="<?php echo $zajezd[0]["image_path"] . '/' . $images[1]; ?>" alt="Fotografie rezortu">
                        </a>
                    </div>
                    <div class="gallery-thumb gallery-thumb-two">
                        <a href="<?php echo $zajezd[0]["image_path"] . '/' . $images[2]; ?>" data-fancybox="gallery">
                            <img width="220" height="110" src="<?php echo $zajezd[0]["image_path"] . '/' . $images[2]; ?>" alt="Fotografie rezortu">
                        </a>
                    </div>
                    <div class="gallery-thumb gallery-thumb-three">
                        <a href="<?php echo $zajezd[0]["image_path"] . '/' . $images[3]; ?>" data-fancybox="gallery">
                            <img width="440" height="220" src="<?php echo $zajezd[0]["image_path"] . '/' . $images[3]; ?>" alt="Fotografie rezortu">
                        </a>
                    </div>
                </div>

                <div class="destination-info">
                    <p><b>Termín:</b> <?php echo $datum_prijezdu ?>, - <?php echo $datum_odjezdu ?></p>
                    <p><b>Strava:</b> <?php echo $typ_stravy ?></p>
                    <p><b>Cena na osobu:</b> <?php echo $cena_osoba ?> Kč</p>
                    <button id="showForm" @click="showForm=true" class="btn-order" type="button">Mám zájem</button>

                        <div id="formContainer" x-show="showForm">
                        <form @submit.prevent="submitItem(<?php echo $id?>,<?php echo $zakaznik_id ?>)">
                            <fieldset>
                                <legend>Objednávka:</legend>
                                <label for="persons">Zadejte počet osob</label>
                                <input type="number" name="persons" x-model="newItem.pocet_osob" min="1"><br><br>
                                <input class="btn"type="submit" value="Závazně objednat">
                            </fieldset>
                        </form>
                        </div>
                </div>

                <h2>Popis</h2>
                <p><?php echo $popis ?></p>
                <h2>Adresa místa</h2>
                <p>
                    <?php echo $stat ?>,<br>
                    <?php echo $mesto ?>,<br>
                    <?php echo $ulice ?>,<br>
                    <?php echo $psc?>
                </p>
            </div>
        </main>
    </div>

    <?php include __DIR__ . '/../components/footer.inc.php'; ?>
    <?php include __DIR__ . '/../includes/parts/scripts.inc.php'; ?>
    <?php include __DIR__ . '/../js/detailApp.js.php'; ?>
</body>
</html>
