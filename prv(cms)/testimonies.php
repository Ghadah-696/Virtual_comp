<?php
   
$pg_name="Testimonies Management";
include "include/cms_header.php";
    
    $fn1="Add New Testimonies";

    //update Testimonies status:

            
        if(isset($_GET["update"]))
            
    {
            
          
        if($_GET["update"]=="true")
        {
            //echo  "Update Question";
            $msg= "<div class='alert alert-success'>Testimonies Status Updated  Successsfully***</div>";
        }
        else
        {
            $msg= "<div class='alert alert-danger'>Sorry:Testimonies Statuse Updated Faild!!!</div>";
        }
        
        }

    //edite
   if(isset($_GET["edite"]))
    {
        $fn1="Edit Testimonies's Data";
        $id=$_GET["edite"];
        $sql = "SELECT * FROM `testmonies`  WHERE tst_id=$id;";
        
        
        $res= $cn->query($sql);
        $row=$res->fetch_assoc();
        $tnn=$row["tst_nm"];
        $ttx=$row["t_txt"];
        $tcc=$row["tst_cmp"];
        $tjj=$row["tst_jb"];
        $tnn_ar=$row["tnm_ar"];
        $ttx_ar=$row["ttxt_ar"];
        $tcc_ar=$row["tcomp_ar"];
        $tjj_ar=$row["tj_ar"];
        $ppp=$row["tst_pct"];
        
        //echo $sql;
    }
    
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
                
                $newPn="Testimonies".date("Ymd").time().rand(1000000,9999999).".jpg";
                
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
                    $newPn="Page-".date("Ymd").time().rand(1000000,9999999).".jpg";
                    
                        
                    
                    //upload Picture
                    if($_FILES["tst_pct"]["size"]<912000)
                    {
                        move_uploaded_file($_FILES["tst_pct"]["tmp_name"],"upload/".$newPn);
                        
                        //Insert
                       $sql="INSERT INTO `testmonies` (`tst_nm`, `t_txt`, `tst_cmp`, `tst_jb`,`tnm_ar`, `ttxt_ar`, `tcomp_ar`, `tj_ar`,`tst_pct`) VALUES ('$tst_nm','$t_txt','$tst_cmp','$tst_jb','$tnm_ar','$ttxt_ar','$tcomp_ar','$tj_ar','$newPn')";
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
    <div class="col-12 col-lg-4 col-md-4 ">
        <div class="sub-title"><?php echo $fn1; ?>

        </div>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?> " enctype="multipart/form-data">
            <?php if(isset($_GET["edite"])){ ?>
            <div class="form-group">
                <label>Testimonies ID</label>
                <input type="text" name="tst_id" id="tst_id" readonly="true" class="form-control" value="<?php  echo $id;     ?>" />


            </div>
            <?php } ?>
            <div class="form-group">
                <label>Testimonies Name</label>

                <input required="required" name="tst_nm" id="tst_nm" placeholder="please enter the name" class="form-control" <?php if(isset($tnn))
                               {
                                 echo "value='$tnn'";  
                               }
                   ?> />

            </div>
            <div class="form-group">
                <label>Testimonies Text</label>
                <textarea required="required" name="t_txt" id="t_txt" class="form-control"> <?php if(isset($ttx))
                               {
                                 echo $ttx;  
                               }
                   ?></textarea>
            </div>
            <div class="form-group">
                <label>Company Name</label>

                <input required="required" name="tst_cmp" id="tst_cmp" placeholder="please enter the company name" class="form-control" <?php if(isset($tcc))
                               {
                                 echo "value='$tcc'";  
                               }
                   ?> />

            </div>
            <div class="form-group">
                <label>Job</label>
                <input required="required" name="tst_jb" id="tst_jb" placeholder="please enter your job name" class="form-control" <?php if(isset($tjj))
                               {
                                 echo "value='$tjj'";  
                               }
                   ?> />

            
            </div>
            <div class="text-right">
                <div class="form-group">
                    <label>Name - Ar</label>

                    <input required="required" name="tnm_ar" id="tnm_ar"  class="text-right form-control" <?php if(isset($tnn_ar))
                               {
                                 echo "value='$tnn_ar'";  
                               }
                   ?> />

                </div>
                <div class="form-group">
                    <label>Text - Ar</label>
                    <textarea required="required" name="ttxt_ar" id="ttxt_ar" class="text-right form-control"> <?php if(isset($ttx_ar))
                               {
                                 echo $ttx_ar;  
                               }
                   ?></textarea>
                </div>
                <div class="form-group">
                    <label>Company - Ar</label>

                    <input required="required" name="tcomp_ar" id="tcomp_ar"  class="text-right form-control" <?php if(isset($tcc_ar))
                               {
                                 echo "value='$tcc_ar'";  
                               }
                   ?> />

                </div>
                <div class="form-group">
                    <label>Job - Ar</label>

                    <input required="required" name="tj_ar" id="tj_ar"  class="text-right form-control" <?php if(isset($tjj_ar))
                               {
                                 echo "value='$tjj_ar'";  
                               }
                   ?> />

                </div>
            </div>
             <?php
                
                if(isset($ppp))
                {
                    echo "<div class='sisim'><img class='rounded' src='upload/$ppp' alt='testimonies picture' /></div>";
                       echo "<input type='hidden' id='sp_old' name='sp_old' value='$ppp' />";
                }
                
            ?>
            <div class="form-group">
                <label>Page_Picture <small>Must be less than 800KB</small></label>
                <input type="file"  accept="image/jpeg" id="tst_pct" name="tst_pct" />
            </div>
            
            <div class="text-right">
                <button type="submit" class="btn  btn-primary"><i class="fa fa-floppy-o"></i>Save</button>
            </div>
            </form>
            </div>
            <div class="col-12 col-lg-8 col-md-4 ">
                <div class="sub-title">Testimonies List</div>
            <table class="table table-borderd table-hover table-striped table-responsive">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Company</th>
                <th>Job</th>
                <th>Name - Ar</th>
                <th>Company - Ar</th>
                <th>Job - Ar</th>
                <th>Picture</th>
                <th>Status</th>
                <th>-</th>
            </tr>
            <?php
                $sql = "SELECT * FROM `testmonies` ORDER BY (tst_id) DESC";
                $res=$cn->query($sql);
                while($row=$res->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td>".$row["tst_id"]."</td>"; 
                     echo "<td>".$row["tst_nm"]."</td>"; 
                     echo "<td>".$row["tst_cmp"]."</td>";
                    echo "<td>".$row["tst_jb"]."</td>";
                     echo "<td>".$row["tnm_ar"]."</td>"; 
                     echo "<td>".$row["tcomp_ar"]."</td>";
                     echo "<td>".$row["tj_ar"]."</td>";
                    echo "<td><img src='upload/".$row["tst_pct"]."' alt=''  class='serv_pct' /></td>"; 
                     echo "<td class='text-capitalize'>".$row["tst_st"]."</td>"; 
                    
                    echo "<td> <a class='btn btn-primary' href='testimonies.php?edite=".$row["tst_id"]."'><i class='fa fa-pencil-square'></i>Edit</a>&nbsp";
                    
                     
                    if($row["tst_st"]=="active")
                    {
                        echo "<a href='testmonies_status.php?eid=".$row["tst_id"]."&action=deactivite' class='btn btn-danger'><i class='fa fa-times-circle-o'></i>Deactivite</a>&nbsp"
                        ;
                    }
                    else
                    {
                        
                        echo "<a href='testmonies_status.php?eid=".$row["tst_id"]."&action=activite' class=' btn btn-success'><i class='fa fa-check-circle-o '></i>Activite</a>&nbsp"
                        ;
                    
                    }
                    
                    
                    echo "</tr>";
                }
                
                
                ?>

        </table>
    </div>

</div>



<?php
        include ("include/cms_footer.php"); 
?>