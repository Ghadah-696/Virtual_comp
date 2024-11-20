<!-- Testimonies Page -->

<?php

$public_pg_name_en="Testimonies";
$public_pg_name_ar="الشهادات";

include ("prv(cms)/include/public_header.php");
        //$fn1="Add New Question";
        if(isset($_GET["tst_id"]))
    {
        //to show single testimonies
        $id=$_GET["tst_id"];
            
            
            
            if($lng=="en")
   {
    
    
       echo "<div class='display-4'><img class='imgpagetest' src='pct_static/testimo.png' alt='".$public_pg_name_en."'  />$public_pg_name_en</div>";
    
    
   } 
else
{
    echo '<link rel="stylesheet" href="css/rtl.css">';
    echo "<div class='display-4'><img class='imgpagetest' src='pct_static/testimo.png' alt='".$public_pg_name_ar."' />$public_pg_name_ar</div>";
    
    
}
            $sql = "SELECT * FROM `testmonies` ORDER BY tst_id  DESC";
        $res=$cn->query($sql);
        while($row=$res->fetch_assoc())
        {
           
        }}