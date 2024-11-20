<?php

        if(isset($_GET["id"]))
        {
           //connect db
            //include "prv(cms)/incllude/functions.php";
            include ("prv(cms)/include/function.php");
            
            ///update clickcount
            $cn->query("UPDATE slider SET s_clics=+1 WHERE slid_id =".$_GET["id"]);
            
            //get  the link to redirect to
            $res=$cn->query("SELECT s_path from slider WHERE slid_id =".$_GET["id"]);
            
            $row=$res->fetch_assoc();
            
            //redirect
            header("location:".$row["s_path"]);
            
        }
    else
    {
        header("location:index.php");
        
    }
?>