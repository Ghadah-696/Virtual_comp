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
          
          
          
          $sql="UPDATE `services` SET `s_st`='$action'  WHERE s_id =$id;";
          //echo $sql;
         if($cn->query($sql)===true)
          {
              
              header("location:services.php?update=true");
          }
          else
          {
              
              header("location:services.php?update=false");
          }
             
         }
         

    else
    {
        header("location:services.php");
    }