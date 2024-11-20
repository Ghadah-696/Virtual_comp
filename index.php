    <?php
                
                $public_pg_name_en="Hom Page";
                $public_pg_name_ar="الصفحة الرئيسيه";
              //paragraph
               $address_para_en="Electronics Devices For Modern Versions";
            $address_para_ar="أجهزة ألكترونية لأحدث النسخ والإصدارات ";
              
               //variabalse for arabic and english display 
            $textdisplay_en="Main Branches";
            $textdisplay_ar="الفرع الرئيسي";
              //product section
             $add_product_en="Sum Our Products List :" ;
              $add_product_ar="قائمة لبعض منتجاتنا :" ;
              //Testimonies section
              $add_test_en="Testimonies Our Clints :" ;
              $add_test_ar="شهادات عملائنا :" ;
              
                include ("prv(cms)/include/public_header.php");
              
              
                if($lng=="en")
                {
 
                   echo "<div class='display-4'><img class='imgpage' src='pct_static/hom.jpg' alt='".$public_pg_name_en."'  />$public_pg_name_en</div>";
            } 
            else
            {
                echo '<link rel="stylesheet" href="css/rtl.css">';
                echo "<div class='display-4'><img class='imgpage' src='pct_static/hom.jpg' alt='".$public_pg_name_ar."' />$public_pg_name_ar</div>";


            }
             

if($lng=="en")
   {
    echo "<h1>$address_para_en</h1>";
    
}
else
{
    echo '<link rel="stylesheet" href="css/rtl.css">';
    echo "<h1>$address_para_ar</h1>";
    
}
            ?>
 <div class="row">
  <div class='col-12 col-md-4'>     
<?php


//if(!isset())
//echo "";

if($lng=="en")
{
    echo '<p class="w210">Electronics  Worlds offers you the modernist versions for many of computers,smart-phone ,tablet ,printers and touch pad for many company worlds .</p>';
}
else
{
    echo '<link rel="stylesheet" href="css/rtl.css">';
         echo '<p class="w210">عوالم  الإلكترونيات تعرض لكم أحدث النسخ والأصدارات للعديد من أجهزة الكمبيوترات ,الهواتف الذكية و الواح و شاشات لمس للعديد من الشركات العالمية.</p>';
}
 ?></div>
<div class='col-12 col-md-8'>
<?php
//builder slirder
$indicators="";
$carouselItem="";
$res=$cn->query("SELECT * FROM `slider` WHERE slid_st ='active'; ");
//$res=$sql);
              //clicks counter
$i=0;
$active="active";

while($row=$res->fetch_assoc())
{
   
   if($lng=="en")
   {
        $img=$row["slid_pct"];
       
   }
    else
    {
        echo '<link rel="stylesheet" href="css/rtl.css">';
        $img=$row["spct_ar"];
       
        
    }
    $indicators .='<li style="width: 980px; display: table-cell; vertical-align: top;" data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" class="'.$active.'"></li>';
    
    $carouselItem .='<div class="carousel-item '.$active.'">
     <a href="clickcount.php?id='.$row["slid_id"].'"><img   class="simg dislpay-1 text-center" src="prv(cms)/upload/'.$img.'" alt="Products Image" width="710" height="300"/>
      </a></div>';
        
    
    $active="";
    $i++;
}


?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    
				<!--	<div id="feature" class="feature_slider multiple swipejs" data-interval="5"> -->

  <ol class="cont carousel-indicators">
    <?php
      echo $indicators;
      ?>
  </ol>
    
    
    
  <div class="carousel-inner">
    <?php
      echo $carouselItem;
      ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <?php //echo "</div>&nbsp"; ?></div>
              </div>
             
<hr/>
              <!-- Images Products -->
              <?php
              if($lng=="en")
   {
              echo '<h1>'.$add_product_en.'</h1>';
              }
              else
              {
                   echo '<h1>'.$add_product_ar.'</h1>';
              }
             
        
              ?>
     		
				
    
                    <?php
                    
                    //Section Products                  
$res=$cn->query("SELECT p.pro_id as 'ddd',pro_n,prn_ar, pro_desc, prdes_ar,(SELECT p_img FROM `pro_images` pi WHERE p.pro_id=pi.pro_id limit 1) as p_img , pro_stat='active' FROM `products` p ORDER BY (p.pro_id) DESC ");

                    //varibales to count image 
                    $i=0;
                    
for($j=0;$j<2;$j++)

{
    while($row=$res->fetch_assoc())
{    
    if($i==0)
    {

       echo '<ul class="col-12  reset tiles">';
    }
        if($lng=="en")
   {
    if(isset($row["p_img"]))
    {
                echo '<li>';
						echo '<a class="ilm"  href="products.php">';
							echo '<img class="rounded proim" src="prv(cms)/upload/'.$row["p_img"].'" alt="'.$row["pro_n"].'" >';
                            echo '<h3 class="h4">'.$row["pro_n"].'</h3>';
							echo '<p class="reset">'.$row["pro_desc"].'</p>';
							
						echo '</a>';}
    
                        echo '</li>';
        $i++;
        if($i==3)
        {
            echo "</ul>";
            $i=0;
        }
         }
    
    
    else
{
      if($i==0)
    {  
       
           echo '<ul class="reset tiles">';
      } 
          if(isset($row["p_img"]))
    { 
    echo '<li>
						<a class="ilm" href="products.php">
							<img class="rounded proim" src="prv(cms)/upload/'.$row["p_img"].'" alt="'.$row["prn_ar"].'">
							<h3 class="h4">'.$row["prn_ar"].'</h3>
							<p class="reset">'.$row["prdes_ar"].'</p>
						</a>
					</li>';}
             $i++;
        if($i==3)
        {
            echo "</ul>";
            $i=0;
        }
        }         
}  }  

  ?>	                  
              <!-- Section Testimonies  -->
                  
                   
              <?php
              if($lng=="en")
   {
              echo '<h1>'.$add_test_en.'</h1>';
              }
              else
              {
                   echo '<h1>'.$add_test_ar.'</h1>';
              }
                 
$res=$cn->query("SELECT tst_nm,t_txt,tst_cmp,tst_jb,tnm_ar,ttxt_ar,tcomp_ar,tj_ar,tst_pct FROM `testmonies` WHERE tst_st ='active';");

while($row=$res->fetch_assoc())
{
    if(isset($row["tst_pct"]))
    {
  echo '<div class="divdisplay" cols="2"  rows="3"><img class="rounded proim1" src="prv(cms)/upload/'.$row["tst_pct"].'" alt="'.$row["tst_nm"].'"></div>'; 
	}						
if($lng=="en")
   {
    
    echo '<div class="divdisplay">';
        echo "<div class='font-21'>".$row["tst_nm"]."&nbsp"; 
        echo "<div  class='font-21'>".$row["t_txt"]."</div>";
    echo "<div class='font-21'>".$row["tst_cmp"]."</div>"; 
        echo "<div  class='font-21'>".$row["tst_jb"]."</div>";
    echo "</div>";
   } 
else
{
    echo "<div class='divdisplay'>";
    echo "<div  class='font-21'>".$row["tnm_ar"]."</div>";   
    echo "<div  class='font-21'>".$row["ttxt_ar"]."</div>";
    echo "<div  class='font-21'>".$row["tcomp_ar"]."</div>";   
    echo "<div  class='font-21'>".$row["tj_ar"]."</div>";
    echo "</div>";
}
echo "</div>";
}
?>
                  
   <?php
include ("prv(cms)/include/public_footer.php");

?>     
