<?php
$public_pg_name_en="Contact Us";
$public_pg_name_ar="تواصل معنا";

       // include ("prv(cms)/include/cms_header.php"); 
include ("prv(cms)/include/public_header.php");

    $fn1="Add New Message";
    $fn2=" إضافة رسالة جديدة";
    
$h1_en="Electronics World Company About  :";
$h1_ar="عن شركة عوالم الإلكترونيات : ";
$p_en="Electronics  World company be founded in 2020/9/9.Its work to importation all electronics devices types from mutch companies worlds.";
$p_ar="نشأت شركة عوالم الإلكترونيات في عام 2020/9/9 .وهي تعمل على استيراد جميع انواع الأجهزة الألكترونية من عدة شركات عالمية .";


    
       
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_GET["lang"]) && $lng=="en")
        {
            $ms_frmb="en";
        }
        else{
             $ms_frmb="ar";
        }
        $ms_sn=$_POST["ms_sn"];
        $ms_sph=$_POST["ms_sph"];
        $ms_sem=$_POST["ms_sem"];
        $ms_subj=$_POST["ms_subj"];
        $ms_body=$_POST["ms_body"];
     
         //Insert
           
    $sql="INSERT INTO `message`( `ms_stat`,`ms_sn`, `ms_sph`, `ms_sem`, `ms_subj`,`ms_body`,`ms_frmb`) VALUES ('unread','$ms_sn','$ms_sph','$ms_sem','$ms_subj','$ms_body','$ms_frmb')";
        //echo $sql;
        if($cn->query($sql)===TRUE && $lng=="en")
        {
             $msg= "<div class='alert alert-success'>We thank you for contacting us</div>";
        }
        else
        {
            $msg= "<div class='alert alert-success'>نشكر تواصلكم معنا</div>";
        }
        
        }
         
        if($lng=="en")
        {
            echo "<div class='display-4'><img class='imgcont' src='pct_static/contact.jpg' alt='".$public_pg_name_en."'  />$public_pg_name_en</div>";
             $nlbl="Name :";
            $phlbl="Phone Number :";
            $emlbl="Email :";
            $sblbl="Message Subject :";
            $bdlbl="Message Text :";
            //pleaceholder name 
            $ms_sn="please enter your name";
            $ms_sph="please enter your phone number";
            $ms_sem="please enter your email";
            $ms_subj="please enter your message subject";
            $ms_body="please enter your message";
            $btn="Send";
        }
        else
        {
           //lbl name
    $nlbl="الاسم :";
    $phlbl="رقم الهاتف :";
    $emlbl="الأيميل :";
    $sblbl=" عنوان الرسالة :";
    $bdlbl="نص الرسالة :";
    //pleaceholder name 
    $ms_sn ="الرجاء ادخال اسمك هنا";
    $ms_sph="الرجاء ادخال رقم هاتفك هنا";
    $ms_sem="الرجاء ادخال بريدك الألكتروني";
     $ms_subj="الرجاء ادخال عنوان رسالتك";
    $ms_body ="الرجاء ادخال الرسالة";
            $btn="إرسال";
        }
if(isset($msg))
    {
        echo $msg;
    }
    ?>
<div class="row">
    <div class="col-12 col-md-6 ">
        <div class="sub-title"><?php if($lng=="en"){echo $fn1;}else{ echo $fn2;
}  ?>

        </div>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]."?lang=$lng"; ?> ">
         <div class="form-group">
                <label><?php echo $nlbl; ?></label>

                <input required="required" name="ms_sn" id="ms_sn" placeholder="<?php echo $ms_sn;?>" class=" form-control" />

            </div>
            <div class="form-group">
                <label><?php echo $phlbl;?></label>
                <input required="required" type="tel" name="ms_sph" id="ms_sph" placeholder="<?php echo $ms_sph;?>" class="form-control"/>
            </div>
            
                <div class="form-group">
                    <label><?php echo $emlbl;?></label>

                    <input type="email"  required="required" name="ms_sem" id="ms_sem" placeholder="<?php echo $ms_sem;?>" class="form-control" />

                </div>
             <div class="form-group">
                    <label><?php echo $sblbl;?></label>

                    <input required="required" name="ms_subj" id="ms_subj" placeholder="<?php echo $ms_subj;?>" class="form-control"  />

                </div>
                <div class="form-group">
                    <label><?php echo $bdlbl;?></label>
                    <textarea class="form-control" required="required" name="ms_body" id="ms_body" placeholder="<?php echo $ms_body;?>"> </textarea>
                </div>
            <div class="text-right">
                <button type="submit" class="btn  btn-primary"><i class='fa
                    fa-floppy-o'></i><?php echo $btn; ?></button>
            </div>
            </form>
            </div>
    <div class="col-12 col-md-6 ">
        <?php
        if($lng=="en")
        {
            echo "<h1>$h1_en</h1>";
            echo "<p class='txtp'>$p_en</p>";
        }
         else
         {
              echo "<h1>$h1_ar</h1>";
             echo "<p class='txtp'>$p_ar</p>";
         }
       
        // include google map
    $res=$cn->query("SELECT  br_lan,br_log FROM `branches` WHERE  b_stat='active' limit 1");
        while($row=$res->fetch_assoc())
{
        if(isset($row["br_lan"]) && isset($row["br_log"]))
            {
              echo  "<div><iframe width='100%' height='400' class='embed-responsive-item'  src='https://maps.google.com/maps?q=".$row["br_lan"].",".$row["br_log"]."&amp;&z=17&amp&ie=UTF8&iwloc=&output=embed' > </iframe></div>";
            }}
        ?>
</div>
<?php
        include ("prv(cms)/include/public_footer.php");
?>