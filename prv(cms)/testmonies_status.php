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

              $sql="UPDATE `testmonies` SET `tst_st`='$action' WHERE tst_id =$id;";

              if($cn->query($sql)===true)
              {
              //echo "t";
              header("location:testimonies.php?update=true");
              }
              else
              {
              //echo "f";
              header("location:testimonies.php?update=false");
              }
          }
    else
        {
           header("location:testimonies.php");
        }
    