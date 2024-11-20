<?php

$public_pg_name_en="Services";
$public_pg_name_ar="الخدمات";

$address_serv_section_en=" Clints Services :";
$address_serv_section_ar="خدمات العملاء  :";

include ("prv(cms)/include/public_header.php");

if($lng=="en")
   {
    
    
       echo "<div class='display-4'><img class='imgpageserv' src='pct_static/serv3.png' alt='".$public_pg_name_en."'  />$public_pg_name_en</div>";
    
    
   } 
else
{
    echo '<link rel="stylesheet" href="css/rtl.css">';
    echo "<div class='display-4'><img class='imgpageserv' src='pct_static/serv3.png' alt='".$public_pg_name_ar."' />$public_pg_name_ar</div>";
    
    
}

            if($lng=="en")
   {
              echo '<h1>'.$address_serv_section_en.'</h1>';
              }
              else
              {
                   echo '<h1>'.$address_serv_section_ar.'</h1>';
              }
             
              
              ?>
<?php
    
$res=$cn->query("SELECT s_titl,s_desc,st_ar,sd_ar,s_pct,s_icon  FROM `services` WHERE s_st='active' ");

while($row=$res->fetch_assoc())
{
    //echo '<img class="serv_img" src="prv(cms)/upload/'.$row["s_pct"].'" alt="'.$row["s_titl"].'" />';
    //echo '<img class="serv_icon" src="prv(cms)/upload/'.$row["s_icon"].'" alt="'.$row["s_titl"].'" />';
    
if($lng=="en")
   {
    
    echo "<div class='divdisplay'>";
        echo '<div class="display-5"><img class="serv_img1" src="prv(cms)/upload/'.$row["s_pct"].'" alt="'.$row["s_titl"].'" >'.$row["s_titl"].'</div>';
         
    echo '<div  class="font-22"><img class="serv_icon1" src="prv(cms)/upload/'.$row["s_icon"].'" alt="'.$row["s_titl"].'">'.$row["s_desc"].' </div>' ;
    
    echo "<br/>";
    echo "</div>";
   } 
else
{
    echo "<div class='divdisplay'>";
    echo '<div class=" display-5"><img class="serv_img1" src="prv(cms)/upload/'.$row["s_pct"].'" alt="'.$row["s_titl"].'" >'.$row["st_ar"].'</div>' ;
         
    echo '<div  class="font-22"><img class="serv_icon1" src="prv(cms)/upload/'.$row["s_icon"].'" alt="'.$row["s_titl"].'" >'.$row["sd_ar"].' </div>';
    echo "<br/>";
    echo "</div>";

}
    

}

?>
     
   <?php
include ("prv(cms)/include/public_footer.php");

?>     
