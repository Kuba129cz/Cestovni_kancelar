<?php
session_start();
if(isset($_SESSION['username']) && $_SERVER['REQUEST_URI']=='/login')
{
  //nestihl jsem
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
      <?php
      echo $title
    ?>
    </title>

	<link rel="stylesheet" href="dist/style.css">
</head>
