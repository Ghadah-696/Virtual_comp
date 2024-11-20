<?php

       
        
     if(isset($_GET["eid"]))
      {
          $id=$_GET["eid"];
          
          $a=$_GET["action"];
         include "include/function.php";
          
         if($a=="reset")
         {
             $newpass=md5("111111");
             
              $sql="UPDATE `users` SET `u_pass`='$newpass'  WHERE u_id=$id;";
          
          if($cn->query($sql)===true)
          {
              //echo "t";
              header("location:users.php?reset=true");
          }
          else
          {
              //echo "f";
              header("location:users.php?reset=false");
          }
             
         }
         else
         {
              if($a=="deactivite")
          {
              $action="disenable";
          }
          else
          {
              $action="enable";
          }
          
          
          
          $sql="UPDATE `users` SET `u_stat`='$action'  WHERE u_id=$id;";
          
          if($cn->query($sql)===true)
          {
              //echo "t";
              header("location:users.php?update=true");
          }
          else
          {
              //echo "f";
              header("location:users.php?update=false");
          }
             
         }
         
      }

    else
    {
        header("location:users.php");
    }