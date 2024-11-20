<?php
   
$pg_name="Branches Management";
include "include/cms_header.php";
    
    $fn1="Add New Branches";
    
 


    //update users status:

            
        if(isset($_GET["update"]))
            
    {
            
          
        if($_GET["update"]=="true")
        {
            //echo  "Update Question";
            $msg= "<div class='alert alert-success'>Brunches Status Updated  Successsfully***</div>";
        }
        else
        {
            $msg= "<div class='alert alert-danger'>Sorry:Question Statuse Updated Faild!!!</div>";
        }
        
        }


    //edite
    elseif(isset($_GET["edite"]))
    {
        $fn1="Edit Brunches's Data";
        $id=$_GET["edite"];
        $sql = "SELECT * FROM `branches`  WHERE br_id=$id;";
        
        
        $res= $cn->query($sql);
        $row=$res->fetch_assoc();
        
        $bnn=$row["br_n"];
        $baa=$row["br_add"];
        $bnn_ar=$row["bn_ar"];
        $baa_ar=$row["badd_ar"];
        $btt=$row["br_ph"];
        $bee=$row["br_em"];
        $blan=$row["br_lan"];
        $blon=$row["br_log"];
        
        //echo $sql;
    }
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        
        $br_n=$_POST["br_n"];
        $br_add=$_POST["br_add"];
        $bn_ar=$_POST["bn_ar"];
        $badd_ar=$_POST["badd_ar"];
        $br_ph=$_POST["br_ph"];
        $br_em=$_POST["br_em"];
        $br_lan=$_POST["br_lan"];
        $br_log=$_POST["br_log"];
        
        if(isset($_POST["br_id"]))
        {
            //Edite
            $sql="UPDATE   `branches` SET `br_n`='$br_n', `br_add`='$br_add' ,`bn_ar`='$bn_ar', `badd_ar`='$badd_ar' ,`br_ph`='$br_ph' ,`br_em`='$br_em',`br_lan`='$br_lan' ,`br_log`='$br_log' where br_id=".$_POST["br_id"];
            //echo $sql;
            if($cn->query($sql)===true)
            {
                $msg= "<div class='alert alert-success'>Brunches Updated  Successsfully****</div>";
            }
            else
            {
                $msg= "<div class='alert alert-danger'>Sorry:Faild  Update Brunches!</div>";
            }
           
        }
        else
        {
            //Insert
           $sql="INSERT INTO `branches` ( `br_n`, `br_add`, `bn_ar`,`badd_ar`,`br_ph`,`br_em`,`br_lan`,`br_log`) VALUES ('$br_n','$br_add','$bn_ar','$badd_ar','$br_ph','$br_em','$br_lan','$br_log')";
            echo $sql;
            
            if($cn->query($sql)===true)
            {
                $msg= "<div class='alert alert-success'>Brunches Added is  Successsfully</div>";
            }
            else
            {
                $msg= "<div class='alert alert-danger'>Sorry:Faild  Added Brunches!</div>";
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
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?> ">
            <?php if(isset($_GET["edite"])){ ?>
            <div class="form-group">
                <label>Branches ID</label>
                <input type="text" name="br_id" id="br_id" readonly="true" class="form-control" value="<?php  echo $id;     ?>" />


            </div>
            <?php } ?>
            <div class="form-group">
                <label>Branches Name</label>

                <input required="required" name="br_n" id="br_n" placeholder="please enter the Brunches" class="b form-control" <?php if(isset($bnn))
                               {
                                 echo "value='$bnn'";  
                               }
                   ?> />

            </div>
            <div class="form-group">
                <label>Branches Address</label>
                <textarea required="required"  name="br_add" id="br_add" class="form-control"> <?php if(isset($baa))
                               {
                                 echo $baa;  
                               }
                   ?></textarea>
            </div>
            <div class="txt-align_ar">
                <div class="form-group">
                    <label>Branches Name - Ar</label>

                    <input required="required" name="bn_ar" id="bn_ar" placeholder="يرجى إدخال اسم الفرع هنا" class="b form-control" <?php if(isset($bnn_ar))
                               {
                                 echo "value='$bnn_ar'";  
                               }
                   ?> />

                </div>
                <div class="form-group">
                    <label>Branches Address - Ar</label>
                    <textarea required="required" name="badd_ar" id="badd_ar" class="b form-control"> <?php if(isset($baa_ar))
                               {
                                 echo $baa_ar;  
                               }
                   ?></textarea>
                </div>
            </div>
             <div class="form-group">
                    <label>Branches Phone</label>

                    <input maxlength="9" type="tel" required="required" name="br_ph" id="br_ph"  class="form-control" <?php if(isset($btt))
                               {
                                 echo "value='$btt'";  
                               }
                   ?> />

                </div>
             <div class="form-group">
                    <label>Branches Email</label>

                    <input type="email" required="required" name="br_em" id="br_em"  class="form-control" <?php if(isset($bee))
                               {
                                 echo "value='$bee'";  
                               }
                   ?> />

                </div>
             <div class="form-group">
                    <label>Langtitude</label>

                    <input  name="br_lan" id="br_lan"  class="form-control" <?php if(isset($blan))
                               {
                                 echo "value='$blan'";  
                               }
                   ?> />

                </div>
             <div class="form-group">
                    <label>Longtitude</label>

                    <input  name="br_log" id="br_log"  class="form-control" <?php if(isset($blon))
                               {
                                 echo "value='$blon'";  
                               }
                   ?> />

                </div>
            
            
            <?php
            
                 if(isset($blan) && isset($blon))
            {
              echo  "<div><iframe width='100%' height='350px' class='embed-responsive-item'  src='https://maps.google.com/maps?q=$blan,$blon&amp;&z=17&amp&ie=UTF8&iwloc=&output=embed' > </iframe></div>";
            }
            
          // echo "<div class='mapouter'><div class='gmap_canvas'><iframe width='600' height='500' id='gmap_canvas' src='https://maps.google.com/maps?q=%D8%B5%D9%86%D8%B9%D8%A7%D8%A1%20%D9%85%D9%84%D8%B9%D8%A8%20%D8%A7%D9%84%D8%AB%D9%88%D8%B1%D8%A9&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe><a href='https://www.whatismyip-address.com'></a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>";
           
           
                 /* echo "<div class='mapouter'><div class='gmap_canvas'><iframe src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBIwzALxUPNbatRBj3Xi1Uhp0fFzwWNBkE&callback=initMap&libraries=&v=weekly'
                  defer></iframe></div>";
                  
                  /////15.4173214,44.1982244,17z
     
            
            if(isset($blan) && isset($blon))
            {
                echo "<div class='mapouter'><div class='gmap_canvas'><iframe width='600' height='500' id='gmap_canvas' src='https://maps.google.com/maps?q=$blan,$blan&amp;&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe><a href='https://www.whatismyip-address.com/divi-discount/'></a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>";
            }*/
            
            ?>
            
            <div class="text-right">
                <button type="submit" class="btn  btn-primary">Save</button>
            </div>
            </form>
            </div>
            <div class="col-12 col-md-8 ">
                <div class="sub-title">Branches List</div>
        <table class="table table-borderd table-hover table-striped ">
            <tr>
                <th>ID</th>
                <th>Branche Name</th>
                <th>Branche Address</th>
                <th>Status</th>
                
                <th>-</th>

            </tr>
            <?php
                $sql = "SELECT * FROM `branches`  ";
                $res=$cn->query($sql);
                while($row=$res->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td>".$row["br_id"]."</td>"; 
                     echo "<td>".$row["br_n"]."</td>"; 
                     echo "<td>".$row["br_add"]."</td>"; 
                    
                    
                     echo "<td class='text-capitalize'>".$row["b_stat"]."</td>"; 
                    
                     
                   
                    echo "<td> <a class='btn btn-primary' href='branches.php?edite=".$row["br_id"]."'><i class='fa fa-pencil-square '></i>Edit</a>&nbsp";
                    
                
                    
                    if($row["b_stat"]=="active")
                    {
                        echo "<a href='branches_status.php?eid=".$row["br_id"]."&action=deactivite' class='btn btn-danger'><i class='fa fa-times-circle-o '></i>Deactivite</a>&nbsp"
                        ;
                    }
                    else
                    {
                        
                        echo "<a href='branches_status.php?eid=".$row["br_id"]."&action=activite' class=' btn btn-success'><i class='fa fa-check-circle-o'></i>Activite</a>&nbsp"
                        ;
                    
                    }//save
               
                    echo "</tr>";
                }
                
                
                ?>

        </table>
    </div>

</div>



<?php
        include ("include/cms_footer.php"); 
?>