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

              $sql="UPDATE `pages` SET `pg_stat`='$action' WHERE pg_id =$id;";

              if($cn->query($sql)===true)
              {
              //echo "t";
              header("location:pages.php?update=true");
              }
              else
              {
              //echo "f";
              header("location:pages.php?update=false");
              }
          }
    else
        {
           header("location:pages.php");
        }
    