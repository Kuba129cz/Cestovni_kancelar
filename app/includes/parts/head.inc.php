<?php
	session_start();

  $username='';
  $rights=-1;

  $is_loged=isset($_SESSION['username']);
  if($is_loged)
  {
      $username=$_SESSION['username'];
      $rights=$_SESSION['rights'];
  }

  $pozadovana_prava=isset($pozadovana_prava)?$pozadovana_prava:-1;
  if($rights<$pozadovana_prava)
  {
    if(!$is_loged)
    {
      header('Location: /login');
      exit();
    }
    else
    {
      header('Location: /403');
      exit();
    }
  }
  //print_r($_SESSION);
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
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
</head>
