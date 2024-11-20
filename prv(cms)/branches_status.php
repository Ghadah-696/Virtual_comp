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

              $sql="UPDATE `branches` SET `b_stat`='$action' WHERE br_id =$id;";

              if($cn->query($sql)===true)
              {
              //echo "t";
              header("location:branches.php?update=true");
              }
              else
              {
              //echo "f";
              header("location:branches.php?update=false");
              }
          }
    else
        {
           header("location:branches.php");
        }
    