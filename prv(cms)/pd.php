<?php
       include "include/function.php";
     if(isset($_GET["id"]))
      {
       
         
         $id=$_GET["id"];
        $d=$_GET["p"];
         
  
                 $sql="DELETE FROM `pro_images` WHERE `p_img`='".$id."';";
                 echo $sql;

                 
                     if($cn->query($sql)===true)
                     {
                     header("location:products.php?edit=$p&delete=true");
                     }
                     else
                     {
                     header("location:products.php?edit=$p&delete=false");
                     }

          }
       
    
         
    else
    {
        header("location:products.php");
    }