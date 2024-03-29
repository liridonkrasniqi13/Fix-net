<?php include "../includes/db.php" ?>    
<?php include "functions.php" ?> 
<?php ob_start(); ?>
<?php session_start(); ?>   

<?php  

if(!isset($_SESSION['user_role'])) {

    header("Location: ../index.php");

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>WeFix Admin</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Favicon -->
  <link rel="shortcut icon" href="favicon.ico">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="../assets/vendor/bootstrap/bootstrap.min.css">
  <!-- CSS Global Icons -->
  <link rel="stylesheet" href="../assets/vendor/icon-awesome/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="../assets/vendor/icon-line/css/simple-line-icons.css">
  <link rel="stylesheet" href="../assets/vendor/icon-etlinefont/style.css">
  <link rel="stylesheet" href="../assets/vendor/icon-line-pro/style.css">
  <link rel="stylesheet" href="../assets/vendor/icon-hs/style.css"> -->

  <link rel="stylesheet" href="../assets/vendor/hs-admin-icons/hs-admin-icons.css">

  <link rel="stylesheet" href="../assets/vendor/animate.css">
  <link rel="stylesheet" href="../assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css">

  <link rel="stylesheet" href="../assets/vendor/flatpickr/dist/css/flatpickr.min.css">
  <link rel="stylesheet" href="../assets/vendor/bootstrap-select/css/bootstrap-select.min.css">

  <!-- <link rel="stylesheet" href="../assets/vendor/chartist-js/chartist.min.css"> -->
  <link rel="stylesheet" href="../assets/vendor/fancybox/jquery.fancybox.min.css">

  <link rel="stylesheet" href="../assets/vendor/hamburgers/hamburgers.min.css">

  <!-- CSS Unify -->
  <link rel="stylesheet" href="../assets/css/unify-admin.css">

  <!-- CSS Customization -->
  <link rel="stylesheet" href="../css/custom.css">







    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  
</head>

<body>