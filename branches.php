<?php /*<div class="content">
                <div class="col-12">
          <div class="row">
<?php
        include ("prv(cms)/include/public_header.php");
?>


       
            <?php
//variabalse for arabic and english display

$public_pg_name_en="Branches Us";
$public_pg_name_ar="فروعنا";
            
            
              //Page Addres
        if($lng=="en")
   {
    
    
       echo "<div class='display-4'><img class='sizim' src='pct_static/bran11.png' alt='".$public_pg_name_en."'  />$public_pg_name_en</div>";
    
    
   } 
else
{
    echo '<link rel="stylesheet" href="css/rtl.css">';
    echo "<div class='display-4'><img class='sizim' src='pct_static/bran11.png' alt='".$public_pg_name_ar."' />$public_pg_name_ar</div>";
    
    
} 
        //defin variabls
        $labln_en="Branches Name";
     $labln_ar="اسم الفرع";
     $labld_en="Branches Address";
     $labld_ar="عنوان الفرع";
     $lablph_en="Branches Phone Number";
     $lablph_ar="رقم هاتف الفرع";
     $lablem_en="Branches Email";
     $lablem_ar="البريد الإلكتروني";
     
        ?>
             
          <div class="row">
        <div class="col-12">
          
        <?php
              
              echo "<div class='col-6'>";
         //fetch branches data
              $res=$cn->query("SELECT  br_n,br_add,bn_ar,badd_ar,br_ph,br_em FROM `branches` WHERE  b_stat='active' ");

while($row=$res->fetch_assoc())
{
    
     if($lng=="en")         
   {
    
    echo '<div class="marg form-group">';
               echo ' <label class="display-4">'.$row["br_n"].'</label>';
            echo '</div>';
            echo '<div class="form-group">';
                echo '<label  class="fontlbl">'.$labld_en.'</label>';
                echo '<textarea  class="form-control" readonly="true" >'.$row["br_add"].' </textarea>';
            echo '</div>';
    
   } 
else
{
    echo '<div class="marg form-group">
                

                <label class="fontlbl" >'.$row["bn_ar"].'</label>

            </div>
            <div class="form-group">
                <label  class="fontlbl">'.$labld_ar.'</label>
                <textarea  class="form-control" readonly="true" >'.$row["badd_ar"].' </textarea>
            </div>';

}
    
    if($lng=="en")         
   {
    
    echo '<div class="form-group">
                    <label  class="fontlbl">'.$lablph_en.'</label>

                    <input readonly="true"  class="form-control"  value='.$row["br_ph"].'/>

                </div>
             <div  class="form-group">
                    <label  class="fontlbl">'.$lablem_en.'</label>

                    <input readonly="true" class="form-control" value='.$row["br_em"].'/>

                </div>';
    }
    else
    {
         echo '<div class="form-group">
                    <label  class="fontlbl">'.$lablph_ar.'</label>

                    <input readonly="true"  class="form-control"  value='.$row["br_ph"].'/>

                </div>';
        echo '<div class="form-group">
        <label  class="fontlbl">'.$lablem_en.'</label>

                    <input readonly="true" class="form-control" value='.$row["br_em"].'/>

                </div>';
        
    }
     
    
}
        echo "</div>";
        ?>
            
            
            
            
    
    
            <!-- <div class="col2 col-12 col-md-6 "> -->
                <?php
        echo "<div class='col-6'>";
    $res=$cn->query("SELECT  br_lan,br_log FROM `branches` WHERE  b_stat='active' ");
        while($row=$res->fetch_assoc())
{
        if(isset($row["br_lan"]) && isset($row["br_log"]))
            {
              echo  "<div><iframe width='100%' height='320px' class='embed-responsive-item'  src='https://maps.google.com/maps?q=".$row["br_lan"].",".$row["br_log"]."&amp;&z=17&amp&ie=UTF8&iwloc=&output=embed' > </iframe></div>";
            }}
              
              echo "</div>&nbsp";
        ?>
                
    </div>
             </div>*/ ?>
                       
          
