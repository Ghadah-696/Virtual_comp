<?php
   
$pg_name="Products Management";
include "include/cms_header.php";
    
    $fn1="Add New Products";

    //update Products status:

            
        if(isset($_GET["update"]))
            
    {
            
          
        if($_GET["update"]=="true")
        {
            //echo  "Update Question";
            $msg= "<div class='alert alert-success'>Products Status Updated  Successsfully***</div>";
        }
        else
        {
            $msg= "<div class='alert alert-danger'>Sorry:Products Statuse Updated Faild!!!</div>";
        }
        
        }

    //edite
   if(isset($_GET["edite"]))
    {
        $fn1="Edite Products's Data";
        $id=$_GET["edite"];
       //Get All Product's Details
        $sql = "SELECT * FROM `Products`  WHERE pro_id=$id;";
        
        
        $res= $cn->query($sql);
        $row=$res->fetch_assoc();
        
        $pnn=$row["pro_n"];
        $pdd=$row["pro_desc"];
        $pnn_ar=$row["prn_ar"];
        $pdd_ar=$row["prdes_ar"];
        
       
        
        //Product Images
       $sql="SELECT * FROM `pro_images` WHERE pro_id=$id;";
       
        $res=$cn->query($sql);
       $images=array();
       $c=0;
       while($row=$res->fetch_assoc())
       {
           $images[$c++]=$row["p_img"];
       }
    }
        //Delete Products Image
    if(isset($_GET["delete"]))
    {
        if($_GET["delete"]=="true")
        {
            $msg="<div class='alert alert-success'>Products Image Deleted  Successsfully***</div>";
        }
        else
        {
            $msg= "<div class='alert alert-danger'>Sorry:Products Images Deleted Faild!!!</div>";
        }
    }
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $pro_n=$_POST["pro_n"];
        $pro_desc=$_POST["pro_desc"];
        $prn_ar=$_POST["prn_ar"];
        $prdes_ar=$_POST["prdes_ar"];
        
        
        
        if(isset($_POST["pro_id"]))
        {
            
            //Edite
           
                $sql="UPDATE  `Products` SET `pro_n`='$pro_n', `pro_desc`='$pro_desc' ,`prn_ar`='$prn_ar', `prdes_ar`='$prdes_ar' where pro_id=".$_POST["pro_id"];

            
            $cn->query($sql);
            $pnni="product-".date("Ymd").time().rand();
            
            //Upload Images
            for($i=1;$i<6;$i++)
            {
                if(empty($_FILES["pp".$i]["name"])==false)
                {
                    if($_FILES["pp".$i]["size"]<19580000)
                    {
                        
                        //Upload
                     move_uploaded_file($_FILES["pp".$i]["tmp_name"],"upload/".$pnni."-$i.jpg");
                        
                        //insert
                        $sql="INSERT INTO `pro_images` (`p_img`,`pro_id`) values ('$pnni-$i.jpg','".$_POST["pro_id"]."')";
                        //echo $sql;
                        $cn->query($sql);
                    }
                    else
                    {
                        $perror="true";
                    }
                    
                }
            }
            
                $msg= "<div class='alert alert-success'>Products Updated  Successsfully****</div>";
           
           
        }
        else
        {
                        $perror="false";
              
                        //Insert
                       $sql="INSERT INTO `products` (`pro_n`, `pro_desc`, `prn_ar`, `prdes_ar`) VALUES ('$pro_n','$pro_desc','$prn_ar','$prdes_ar')";
                        //echo $sql;

                        if($cn->query($sql)===true)
                        {
                            $lid=$cn->insert_id;
                            
                            $pnni="product-".date("Ymd").time().rand();
                            
                            //Upload Images
                              for($i=1;$i<6;$i++)
                                {
                                     if(empty($_FILES["pp".$i]["name"])==false)
                                {
                                if($_FILES["pp".$i]["size"]<19580000)
                                { 
                                    move_uploaded_file($_FILES["pp".$i]["tmp_name"],"upload/".$pnni."-$i.jpg");
                                    //inser New Product Image                                  
                                  $sql="inser into `pro_images` (`p_img`,`prod_id`) values ('$pnni-$i.jpg','$lid')";
                                    $cn->query($sql); 
                                                                      
                                         }
                                    else
                                    {
                                        $perror="true";
                                    }
                                }
                              }
                                $msg= "<div class='alert alert-success'>Products Added is  Successsfully</div>";        }               
                        else
                        {
                            $msg= "<div class='alert alert-danger'>Sorry:Faild  Added Products!</div>";
                        }
                     }      
                 }  

    if(isset($msg))
    {
        echo $msg;
    }
    ?>


