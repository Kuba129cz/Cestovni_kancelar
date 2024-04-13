<?php
	session_start();

$username='';
$rights=-1;

$is_loged=isset($_SESSION['username']);
if($is_loged)
{
    $username=$_SESSION['username'];
    $rights=$_SESSION['rights'];

    echo "${username} - ${rights}";
}
?>

<header>
    <div>
        <a href="/admin"> administrace</a>
        <a href="/objednavky"> objednávky</a>
    </div>
    <div class="obr-bg">
        <a class="no-decor" href="/">
            <h1>cestovka</h1>
        </a>
    </div>
    <div class="header-menu">
        <a class="header-menuButton" href="/kategorie?k=tuzemske">Tuzemské</a>
        <a class="header-menuButton" href="/kategorie?k=hory">Hory</a>
        <a class="header-menuButton" href="/kategorie?k=pamatky">Památky</a>
        <a class="header-menuButton" href="/kategorie?k=lyze">Lyžování</a>
        <a class="header-menuButton" href="/kategorie?k=more">Moře</a>
        <a class="header-menuButton" href="/kategorie?k=camp">Camping</a>
    </div>
</header>
