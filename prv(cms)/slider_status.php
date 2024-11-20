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

              $sql="UPDATE `slider` SET `slid_st`='$action' WHERE slid_id =$id;";

              if($cn->query($sql)===true)
              {
              //echo "t";
              header("location:slider.php?update=true");
              }
              else
              {
              //echo "f";
              header("location:slider.php?update=false");
              }
          }
    else
        {
           header("location:slider.php");
        }
    