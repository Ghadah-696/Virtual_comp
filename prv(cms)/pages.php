<?php
   
$pg_name="Pages Management";
include "include/cms_header.php";
    
    $fn1="Add New Pages";

    //update Pages status:

            
        if(isset($_GET["update"]))
            
    {
            
          
        if($_GET["update"]=="true")
        {
            //echo  "Update Question";
            $msg= "<div class='alert alert-success'>Pages Status Updated  Successsfully***</div>";
        }
        else
        {
            $msg= "<div class='alert alert-danger'>Sorry:Pages Statuse Updated Faild!!!</div>";
        }
        
        }

    //edite
   if(isset($_GET["edite"]))
    {
        $fn1="Edit Pages's Data";
        $id=$_GET["edite"];
        $sql = "SELECT * FROM `pages`  WHERE pg_id=$id;";
        
        
        $res= $cn->query($sql);
        $row=$res->fetch_assoc();
        
        $ptt=$row["pg_titl"];
        $pcc=$row["pg_cont"];
        $ptt_ar=$row["pgt_ar"];
        $pcc_ar=$row["pgc_ar"];
        $ppp=$row["pg_pct"];
       
        
        
        //echo $sql;
    }
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $pg_titl=$_POST["pg_titl"];
        $pg_cont=$_POST["pg_cont"];
        $pgt_ar=$_POST["pgt_ar"];
        $pgc_ar=$_POST["pgc_ar"];
        
        
        
        if(isset($_POST["pg_id"]))
        {
            
            //Edite
            $purl_old=$_POST["sp_old"];
            
            
            if(empty($_FILES["pg_pct"]["name"])==false)
            {
                
                $newPn="Pages".date("Ymd").time().rand(1000000,9999999).".jpg";
                
                //Upload Pictur
                
                if($_FILES["pg_pct"]["size"]<912000)
                { 
                    move_uploaded_file($_FILES["pg_pct"]["tmp_name"],"upload/".$newPn.".jpg");
                    
                    $purl_old= $newPn.".jpg";
                }
                  
            }
            
            
                $sql="UPDATE   `pages` SET `pg_titl`='$pg_titl', `pg_cont`='$pg_cont' ,`pgt_ar`='$pgt_ar', `pgc_ar`='$pgc_ar',`pg_pct`='$purl_old' where pg_id=".$_POST["pg_id"];

            
            $cn->query($sql);
            
                $msg= "<div class='alert alert-success'>Pages Updated  Successsfully****</div>";
           
           
        }
        else
        {
          
            if(isset($_FILES))
            {
                if(empty($_FILES["pg_pct"])==false)
                {
                    $newPn="Page-".date("Ymd").time().rand(1000000,9999999).".jpg";
                    
                        
                    
                    //upload Picture
                    if($_FILES["pg_pct"]["size"]<912000)
                    {
                        move_uploaded_file($_FILES["pg_pct"]["tmp_name"],"upload/".$newPn);
                        
                        //Insert
                       $sql="INSERT INTO `pages` (`pg_titl`, `pg_cont`, `pgt_ar`, `pgc_ar`,`pg_pct`) VALUES ('$pg_titl','$pg_cont','$pgt_ar','$pgc_ar','$newPn')";
                        //echo $sql;

                        if($cn->query($sql)===true)
                        {
                            $msg= "<div class='alert alert-success'>Pages Added is  Successsfully</div>";
                        }
                        else
                        {
                            $msg= "<div class='alert alert-danger'>Sorry:Faild  Added Pages!</div>";
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
                $msg= "<div class='alert alert-danger'>Please Select Picture for Pages!</div>";
            }
           
        }
        
        
    }
       


    if(isset($msg))
    {
        echo $msg;
    }
    ?>


<div class="row">
    <div class="col-12 col-lg-6 col-md-4 ">
        <div class="sub-title"><?php echo $fn1; ?>

        </div>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?> " enctype="multipart/form-data">
            <?php if(isset($_GET["edite"])){ ?>
            <div class="form-group">
                <label>Pages ID</label>
                <input type="text" name="pg_id" id="pg_id" readonly="true" class="form-control" value="<?php  echo $id;     ?>" />


            </div>
            <?php } ?>
            <div class="form-group">
                <label>Pages</label>

                <input required="required" name="pg_titl" id="pg_titl" placeholder="please enter the Pages" class="form-control" <?php if(isset($ptt))
                               {
                                 echo "value='$ptt'";  
                               }
                   ?> />

            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea required="required" name="pg_cont" id="pg_cont" class="form-control"> <?php if(isset($pcc))
                               {
                                 echo $pcc;  
                               }
                   ?></textarea>
            </div>
            <div class="text-right">
                <div class="form-group">
                    <label>الصفحة</label>

                    <input required="required" name="pgt_ar" id="pgt_ar" placeholder="الرجاء إدخال اسم الصفحة هنا" class="text-right form-control" <?php if(isset($ptt_ar))
                               {
                                 echo "value='$ptt_ar'";  
                               }
                   ?> />

                </div>
                <div class="form-group">
                    <label>المحتوى</label>
                    <textarea required="required" name="pgc_ar" id="pgc_ar" class="text-right form-control"> <?php if(isset($pcc_ar))
                               {
                                 echo $pcc_ar;  
                               }
                   ?></textarea>
                </div>
            </div>
            <?php
                
                if(isset($ppp))
                {
                    echo "<div class='mb-3'><img class='ssl rounded' src='upload/$ppp' alt='' whidth=100% /></div>";
                       echo "<input type='hidden' id='sp_old' name='sp_old' value='$ppp' />";
                }
                
            ?>
            <div class="form-group">
                <label>Page_Picture <small>Must be less than 800KB</small></label>
                <input type="file" accept="image/jpeg" id="pg_pct" name="pg_pct" />
            </div>
            
            <div class="text-right">
                <button type="submit" class="btn  btn-primary"><i class="fa fa-floppy-o"></i>Save</button>
            </div>
            </form>
            </div>
            <div class="col-12 col-lg-6 col-md-8 ">
                <div class="sub-title">Pages List</div>
            <table class="table table-borderd table-hover table-striped tabla-responsive">
            <tr>
                <th>ID</th>
                <th>Pages</th>
                <th>Pages in Arabic Languge</th>
                <th>Serv.Pict</th>
                <th>Status</th>
                <th>-</th>
            </tr>
            <?php
               
                $sql = "SELECT * FROM `pages` ORDER BY (pg_id) DESC";
                $res=$cn->query($sql);
                while($row=$res->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td>".$row["pg_id"]."</td>"; 
                     echo "<td>".$row["pg_titl"]."</td>"; 
                     echo "<td>".$row["pgt_ar"]."</td>"; 
                    echo "<td><img src='upload/".$row["pg_pct"]."' alt=''  class='serv_pct' /></td>"; 
                     echo "<td class='text-capitalize'>".$row["pg_stat"]."</td>"; 
                    
                    echo "<td> <a class='btn btn-primary' href='pages.php?edite=".$row["pg_id"]."'><i class='fa
                    fa-pencil-square'></i>Edit</a>&nbsp";
                    
                     
                    if($row["pg_stat"]=="active")
                    {
                        echo "<a href='pages_status.php?eid=".$row["pg_id"]."&action=deactivite' class='btn btn-danger'><i class='fa fa-times-circle-o'></i>Deactivite</a>&nbsp"
                        ;
                    }
                    else
                    {
                        
                        echo "<a href='pages_status.php?eid=".$row["pg_id"]."&action=activite' class=' btn btn-success'><i class='fa fa-check-circle-o'></i>Activite</a>&nbsp"
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