<?php
//variabalse for arabic and english display

$public_pg_name_en="Branches Us";
$public_pg_name_ar="فروعنا";
            
            
              //Page Addres
               
include ("prv(cms)/include/public_header.php");

echo '<div class="row">';
         echo     '<div class="col-12">';
           if($lng=="en")
   {
    
    
       echo "<div class='display-4'><img class='sizim' src='pct_static/bran11.png' alt='".$public_pg_name_en."'  />$public_pg_name_en</div>";
    
    
   } 
else
{
    echo '<link rel="stylesheet" href="css/rtl.css">';
    echo "<div class='display-4'><img class='sizim' src='pct_static/bran11.png' alt='".$public_pg_name_ar."' />$public_pg_name_ar</div>";
        
} ?>
<div class="row ">   
<div class="col-12">
<?php
     $tiltb_en="Main Branches";
     $tiltb_ar="الفرع الرئيسي";
     $labln_en="Branches Name";
     $labln_ar="اسم الفرع";
     $labld_en="Branches Address";
     $labld_ar="عنوان الفرع";
     $lablph_en="Branches Phone Number";
     $lablph_ar="رقم هاتف الفرع";
     $lablem_en="Branches Email";
     $lablem_ar="البريد الإلكتروني";
     echo "<div class='margrow'>";
        
              //fetch branches data
              $res=$cn->query("SELECT  br_n,br_add,bn_ar,badd_ar,br_ph,br_em ,br_lan,br_log FROM `branches` WHERE  b_stat='active'");

while($row=$res->fetch_assoc())
{
    
        if(isset($row["br_lan"]) && isset($row["br_log"]))
            {
             if($lng=="en")         
   {
    
            echo ' <label class="display-4">'.$row["br_n"].'</label>';
             }
            else{
               echo '<label class="font" >'.$row["bn_ar"].'</label>' ;
            }
              echo  "<div><iframe width='100%' height='320px' class='embed-responsive-item'  src='https://maps.google.com/maps?q=".$row["br_lan"].",".$row["br_log"]."&amp;&z=17&amp&ie=UTF8&iwloc=&output=embed' > </iframe></div>";
            
     if($lng=="en")         
   {
    
    echo '<div class="marg form-group">';
               
            echo '</div>';
            echo '<div class="form-group">';
                echo '<label  class="fontlbl">'.$labld_en.'</label>';
                echo '<textarea  class="form-control" readonly="true" >'.$row["br_add"].' </textarea>';
            echo '</div>';
    
   } 
else
{
    echo '<div class="marg form-group">
                

                

            </div>
            <div class="form-group">
                <label  class="fontlbl">'.$labld_ar.'</label>
                <textarea  class="form-control" readonly="true" >'.$row["badd_ar"].' </textarea>
            </div>';

}
    
    if($lng=="en")         
   {
    
    echo '<div class="form-group">
                    <label  class="fontlbl">'.$lablph_en.'</label>

                    <input readonly="true"  class="form-control"  value='.$row["br_ph"].'>

                </div>
             <div  class="form-group">
                    <label  class="fontlbl">'.$lablem_en.'</label>

                    <input readonly="true" class="form-control" value='.$row["br_em"].'>

                </div>';
    }
    else
    {
         echo '<div class="form-group">
                    <label  class="fontlbl">'.$lablph_ar.'</label>

                    <input readonly="true"  class="form-control"  value='.$row["br_ph"].'>

                </div>';
        echo '<div class="form-group">
        <label  class="fontlbl">'.$lablem_ar.'</label>

                    <input readonly="true" class="form-control" value='.$row["br_em"].' >

                </div>';      
    }
            }
        echo "<hr/>";    
}
        echo "</div>";    
   
?>
    </div>
 
    </div>
    
   <?php
include ("prv(cms)/include/public_footer.php");

?>     
