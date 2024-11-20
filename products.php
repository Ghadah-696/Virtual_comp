<?php

$public_pg_name_en="Products";
$public_pg_name_ar="المنتجات";

$add_product_en=" Products List :" ;
              $add_product_ar="قائمة  منتجاتنا :" ;
include ("prv(cms)/include/public_header.php");
/*
            if($lng=="en")
                {
 
                   echo "<div class='display-4'><img class='rounded imgprod' src='pct_static/product.jpg' alt='".$public_pg_name_en."'  />$public_pg_name_en</div>";
            } 
else
{
    echo '<link rel="stylesheet" href="css/rtl.css">';
    echo "<div class='display-4'><img class='rounded imgprod' src='pct_static/product.jpg' alt='".$public_pg_name_ar."' />$public_pg_name_ar</div>";
    
    
}


              if($lng=="en")
                {
              echo '<h1>'.$add_product_en.'</h1>';
                }
              else
              {
                   echo '<h1>'.$add_product_ar.'</h1>';
              }*/ 
?>
<div class='col-12 col-md-12'>
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

<div id="carouselExampleIndicators" class="carousel" data-ride="carousel">
    
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
</div>
              
<!-- End slider -->

 <?php            
//section to fetch all img by id
        
if(isset($_GET["pro_id"]))
    {
    //to show single message
        $id=$_GET["pro_id"];
    //get all message details
        $sql = "SELECT p_img FROM `pro_images` WHERE pro_id=$id";
        $res=$cn->query($sql);
    //Add Button to backword
        
        
      //varibales to count image
    $row=$res->fetch_assoc();
                   
echo "<div class='text-right'><a href='products.php' class='btn btn-lg btn-primary'>Back</a></div>";
       echo '<ul class="reset tiles">';
    
    if(isset($row["p_img"]))
    {
                echo '<li>';
						echo '<a class="ilm"  href="http://google.com">';
							echo '<img class="rounded proim" src="prv(cms)/upload/'.$row["p_img"].'" alt="product images" >';
							//echo '<h3 class="h4">'.$row["pro_n"].'</h3>';
							//echo '<p class="reset">'.$row["img_desc"].'</p>';
						echo '</a>';}
    
                        echo '</li>';
        
            echo "</ul>";
            $i=0;
        
}
        else
    {
        //to show one image every products products
              ?>
               
              

    <div class="col-12 col-md-12">
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
				
                    <?php
                    
                    /*Section Products
$res=$cn->query("SELECT p.pro_id as 'ddd',pro_n,prn_ar, pro_desc, prdes_ar,(SELECT p_img FROM `pro_images` pi WHERE p.pro_id=pi.pro_id limit 1) as p_img , pro_stat='active' FROM `products` p ORDER BY (p.pro_id) DESC ");
    
    //varibales to count image 
                    $i=0;
while($row=$res->fetch_assoc())
{
    if($i==0)
    {

       echo '<ul class="col-12 reset tiles">';
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
       
           echo '<ul class="col-12 reset tiles">';
      } 
          if(isset($row["p_img"]))
    { 
    echo '<li>
						<a class="ilm" href="products.php?lang='.$lng.'">
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
         
}        */ ?>	
				
</div>     
   <?php }

            //Visitors Counter
        if(isset($_COOKIE["product"]))
        {
            $cn->query("UPDATE products SET pro_visit=pro_visit+1 WHERE pro_id =".$id);
            setcookie("product",$id,time()+(86400*7));
        }
            
include ("prv(cms)/include/public_footer.php");

?>     
