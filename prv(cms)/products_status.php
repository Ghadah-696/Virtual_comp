<?php

       
        
     if(isset($_GET["eid"]))
      {
          $id=$_GET["eid"];
          
          $a=$_GET["action"];
         include "include/function.php";
          
        
              if($a=="deactivite")
          {
              $action="inactive";
          }
          else
          {
              $action="active";
          }
          
          
          
          $sql="UPDATE `products` SET `pro_stat`='$action'  WHERE pro_id =$id;";
          //echo $sql;
         if($cn->query($sql)===true)
          {
              
              header("location:products.php?update=true");
          }
          else
          {
              
              header("location:products.php?update=false");
          }
             
         }
         

    else
    {
        header("location:products.php");
    }