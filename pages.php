<?php

$public_pg_name_en="Pages";
$public_pg_name_ar="الصفحات";


        if(!isset($_GET["id"]))
            {
                header("location:index.php");
                exit();
            }

        include ("prv(cms)/include/public_header.php");
        $id=$_GET["id"];

        $res=$cn->query("SELECT * FROM pages where pg_id=".$id);
        $row=$res->fetch_assoc();

        if($lng=="en")
            {
                echo "<div class='display-4'><img class='imgcont' src='prv(cms)/upload/".$row["pg_pct"]."' alt='".$row["pg_titl"]."' width='100%' />&nbsp".$row["pg_titl"]."</div>";
         
                echo "<div  class='about font-22'>".$row["pg_cont"]."</div>";
            echo "";
 }
           
        else
            {
            if(isset($row["pg_pct"]))
            {
                echo "<div class='display-4'><img class='imgcont' src='prv(cms)/upload/".$row["pg_pct"]."' alt='".$row["pgt_ar"]."' width='100%' />&nbsp".$row["pgt_ar"]."</div>";
                }
            
                echo "<div class='about font-22'>".$row["pgc_ar"]."</div>";
            }
        //Visitors Counter
        if(isset($_COOKIE["page"]))
        {
            $cn->query("UPDATE pages SET pg_visit=pg_visit+1 WHERE pg_id =".$id);
            setcookie("page",$id,time()+(86400*7));
        }
        

        ?>
                   
   <?php
include ("prv(cms)/include/public_footer.php");

?>     
