    


<!-- Testimonies Page -->

<?php

$public_pg_name_en="Testimonies";
$public_pg_name_ar="الشهادات";


        if(!isset($_GET["id"]))
            {
                header("location:index.php");
                exit();
            }

        include ("prv(cms)/include/public_header.php");
        $id=$_GET["id"];


   
$pg_name="Testimonies Management";
include ("prv(cms)/include/public_header.php");
    
    $fn1="Add New Testimonies";

    //update testmonies status:

    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $tst_nm=$_POST["tst_nm"];
        $t_txt=$_POST["t_txt"];
        $tst_cmp=$_POST["tst_cmp"];
        $tst_jb=$_POST["tst_jb"];
        $tnm_ar=$_POST["tnm_ar"];
        $ttxt_ar=$_POST["ttxt_ar"];
        $tcomp_ar=$_POST["tcomp_ar"];
        $tj_ar=$_POST["tj_ar"];
        
        
        
        
        if(isset($_POST["tst_id"]))
        {
            
            //Edite
            $purl_old=$_POST["sp_old"];
            
            
            if(empty($_FILES["tst_pct"]["name"])==false)
            {
                
                $newPn="testmonies".date("Ymd").time().rand(1000000,9999999).".jpg";
                
                //Upload Pictur
                
                if($_FILES["tst_pct"]["size"]<912000)
                { 
                    move_uploaded_file($_FILES["tst_pct"]["tmp_name"],"upload/".$newPn.".jpg");
                    
                    $purl_old= $newPn.".jpg";
                }
                  
            }
            
            
                $sql="UPDATE   `testmonies` SET `tst_nm`='$tst_nm', `t_txt`='$t_txt' ,`tst_cmp`='$tst_cmp', `tst_jb`='$tst_jb',`tnm_ar`='$tnm_ar', `ttxt_ar`='$ttxt_ar' ,`tcomp_ar`='$tcomp_ar', `tj_ar`='$tj_ar',`tst_pct`='$purl_old' where tst_id=".$_POST["tst_id"];

            
            $cn->query($sql);
            
                $msg= "<div class='alert alert-success'>Testimonies Updated  Successsfully****</div>";
           
           
        }
        else
        {
          
            if(isset($_FILES))
            {
                if(empty($_FILES["tst_pct"])==false)
                {
                    $newPn="testimonies-".date("Ymd").time().rand(1000000,9999999).".jpg";
                    
                        
                    
                    //upload Picture
                    if($_FILES["tst_pct"]["size"]<912000)
                    {
                        move_uploaded_file($_FILES["tst_pct"]["tmp_name"],"upload/".$newPn);
                        
                        //Insert
                       $sql="INSERT INTO `testmonies` (`tst_nm`, `t_txt`,`tst_cmp`, `tst_jb`, `tnm_ar`,`ttxt_ar`,`tcomp_ar`, `tj_ar`, `tst_pct`) VALUES ('$tst_nm','$t_txt','$tst_cmp','$tst_jb','$tnm_ar','$ttxt_ar','$tcomp_ar','$tj_ar','$newPn')";
                        //echo $sql;

                        if($cn->query($sql)===true)
                        {
                            $msg= "<div class='alert alert-success'>Testimonies Added is  Successsfully</div>";
                        }
                        else
                        {
                            $msg= "<div class='alert alert-danger'>Sorry:Faild  Added Testimonies!</div>";
                        }
                        }
                        else
                        {
                            $msg= "<div class='alert alert-danger'>The Picture Size Exceed The Max Limit!</div>";
                        }

                }
               
            }
            else
            {
                $msg= "<div class='alert alert-danger'>Please Select Picture for Testimonies!</div>";
            }
           
        }
        
        
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
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?> " enctype="multipart/form-data">
            <?php if(isset($_GET["edite"])){ ?>
            <div class="form-group">
                <label>Testimonies ID</label>
                <input type="text" name="tst_id" id="tst_id" readonly="true" class="form-control" value="<?php  echo $id;     ?>" />


            </div>
            <?php } ?>
            <?php if($lng=="en")
               { 
                    echo '<div class="form-group">';
                        echo '<label>Testimonies Name</label>';

                        echo '<input required="required" name="tst_nm" id="tst_nm" placeholder="please enter your name" class="form-control" />';
                        echo '</div>';
                    echo '<div class="form-group">';
                        echo '<label>Testimonies Text</label>';
                        echo '<textarea required="required" name="t_txt" id="t_txt" class="form-control"></textarea>';
                        echo '</div>';
                    echo '<div class="form-group">';
                        echo '<label>Company <small> (You Can Passing This Field Empty)</small></label>' ;

                        echo '<input name="tst_cmp" id="tst_cmp" class="form-control" />';

                        echo '</div>';
                    echo '<div class="form-group">';
                        echo '<label>Job<small> (You Can Passing This Field Empty)</small></label>';

                        echo '<input name="tst_jb" id="tst_jb" class="form-control" />';

                        echo ' </div>';
              } 
            else{ 
                    echo '<div class="txt-align_ar text-right">';
                     echo '<div class="form-group">';
                    echo '<label>اسم الشاهد</label>';

                   echo '<input required="required" name="tnm_ar" id="tnm_ar"  class="b form-control" />';
                    echo '</div>'; 
                
                echo '<div class="form-group">';
                   echo '<label>نص الشهادة</label>';
                    echo '<textarea required="required" name="ttxt_ar" id="ttxt_ar" class="b form-control"></textarea>';
                echo '</div>';
                 echo '<div class="form-group">';
                echo '<label> اسم الشركة <small> (يمكنك ترك هذا الحقل فارغ)</small></label>';

                echo '<input  name="tcomp_ar" id="tcomp_ar" placeholder="يرجى ادخال اسم الشركه هنا" class="b form-control"/>';
            echo '</div>';
            echo '<div class="form-group">';
               echo '<label>المهنة <small> (يمكنك ترك هذا الحقل فارغ) </small> </label>';

                echo '<input  name="tj_ar" id="tj_ar" placeholder="يرجى إدخال اسم المهنه هنا" class="b form-control"  />';

            echo '</div>';
            echo '</div>';
             } ?>
            <div class="form-group">
                <label>Page_Picture <small>Must be less than 800KB</small></label>
                <input type="file" accept="image/jpeg" id="tst_pct" name="tst_pct" />
            </div>
            
            <div class="text-right"><a href="prv(cms)/testimonies.php">
                <button type="submit" class="btn  btn-primary">Post</button></a>
            </div>
            </form>
            </div>
            <div class="col-12 col-md-8 ">
                <div class="sub-title">testmonies List</div>
            <table class="table table-borderd table-hover table-striped ">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Company</th>
                <th>Picture</th>
                
            </tr>
            <?php
                $sql = "SELECT * FROM `testmonies` WHERE tst_st='Shown' ORDER BY (tst_id )  DESC";
                $res=$cn->query($sql);
                while($row=$res->fetch_assoc())
                {
                     echo "<tr>";
                    echo "<td>".$row["tst_id"]."</td>"; 
                    if($lng=="en")
                    {
                        echo "<td>".$row["tst_nm"]."</td>"; 
                        echo "<td>".$row["tst_cmp"]."</td>";
                        echo "<td>".$row["tst_jb"]."</td>";
                        echo "<td><textarea>".$row["t_txt"]."</textarea></td>";
                    }
                   else
                   {
                       echo "<td>".$row["tnm_ar"]."</td>"; 
                        echo "<td>".$row["tcomp_ar"]."</td>";
                        echo "<td>".$row["tj_ar"]."</td>";
                        echo "<td><textarea>".$row["ttxt_ar"]."</textarea></td>";
                   }
                     
                    echo "<td><img src='prv(cms)/upload/".$row["tst_pct"]."' alt='Sender`s image'  class='serv_pct' /></td>"; 
                    
                   
                    echo "</tr>";
                }
                
                
                ?>

        </table>
    </div>

</div>



<?php
       include ("prv(cms)/include/public_footer.php");
?>