<?php

$public_pg_name_en="FAQs";
$public_pg_name_ar="الأسئله الشائعه";
include ("prv(cms)/include/public_header.php");

$address_serv_section_en=" Frequent Asks Questions :";
$address_serv_section_ar=" الأسئله الشائعه :";



if($lng=="en")
   {
    
    
       echo "<div class='display-4'><img class='imgpagefaq' src='pct_static/faq.jpg' alt='".$public_pg_name_en."'  />$public_pg_name_en</div>";
    
    
   } 
else
{
    echo '<link rel="stylesheet" href="css/rtl.css">';
    echo "<div class='display-4'><img class='imgpagefaq' src='pct_static/faq.jpg' alt='".$public_pg_name_ar."' />$public_pg_name_ar</div>";
    
    
}

            if($lng=="en")
   {
              echo '<h1 class="bb">'.$address_serv_section_en.'</h1>';
              }
              else
              {
                   echo '<h1>'.$address_serv_section_ar.'</h1>';
              }
        $res=$cn->query("SELECT * FROM `faqs`  WHERE fp_stat='active'");
        
echo "<div class='divdisplay'>";
        while($row=$res->fetch_assoc())
{
    //echo '<img class="serv_img" src="prv(cms)/upload/'.$row["s_pct"].'" alt="'.$row["s_titl"].'" />';
    //echo '<img class="serv_icon" src="prv(cms)/upload/'.$row["s_icon"].'" alt="'.$row["s_titl"].'" />';
    
if($lng=="en")
   {
    
    echo "<div class='d'><h3>Questions :</h3>";
        echo '<div class="display-5">'.$row["f_qus"].'</div>';
         
    echo '<div  class="font-22"><h3>Answer :</h3>'.$row["f_ans"].' </div>' ;
    
    echo "<br/>";
    echo "<hr/>";
    echo "</div>";
   } 
else
{
    echo "<div class='d'><h3>السؤال :</h3>";
    echo '<div class=" display-5er">'.$row["fqus_ar"].'</div>' ;
         
    echo '<div  class="font-22"><h3>الإجابه :</h3>'.$row["fans_ar"].' </div>';
    echo "<br/>";
    echo "<hr/>";
    echo "</div>";
}
    

}
     echo "</div>";       

        ?>
   <?php
include ("prv(cms)/include/public_footer.php");

?>     