<div class="row">
    <div class="col-12 col-md-4">
        <div class="sub-title"><?php echo $fn1; ?>

        </div>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?> " enctype="multipart/form-data">
            <?php //for edit
            if(isset($_GET["edite"])){ ?>
            <div class="form-group">
                <label>Products ID</label>
                <input type="text" name="pro_id" id="pro_id" readonly="true" class="form-control" value="<?php  echo $id;     ?>" />


            </div>
            <?php } ?>
            <div class="form-group">
                <label>Products</label>

                <input required="required" name="pro_n" id="pro_n" placeholder="please enter the Product's Name" class="form-control" <?php if(isset($pnn))
                               {
                                 echo "value='$pnn'";  
                               }
                   ?> />

            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea required="required" name="pro_desc" id="pro_desc" class="form-control"> <?php if(isset($pdd))
                               {
                                 echo $pdd;  
                               }
                   ?></textarea>
            </div>
            <div class="text-right">
                <div class="form-group">
                    <label>اسم المنتج</label>

                    <input required="required" name="prn_ar" id="prn_ar" placeholder="الرجاء إدخال اسم المنتج هنا" class="b text-right form-control" <?php if(isset($pnn_ar))
                               {
                                 echo "value='$pnn_ar'";  
                               }
                   ?> />

                </div>
                <div class="form-group">
                    <label>وصف المنتج</label>
                    <textarea required="required" name="prdes_ar" id="prdes_ar" class="b text-right form-control"> <?php if(isset($pdd_ar))
                               {
                                 echo $pdd_ar;  
                               }
                   ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <input class="form-control" type="file" name="pp1" id="pp1" />
                <input class="form-control" type="file" name="pp2" id="pp2"  />
                <input class="form-control" type="file" name="pp3" id="pp3" />
                <input class="form-control" type="file" name="pp4" id="pp4"  />
                <input class="form-control" type="file" name="pp5" id="pp5" />
            
            </div>
            <div>
            <?php
                
                if(isset($id))
                {
                    $p=$id;
                }
                    if(isset($images[0]))
                    {
                    echo "<div class='img-del-border'><img class='ssl thumbnail' src='upload/".$images[0]."' alt='' whidth=100% />
                    <a href='pd.php?id=".$images[0]."&p=$p' class='btn btn-danger mt-3 btn-block' title='click for delete' onclick=' return confirm('Sure Delete This Image ?')'><i class='fa fa-times-circle-o'></i>Delete Picture</a>
                    </div>";
                       ;
                    }
                     if(isset($images[1]))
                    {
                    echo "<div class='img-del-border'><img class='ssl thumbnail' src='upload/".$images[1]."' alt='' whidth=100% />
                    <a href='pd.php?id=".$images[1]."&p=$p' class='btn btn-danger mt-3 btn-block' title='click for delete' onclick='return confirm('Sure Delete This Image ?')'><i class='fa fa-times-circle-o'></i>Delete Picture</a>
                    </div>";
                       ;
                    }
                     if(isset($images[2]))
                    {
                    echo "<div class='img-del-border'><img class='ssl thumbnail' src='upload/".$images[2]."' alt='' whidth=100% />
                    <a href='pd.php?id=".$images[2]."&p=$p' class='btn btn-danger mt-3 btn-block' title='click for delete' onclick='return confirm('Sure Delete This Image ?')'><i class='fa fa-times-circle-o'></i>Delete Picture</a>
                    </div>";
                       ;
                    }
                     if(isset($images[3]))
                    {
                    echo "<div class='img-del-border'><img class='ssl thumbnail' src='upload/".$images[3]."' alt='' whidth=100% />
                    <a href='pd.php?id=".$images[3]."&p=$p' class='btn btn-danger mt-3 btn-block' title='click for delete' onclick='return confirm('Sure Delete This Image ?')'><i class='fa fa-times-circle-o'></i>Delete Picture</a>
                    </div>";
                       ;
                    }
                     if(isset($images[4]))
                    {
                    echo "<div class='img-del-border'><img class='ssl thumbnail' src='upload/".$images[4]."' alt='' whidth=100% />
                    <a href='pd.php?id=".$images[4]."&p=$p' class='btn btn-danger mt-3 btn-block' ttitle='click for delete' onclick='return confirm('Sure Delete This Image ?')'><i class='fa fa-times-circle-o'></i>Delete Picture</a>
                    </div>";
                       ;
                    }
                
                
            ?>
            
            </div>
           
            <div class="text-right">
                <button type="submit" class="btn  btn-primary"><i class="fa fa-floppy-o"></i>Save</button>
            </div>
            </form>
       
            </div>
            <div class="col-12 col-md-8 ">
                <div class="sub-title">Products List</div>
            <table class="table table-borderd table-hover table-striped table-responsive">
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>اسم المنتج</th>
                <th>Product's Picture</th>
                <th>Status</th>
                <th>-</th>
            </tr>
            <?php
                
                 $sql = "SELECT p.pro_id as 'ddd',pro_n,prn_ar, pro_stat,(SELECT p_img FROM `pro_images` pi WHERE p.pro_id=pi.pro_id limit 1) as p_img FROM `products` p ORDER BY (p.pro_id) DESC";
                $res=$cn->query($sql);
                while($row=$res->fetch_assoc())
                {
                   echo "<tr>";
                    echo "<td>".$row["ddd"]."</td>"; 
                     echo "<td>".$row["pro_n"]."</td>"; 
                     echo "<td>".$row["prn_ar"]."</td>";
                    echo "<td><img src='upload/".$row["p_img"]."' alt='Product Image'  class='prod_pct' /></td>"; 
                     echo "<td class='text-capitalize'>".$row["pro_stat"]."</td>"; 
                    
                    echo "<td> <a class='btn btn-primary' href='products.php?edite=".$row["ddd"]."'><i class='fa
                    fa-pencil-square'></i>Edit</a>&nbsp";
                    
                     
                    if($row["pro_stat"]=="active")
                    {
                        echo "<a href='products_status.php?eid=".$row["ddd"]."&action=deactivite' class='btn btn-danger'><i class='fa fa-times-circle-o'></i>Deactivite</a>&nbsp"
                        ;
                    }
                    else
                    {
                        
                        echo "<a href='products_status.php?eid=".$row["ddd"]."&action=activite' class=' btn btn-success'><i class='fa fa-check-circle-o'></i>Activite</a>&nbsp"
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