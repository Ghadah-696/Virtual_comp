<?php
   
$pg_name="FAQs Management";
include "include/cms_header.php";
    
    $fn1="Add New Question";
    
 


    //update users status:

            
        if(isset($_GET["update"]))
            
    {
            
          
        if($_GET["update"]=="true")
        {
            //echo  "Update Question";
            $msg= "<div class='alert alert-success'>Question Status Updated  Successsfully***</div>";
        }
        else
        {
            $msg= "<div class='alert alert-danger'>Sorry:Question Statuse Updated Faild!!!</div>";
        }
        
        }


    //edite
    elseif(isset($_GET["edite"]))
    {
        $fn1="Edit Quesion's Data";
        $id=$_GET["edite"];
        $sql = "SELECT * FROM `faqs`  WHERE f_id=$id;";
        
        
        $res= $cn->query($sql);
        $row=$res->fetch_assoc();
        
        $fqq=$row["f_qus"];
        $faa=$row["f_ans"];
        $fqq_ar=$row["fqus_ar"];
        $faa_ar=$row["fans_ar"];
        
        //echo $sql;
    }
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $f_qus=$_POST["f_qus"];
        $f_ans=$_POST["f_ans"];
        $fqus_ar=$_POST["fqus_ar"];
        $fans_ar=$_POST["fans_ar"];
        $eid=$_SESSION["eid"];
        
        if(isset($_POST["f_id"]))
        {
            //Edite
            $sql="UPDATE   `faqs` SET `f_qus`='$f_qus', `f_ans`='$f_ans' ,`fqus_ar`='$fqus_ar', `fans_ar`='$fans_ar' where f_id=".$_POST["f_id"];
            //echo $sql;
            if($cn->query($sql)===true)
            {
                $msg= "<div class='alert alert-success'>Question Updated  Successsfully****</div>";
            }
            else
            {
                $msg= "<div class='alert alert-danger'>Sorry:Faild  Update Question!</div>";
            }
           
        }
        else
        {
            //Insert
           $sql="INSERT INTO `faqs` (`f_qus`, `f_ans`, `fqus_ar`, `fans_ar`,`fp_stat`,`f_uid`) VALUES ('$f_qus','$f_ans','$fqus_ar','$fans_ar','active',$eid)";
            //echo $sql;
            
            if($cn->query($sql)===true)
            {
                $msg= "<div class='alert alert-success'>Question Added is  Successsfully</div>";
            }
            else
            {
                $msg= "<div class='alert alert-danger'>Sorry:Faild  Added Question!</div>";
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
                <label>Question ID</label>
                <input type="text" name="f_id" id="f_id" readonly="true" class="form-control" value="<?php  echo $id;     ?>" />


            </div>
            <?php } ?>
            <div class="form-group">
                <label>Question</label>

                <input required="required" name="f_qus" id="f_qus" placeholder="please enter the question" class=" form-control" <?php if(isset($fqq))
                               {
                                 echo "value='$fqq'";  
                               }
                   ?> />

            </div>
            <div class="form-group">
                <label>Answer</label>
                <textarea required="required" name="f_ans" id="f_ans" class="form-control"> <?php if(isset($faa))
                               {
                                 echo "value='$faa'";   
                               }
                   ?></textarea>
            </div>
            <div class="txt-align_ar">
                <div class="form-group">
                    <label>Question - Ar</label>

                    <input required="required" name="fqus_ar" id="fqus_ar" placeholder="الرجاء إدخال السؤال هنا" class="b form-control" <?php if(isset($fqq_ar))
                               {
                                 echo "value='$fqq_ar'";  
                               }
                   ?> />

                </div>
                <div class="form-group">
                    <label>Answer - Ar</label>
                    <textarea required="required" name="fans_ar" id="fans_ar" class="b form-control"> <?php if(isset($faa_ar))
                               {
                                 echo "value='$faa_ar'";  
                               }
                   ?></textarea>
                </div>
            </div>
            
            <div class="text-right">
                <button type="submit" class="btn  btn-primary"><i class='fa
                    fa-floppy-o'></i>Save</button>
            </div>
            </form>
            </div>
            <div class="col-12 col-md-8 ">
                <div class="sub-title">Question List</div>
        <table class="table table-borderd table-hover table-striped table-responsive">
            <tr>
                <th>ID</th>
                <th>Quesion</th>
                <th>Answer</th>
                <th>Quesion_ar</th>
                <th>Answer_ar</th>
                <th>Status</th>
                <th>Added By</th>
                <th>-</th>

            </tr>
            <?php
                $sql = "SELECT f_id,f_qus,f_ans,fqus_ar,fans_ar,fp_stat,u_name FROM `faqs` f,`users` u WHERE u.u_id=f.f_uid ORDER BY (f_id ) DESC";
                $res=$cn->query($sql);
                while($row=$res->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td>".$row["f_id"]."</td>"; 
                     echo "<td>".$row["f_qus"]."</td>"; 
                     echo "<td>".$row["f_ans"]."</td>"; 
                     echo "<td>".$row["fqus_ar"]."</td>"; 
                     echo "<td>".$row["fans_ar"]."</td>"; 
                    
                     echo "<td class='text-capitalize'>".$row["fp_stat"]."</td>"; 
                    
                     echo "<td>".$row["u_name"]."</td>";
                   
                    echo "<td> <a class='btn btn-primary' href='faqs.php?edite=".$row["f_id"]."'><i class='fa
                    fa-pencil-square'></i>Edit</a>&nbsp";
                    
                
                    
                    if($row["fp_stat"]=="active")
                    {
                        echo "<a href='faqs_status.php?eid=".$row["f_id"]."&action=deactivite' class='btn btn-danger'><i class='fa fa-times-circle-o '></i>Deactivite</a>&nbsp"
                        ;
                    }
                    else
                    {
                        
                        echo "<a href='faqs_status.php?eid=".$row["f_id"]."&action=activite' class=' btn btn-success'><i class='fa fa-check-circle-o '></i>Activite</a>&nbsp"
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