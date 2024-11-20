
<!-- Message Page -->

<?php

$public_pg_name_en="Contact Us";
$public_pg_name_ar="تواصل معنا";


        include ("prv(cms)/include/public_header.php");
        

        $res=$cn->query("SELECT * FROM message ");
        $row=$res->fetch_assoc();


    
       
   
if($lng=="en")
    
              { 
                 echo "<div class='display-4'>$public_pg_name_en</div>";
}
else
{
     echo "<div class='display-4'>$public_pg_name_ar</div>";
}

    $fn1="Add New Message";

    //update testmonies status:

    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $ms_sn=$_POST["ms_sn"];
        $ms_sph=$_POST["ms_sph"];
        $ms_sem=$_POST["ms_sem"];
        $ms_subj=$_POST["ms_subj"];
        $ms_body=$_POST["ms_body"];
        $ms_frmb=$_POST["ms_frmb"];
        
        
        
        
        
       
          
             
                    
                        //Insert
                       $sql="INSERT INTO `message`(`ms_sn`, `ms_sph`, `ms_sem`, `ms_subj`, `ms_body`,ms_frmb) VALUES ('$ms_sn','$ms_sph','$ms_sem','$ms_subj','$ms_body','$ms_frmb')";
            echo $sql;
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
                <label> ID</label>
                <input type="text" name="ms_id " id="ms_id" readonly="true" class="form-control" value="<?php  echo $id;     ?>" />


            </div>
            <?php } ?>
            
                    <div class="form-group">
                        <label>Testimonies Name</label>

                       <input required="required" name="ms_sn" id="ms_sn" placeholder="please enter your name" class="form-control" />
                       </div>
                    <div class="form-group">
                        <label>Testimonies Text</label>
                        <textarea required="required" name="ms_sph" id="ms_sph" class="form-control"></textarea>
                        </div>
                    <div class="form-group">
                        <label>Company <small> (You Can Passing This Field Empty)</small></label>

                        <input name="ms_sem" id="ms_sem" class="form-control" />

                        </div>
                    <div class="form-group">
                        <label>Job<small> (You Can Passing This Field Empty)</small></label>

                        <input name="ms_subj" id="ms_subj" class="form-control" />

                         </div>
            <div class="form-group">
                        <label>Job<small> (You Can Passing This Field Empty)</small></label>

                        <input name="ms_body" id="ms_body" class="form-control" />

                         </div>
             
             
        
            <div class="form-group">
                <label>Page_Picture <small>Must be less than 1MB</small></label>
                <input type="file" accept="image/jpeg" id="tst_pct" name="tst_pct" />
            </div>
            <?php if($lng=="en") {
            echo '<div class="text-right">';
             echo '<button type="submit" class="btn  btn-primary">Post</button>';
            echo '</div>';
}
            else
            {
                 echo '<div class="text-right">';
             echo '<button type="submit" class="btn  btn-primary">إرسال</button>';
            echo '</div>';
            }
            ?>
            </form>
            </div>
    
            <div class="col-12 col-md-8 ">
                <div class="sub-title">testmonies List</div>
              <table class="table table-borderd table-hover table-striped ">
              <tr>
                 <th>ID</th>
                <?php if($lng=="en")
    
              { 
                
                
                
                echo '<th>Name</th>';
                echo '<th>Company</th>';
                echo '<th>Job</th>';
                echo '<th>Text</th>';
}
                else
                {
                echo '<th>الأسم</th>';
                echo '<th>الشركه</th>';
                echo '<th>المهنه</th>';
                echo '<td> نص الشهادة</td>';
                    }
                echo '<th>Picture</th>';
                
                  echo '</tr>';
            //$sql = " SELECT * FROM `testmonies` WHERE `tst_st`='Shown' AND `tst_frmb`='ar' ORDER BY (tst_id )  DESC"
                $sql = "SELECT * FROM `testmonies` WHERE tst_st='Shown'  ORDER BY (tst_id )  DESC";
                $res=$cn->query($sql);
                while($row=$res->fetch_assoc())
                {
                     echo "<tr>";
                    echo "<td>".$row["tst_id"]."</td>"; 
                    //if(isset($row["tst_frmb"])=="en"){}
                   if($lng=="en")
    
              { 
                        echo "<td><div>".$row["tst_nm"]."</div></td>";
                       
                        echo "<td><div>".$row["tst_cmp"]."</div></td>";
                        echo "<td><div>".$row["tst_jb"]."</div></td>";
                           
                        echo "<td><textarea>".$row["t_txt"]."</textarea></td>";
                   }
                    else
                    {
                        echo "<td><div>".$row["tnm_ar"]."</div></td>"; 
                        echo "<td><div>".$row["tcomp_ar"]."</div></td>";
                        echo "<td><div>".$row["tj_ar"]."</div></td>";
                        echo "<td><textarea>".$row["ttxt_ar"]."</textarea></td>";
                    }
                       
                     
                    echo "<td><div><img src='prv(cms)/upload/".$row["tst_pct"]."' alt='Sender`s image'  class='serv_pct' /><t/divd></td>"; 
                    
                   
                    echo "</tr>";
                }
                
                
                ?>

        </table>
    </div>

</div>




   <?php
include ("prv(cms)/include/public_footer.php");

?>     
