<?php
   
$pg_name="Slider Management";
include "include/cms_header.php";
    
    $fn1="Add New Slider";

    //update Slider status:

            
        if(isset($_GET["update"]))
            
    {
            
          
        if($_GET["update"]=="true")
        {
            //echo  "Update Question";
            $msg= "<div class='alert alert-success'>Slider Status Updated  Successsfully***</div>";
        }
        else
        {
            $msg= "<div class='alert alert-danger'>Sorry:Slider Statuse Updated Faild!!!</div>";
        }
        
        }

    //edite
   if(isset($_GET["edite"]))
    {
        $fn1="Edit Slider's Data";
        $id=$_GET["edite"];
        $sql = "SELECT * FROM `slider`  WHERE slid_id=$id;";
        
        
        $res= $cn->query($sql);
        $row=$res->fetch_assoc();
        
        $sll=$row["s_path"];
        $spp=$row["slid_pct"];
        $spp_ar=$row["spct_ar"];
        
        //echo $sql;
    }
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        
        
        $s_path=$_POST["s_path"];
        
        
      
          if(isset($_POST["slid_id"]))
        {
            
            
            //Edite
            $purl_old=$_POST["sp_old1"];
            $purl2_old=$_POST["sp_old2"];
            
            
            if(empty($_FILES["slid_pct"]["name"])==false)
            {
                
                $newPn="Slid-".date("Ymd").time().rand(1000000,9999999)."en-.jpg";
                
                //Upload Pictur
                
                if($_FILES["slid_pct"]["size"]<912000)
                { 
                    move_uploaded_file($_FILES["slid_pct"]["tmp_name"],"upload/".$newPn);
                    
                    $purl_old= $newPn;
                }
                  
            }
              
               if(empty($_FILES["spct_ar"]["name"])==false)
            {
            //Upload Icon
                $newPn_ar="Slide-".date("Ymd").time().rand(1000000,9999999);
                if($_FILES["spct_ar"]["size"]<912000)
                { 
                    move_uploaded_file($_FILES["spct_ar"]["tmp_name"],"upload/".$newPn_ar.".jpg");
                    
                    $purl2_old= $newPn_ar.".jpg";
                }
            }
            
            
                $sql="UPDATE   `slider` SET  `slid_pct`='$purl_old' , `s_path`='$s_path',`spct_ar`='$purl2_old'  where slid_id=".$_POST["slid_id"];
             
            
            $cn->query($sql);
            
                $msg= "<div class='alert alert-success'>Slide Updated  Successsfully****</div>";
           
           
        }
            
           
        else
        {
            if(isset($_FILES))
            {
                if(empty($_FILES["slid_pct"])==false && empty($_FILES["spct_ar"])==false)
                {
                    $newPn="Slider-en-".date("Ymd").time().rand(1000000,9999999).".jpg";
                     $newPn_ar="Slider-ar-".date("Ymd").time().rand(1000000,9999999).".jpg";

                    //upload Picture
                    if($_FILES["slid_pct"]["size"]<912000)
                    {
                        move_uploaded_file($_FILES["slid_pct"]["tmp_name"],"upload/".$newPn);
                        if($_FILES["spct_ar"]["size"]<912000)
                        {
                        move_uploaded_file($_FILES["spct_ar"]["tmp_name"],"upload/".$newPn_ar);
                        
                        //Insert
                       $sql="INSERT INTO `slider` (`slid_pct`, `s_path`,`spct_ar`) VALUES ('$newPn','$s_path','$newPn_ar')";
                        //echo $sql;

                        if($cn->query($sql)===true)
                        {
                            $msg= "<div class='alert alert-success'>Slider Added is  Successsfully</div>";
                        }
                            
                        else
                        {
                            $msg= "<div class='alert alert-danger'>Sorry:Faild  Added Slider!</div>";
                        }
                        }
                        else
                        {
                            $msg= "<div class='alert alert-danger'>The Picture Size Exceed The Max Limit!</div>";
                        }
                        }
                }
            }
            else
            {
                $msg= "<div class='alert alert-danger'>Please Select Picture for Slider!</div>";
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
                <label>Slider ID</label>
                <input type="text" name="slid_id" id="slid_id" readonly="true" class="form-control" value="<?php  echo $id;     ?>" />
            </div>
            <?php } ?>
            <div class="form-group">
                <label>Linke</label>

                <input required="required" name="s_path" id="s_path"  class="form-control" <?php if(isset($sll))
                               {
                                 echo "value='$sll'";  
                               }
                   ?> />
            </div>
            <?php
                if(isset($spp))
                {
                    echo "<div class='mb-1'><img class='ssl rounded' src='upload/$spp' alt='slide image desc english' width=100% /></div>";
                       echo "<input type='hidden' id='sp_old1' name='sp_old1' value='$spp' />";
                }
            ?>
            <div class="form-group">
                <label>Slide_Picture <small>Must be less than 800KB</small></label>
                <input type="file" accept="image/jpeg" id="slid_pct" name="slid_pct" />
            </div>
            <?php
                if(isset($spp_ar))
                {
                    echo "<div class='mb-1'><img class='ssl rounded' src='upload/$spp_ar' alt='slide image desc arabic'  /></div>";
                       echo "<input type='hidden' id='sp_old2' name='sp_old2' value='$spp_ar' />";
                }
            ?>
            <div class="form-group">
                <label>Page_Picture_Ar <small>Must be less than 800KB</small></label>
                <input type="file" accept="image/jpeg" id="spct_ar" name="spct_ar" />
            </div>
            <div class="text-right">
                <button type="submit" class="btn  btn-primary"><i class="fa  fa-floppy-o"></i>Save</button>
            </div>
            </form>
            </div>
            <div class="col-12 col-md-8 ">
                <div class="sub-title">Slider List</div>
        <table class="table table-borderd table-hover table-striped table-responsive">
            <tr>
                <th>ID</th>
                <th>Path</th>
                <th>Slide Pict</th>
                <th>Slide Pict_Ar</th>
                <th>Clicks</th>
                <th>Status</th>
                <th>-</th>
            </tr>
            <?php
                $sql = "SELECT * FROM `Slider` ORDER BY (slid_id) DESC";
                $res=$cn->query($sql);
                while($row=$res->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td>".$row["slid_id"]."</td>"; 
                     echo "<td>".$row["s_path"]."</td>"; 
                    echo "<td><img src='upload/".$row["slid_pct"]."' alt='slide image desc english'  class='serv_pct' /></td>";
                    echo "<td><img src='upload/".$row["spct_ar"]."' alt='slide image desc arabic'  class='serv_pct' /></td>";
                     echo  "<td>".$row["s_clics"]."</td>";
                     echo "<td class='text-capitalize'>".$row["slid_st"]."</td>"; 

                    echo "<td> <a class='btn btn-primary' href='slider.php?edite=".$row["slid_id"]."'><i class='fa fa-pencil-square'></i>Edit</a>&nbsp";

                    if($row["slid_st"]=="active")
                    {
                        echo "<a href='slider_status.php?eid=".$row["slid_id"]."&action=deactivite' class='btn btn-danger'><i class='fa fa-times-circle-o  '></i>Deactivite</a>&nbsp"
                        ;
                    }
                    else
                    {
                        
                        echo "<a href='slider_status.php?eid=".$row["slid_id"]."&action=activite' class=' btn btn-success'><i class='fa fa-check-circle-o '></i>Activite</a>&nbsp"
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