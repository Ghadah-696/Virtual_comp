<?php
   
$pg_name="MessageManagement";
include "include/cms_header.php";
    
    $fn1="Edit Message's Data";
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
        $ms_frmb=$_POST["ms_frmb"];
        
        
      
         //Insert
           
    $sql="INSERT INTO `message`( `ms_stat`,`ms_sn`, `ms_sph`, `ms_sem`, `ms_subj`,`ms_body`,`ms_frmb`) VALUES ('unread','$ms_sn','$ms_sph','$ms_sem','$ms_subj','$ms_body','$ms_frmb')";
    echo $sql;
            if($cn->query($sql)===true)
            {
                $msg= "<div class='alert alert-success'>Message Added is  Successsfully</div>";
            }
            else
            {
                $msg= "<div class='alert alert-danger'>Sorry:Faild  Added Message!</div>";
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
                <label>Message ID</label>
                <input type="text" name="ms_id " id="ms_id" readonly="true" class="form-control" value="<?php  echo $id;     ?>" />


            </div>
             
            <?php } ?>
           
              <div class="form-group">
                <label>Language</label>
<select readonly="true"  class=" form-control" id="ms_frmb" name="ms_frmb">
           <option>English</option>
    <option>Arabic</option>
                </select></div>
            
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
           

</div>



<?php
        include ("include/cms_footer.php"); 
?>