<?php
$public_pg_name_en="Contact Us";
$public_pg_name_ar="تواصل معنا";
include ("prv(cms)/include/public_header.php");
    $fn1="Add New Message";
    $fn2=" إضافة رسالة جديدة";
    $btn_en="Send";
    $btn_ar="إرسال";
$h1_en="Electronics World Company About  :";
$h1_ar="عن شركة عوالم الإلكترونيات : ";
$p_en="Electronics World company be founded in 2020/9/9.Its work to importation all electronics devices types from mutch companies worlds.";
$p_ar="نشأت شركة عوالم الإلكترونيات في عام 2020/9/9 .وهي تعمل على استيراد جميع انواع الأجهزة الألكترونية من عدة شركات عالمية .";

if($lng=="en")
   {
    
    
       echo "<div class='display-4'><img class='imgcont' src='pct_static/contact.jpg' alt='".$public_pg_name_en."'  />$public_pg_name_en</div>";
    
    
   } 
else
{
    echo '<link rel="stylesheet" href="css/rtl.css">';
    echo "<div class='display-4'><img class='imgcont' src='pct_static/contact.jpg' alt='".$public_pg_name_ar."' />$public_pg_name_ar</div>";
    
    
}
    if(isset($_GET["edite"]))
    {
        
        $id=$_GET["edite"];
 


     }

    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $ms_sn=$_POST["ms_sn"];
        $ms_sph=$_POST["ms_sph"];
        $ms_sem=$_POST["ms_sem"];
        $ms_subj=$_POST["ms_subj"];
        $ms_body=$_POST["ms_body"];
       // $ms_frmb=$_POST["ms_frmb"];
       
       
      
         //Insert
           
     $sql="INSERT INTO `message`( `ms_stat`,`ms_sn`, `ms_sph`, `ms_sem`, `ms_subj`,`ms_body`) VALUES ('unread','$ms_sn','$ms_sph','$ms_sem','$ms_subj','$ms_body')";
        echo $sql;
        if($con->query($sql)===TRUE)
          { 
            $msg="<div class='alert alert-success'>Message Send SuccessFull </div> ";  
          }
           else
           {
            $msg="Error: ".$sql."<br>".$cn->error;    
           }
           /*$res= $cn->query($sql);
        if(!mysqli_stmt_execute($stmt))
        {
            $error=mysqli_stmt_error($stmt);
        }
        
            echo $sql;
        }*/
        
    }
    
    if(isset($msg))
    {
        echo $msg;
    }


    
    ?>


<div class="row">
    <div class="col-12 col-md-4 ">
        <div class="sub-title"><?php echo $fn1; ?>

        </div>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?> ">
            <?php if(isset($_GET["edite"])){ ?>
            <div class="form-group">
                <label>Message ID</label>
                <input type="text" name="ms_id " id="ms_id" readonly="true" class="form-control" value="<?php  echo $id;     ?>" />


            </div>
             
            <?php } ?>
           
             
            
            <div class="form-group">
                <label>Name</label>

                <input required="required" name="ms_sn" id="ms_sn" placeholder="please enter the question" class=" form-control" />

            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input required="required" name="ms_sph" id="ms_sph" class="form-control"/>
            </div>
            
                <div class="form-group">
                    <label>Email</label>

                    <input required="required" name="ms_sem" id="ms_sem" placeholder="" class="form-control" />

                </div>
             <div class="form-group">
                    <label>Message Subject</label>

                    <input required="required" name="ms_subj" id="ms_subj" placeholder="" class="form-control"  />

                </div>
                <div class="form-group">
                    <label>Message Text</label>
                    <textarea required="required" name="ms_body" id="ms_body" class="form-control"> </textarea>
                </div>
            
            <div class="text-right">
                <button type="submit" class="btn  btn-primary"><i class='fa
                    fa-floppy-o'></i>Save</button>
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