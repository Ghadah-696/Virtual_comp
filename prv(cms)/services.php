<?php
   
$pg_name="Services Management";
include "include/cms_header.php";
    
    $fn1="Add New Services";



    //edite
   if(isset($_GET["edite"]))
    {
        $fn1="Edit Services's Data";
        $id=$_GET["edite"];
        $sql = "SELECT * FROM `services`  WHERE s_id=$id;";
        
        
        $res= $cn->query($sql);
        $row=$res->fetch_assoc();
        
        $stt=$row["s_titl"];
        $sdd=$row["s_desc"];
        $stt_ar=$row["st_ar"];
        $sdd_ar=$row["sd_ar"];
        $spp=$row["s_pct"];
       $sii=$row["s_icon"];
        
        
        //echo $sql;
    }
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $s_titl=$_POST["s_titl"];
        $s_desc=$_POST["s_desc"];
        $st_ar=$_POST["st_ar"];
        $sd_ar=$_POST["sd_ar"];
        
        
        
        if(isset($_POST["s_id"]))
        {
            
            //Edite
            $purl_old=$_POST["sp_old"];
            $iurl_old=$_POST["si_old"];
            
            if(empty($_FILES["s_pct"]["name"])==false)
            {
                
                $newPn="Service-".date("Ymd").time().rand(1000000,9999999);
                
                //Upload Pictur
                
                if($_FILES["s_pct"]["size"]<912000)
                { 
                    move_uploaded_file($_FILES["s_pct"]["tmp_name"],"upload/".$newPn."-p.jpg");
                    
                    $purl_old= $newPn."-p.jpg";
                }
                  
            }
            
            if(empty($_FILES["s_icon"]["name"])==false)
            {
            //Upload Icon
                $newPn="Service-".date("Ymd").time().rand(1000000,9999999);
                if($_FILES["s_icon"]["size"]<102400)
                { 
                    move_uploaded_file($_FILES["s_icon"]["tmp_name"],"upload/".$newPn."-i.jpg");
                    
                    $iurl_old= $newPn."-i.jpg";
                }
            }
            
                $sql="UPDATE   `services` SET `s_titl`='$s_titl', `s_desc`='$s_desc' ,`st_ar`='$st_ar', `sd_ar`='$sd_ar',`s_pct`='$purl_old', `s_icon`='$iurl_old' where s_id=".$_POST["s_id"];

            
            $cn->query($sql);
            
                $msg= "<div class='alert alert-success'>Services Updated  Successsfully****</div>";
           
           
        }
        else
        {
          
            if(isset($_FILES))
            {
                if(empty($_FILES["s_pct"])==false && empty($_FILES["s_icon"])==false)
                {
                    $newPn="Service-".date("Ymd").time().rand(1000000,9999999);
                    
                        
                    
                    //upload Picture
                    if($_FILES["s_pct"]["size"]<912000)
                    {
                        move_uploaded_file($_FILES["s_pct"]["tmp_name"],"upload/".$newPn."-p.jpg");
                        
                        if($_FILES["s_icon"]["size"]<102400)
                    {
                        move_uploaded_file($_FILES["s_icon"]["tmp_name"],"upload/".$newPn."-i.jpg");
                            
                            $pname=$newPn."-p.jpg";
                            $iname=$newPn."-i.jpg";
                            
                    //Insert
                   $sql="INSERT INTO `services` (`s_titl`, `s_desc`, `st_ar`, `sd_ar`,`s_pct`,`s_icon`) VALUES ('$s_titl','$s_desc','$st_ar','$sd_ar','$pname','$iname')";
                    //echo $sql;

                    if($cn->query($sql)===true)
                    {
                        $msg= "<div class='alert alert-success'>Services Added is  Successsfully</div>";
                    }
                    else
                    {
                        $msg= "<div class='alert alert-danger'>Sorry:Faild  Added Services!</div>";
                    }

                    }
                    else
                    {
                        $msg= "<div class='alert alert-danger'>The Icon Size Exceed The Max Limit!</div>";
                    }
                        
                    }
                    else
                    {
                        $msg= "<div class='alert alert-danger'>The Picture Size Exceed The Max Limit!</div>";
                    }
                    
                }
                else
                {
                    $msg= "<div class='alert alert-danger'>Please Select Picture and Icon for the Services!</div>";
                }
            }
            else
            {
                $msg= "<div class='alert alert-danger'>Please Select Picture for Services!</div>";
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
                <label>Services ID</label>
                <input type="text" name="s_id" id="s_id" readonly="true" class="form-control" value="<?php  echo $id;     ?>" />


            </div>
            <?php } ?>
            <div class="form-group">
                <label>Services</label>

                <input required="required" name="s_titl" id="s_titl" placeholder="please enter the Services" class="form-control" <?php if(isset($stt))
                               {
                                 echo "value='$stt'";  
                               }
                   ?> />

            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea required="required" name="s_desc" id="s_desc" class="form-control"> <?php if(isset($sdd))
                               {
                                 echo $sdd;  
                               }
                   ?></textarea>
            </div>
            <div class="txt-align_ar">
                <div class="form-group">
                    <label>Services - Ar</label>

                    <input required="required" name="st_ar" id="st_ar"  class="b form-control" <?php if(isset($stt_ar))
                               {
                                 echo "value='$stt_ar'";  
                               }
                   ?> />

                </div>
                <div class="form-group">
                    <label>Description - Ar</label>
                    <textarea required="required" name="sd_ar" id="sd_ar" class="b form-control"> <?php if(isset($sdd_ar))
                               {
                                 echo $sdd_ar;  
                               }
                   ?></textarea>
                </div>
            </div>
            <?php
                
                if(isset($spp))
                {
                    echo "<div class='mb-3'><img class='ssl rounded' src='upload/$spp' alt='services pictur' whidth=100% /></div>";
                       echo "<input type='hidden' id='sp_old' name='sp_old' value='$spp' />";
                }
                
            ?>
            <div class="form-group">
                <label>Serv.Picture <small>Must be less than 800KB</small></label>
                <input type="file" accept="image/jpeg" id="s_pct" name="s_pct" />
            </div>
            <?php
                
                if(isset($sii))
                {
                    echo "<div class='mb-3'><img class='ssl' src='upload/$sii' alt='services icon' whidth=100% /></div>";
                    echo "<input type='hidden' id='si_old' name='si_old' value='$sii' />";
                }
                
            ?>
            <div class="form-group">
                <label>Serv.Icon <small>Must be less than 100KB</small></label>
                <input type="file" accept="image/jpeg" id="s_icon" name="s_icon"  />
            
            
            </div>
            <div class="text-right">
                <button type="submit" class="btn  btn-primary"><i class="fa fa-floppy-o"></i>Save</button>
            </div>
            </form>
            </div>
            <div class="col-12 col-md-8 ">
                <div class="sub-title">Services List</div>
        <table class="table table-borderd table-hover table-responsive  table-striped ">
            <tr>
                <th>ID</th>
                <th>Services</th>
                <th>Services in Arabic Languge</th>
                <th>Serv.Pict</th>
                <th>Serv.Icn</th>
                <th>Status</th>
                <th>-</th>
            </tr>
            <?php
            
                $sql = "SELECT * FROM `services` ORDER BY (s_id ) DESC";
                $res=$cn->query($sql);
                while($row=$res->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td>".$row["s_id"]."</td>"; 
                     echo "<td>".$row["s_titl"]."</td>"; 
                     echo "<td>".$row["st_ar"]."</td>"; 
                    echo "<td><img src='upload/".$row["s_pct"]."' alt='service picture'  class='serv_pct' /></td>"; 
                    echo "<td><img src='upload/".$row["s_icon"]."' alt='service icon' class='serv_pct' /></td>";
                    echo "<td class='text-capitalize'>".$row["s_st"]."</td>"; 
                    
                    echo "<td> <a class='btn btn-primary' href='services.php?edite=".$row["s_id"]."'><i class='fa fa-pencil-square'></i>Edit</a>&nbsp";
                    
                    if($row["s_st"]=="active")
                    {
                        echo "<a href='services_status.php?eid=".$row["s_id"]."&action=deactivite' class='btn btn-danger'><i class='fa fa-times-circle-o'></i>Deactivite</a>&nbsp"
                        ;
                    }
                    else
                    {
                        
                        echo "<a href='services_status.php?eid=".$row["s_id"]."&action=activite' class=' btn btn-success'><i class='fa fa-check-circle-o '></i>Activite</a>&nbsp"
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