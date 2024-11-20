<?php 

    session_start();
    if(isset($_SESSION["uph"])==false)
    {
        header("location:login.php");
           
           exit();
    }
    require ("function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="t"><?php
       
        echo $com_name_en;
        if(isset($pg_name))
        {
           
            echo "-".$pg_name;
        }
        // <script src="/js/cms.js"; ></script>
        ?></title>
     
   
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/cms.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <div class="row n">
             <div class="col-12">
            <?php  include "include/cms_menu.php"; ?>
        </div>
        </div>   
    
    <div class="container">
        
         
        <?php if(isset($pg_name)){ ?>
        <div class="row">
        <div class="col-12">
            
            <?php
              echo '<a class="nav-link" href="index.php"><i class="fa fa-home"></i>Hom - ><span class="sr-only"></span>
</a>';         
             echo '<div class="main-title">';                     
             echo $pg_name; ?>
            </div>
        
        </div>
        </div>
        <?php }?>
        <div class="row">
        <div class="col-12">
            <div id="content">