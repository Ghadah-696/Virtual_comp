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

              $sql="UPDATE `faqs` SET `fp_stat`='$action' WHERE f_id =$id;";

              if($cn->query($sql)===true)
              {
              //echo "t";
              header("location:faqs.php?update=true");
              }
              else
              {
              //echo "f";
              header("location:faqs.php?update=false");
              }
          }
    else
        {
           header("location:faqs.php");
        }
    