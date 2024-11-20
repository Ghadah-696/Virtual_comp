<?php
    $pg_name="My Profile";
include "include/cms_header.php";
$unn=$_SESSION["un"];
$id=$_SESSION["eid"];
$unp=$_SESSION["uph"];
$us=$_SESSION["ust"];

//code form change password
   if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $p1=$_POST["up1"];
        $p2=$_POST["up2"];
        $p3=$_POST["up3"];
        
        //encryption password
        $ep1=md5($p1);
        $ep2=md5($p2);
        $ep3=md5($p3);
        
        $sql="SELECT  u_pass FROM  users  WHERE u_id=".$id;
        
        $rs = $cn->query($sql);
        
        $rw = $rs->fetch_assoc();
        $pidb = $rw["u_pass"];
        
        if($ep1==$pidb)
        {
            if($p2==$p3)
            {
                if(strlen($p2)>5)
                {
                    $sql="UPDATE users SET  u_pass ='$ep2'  WHERE u_id=$id ";
                    $cn->query($sql);
                    
                    $msg= "<div class='alert alert-success'>Password Changed Successfully***</div>"; 
                }
                else
                {
                   $msg= "<div class='alert alert-danger'>Sorry:This Password Is Too Short !</div>";  
                }
            }
            else{
                $msg= "<div class='alert alert-danger'>Sorry:This Password Doesn't Conforming !</div>"; 
            }
        }
        else
        {
            $msg= "<div class='alert alert-danger'>Sorry:This Password Doesn't Exist In The Record !</div>"; 
        }
        
    }
        if(isset($msg))
        {
        echo $msg;
        }

        ?>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="sub-title">
                    My Information
                </div>
                <div class="form-group">
                    <label>User ID</label>
                    <input type="text" name="eid" id="eid" readonly="true" class="form-control" value="<?php  echo $id;     ?>" />


                </div>
    
           
        <div class="form-group">
        <label>Name</label>
            <input   readonly="true" name="un" id="un"  class="b form-control"
                   <?php if(isset($unn))
                               {
                                 echo "value='$unn'";  
                               }
                   ?>/>
        
        </div>
        <div class="form-group">
        <label>Phone</label>
            <input readonly="true"  name="uph" id="uph"  class="b form-control" <?php if(isset($unp))
       {
               echo "value='$unp'";  
       } 
                   ?>/>
        
        </div>
     <div class="form-group">
        <label>Status</label>
            <input readonly="true"   name="ust" id="ust"  class="b form-control" <?php if(isset($us))
                               {
                                 echo "value='$us'";  
                               }
                   ?>/>
        
        </div>
         
    </div>
    
        
    <div class="col-12 col-md-6">
    <div class="sub-title">
    Change Password
    </div>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?> "   >
        
        
        <div class="form-group">
            <label for="up1">Old Password</label>
        <input type="password" name="up1" id="up1"  placeholder="please enter your old password" required="required" class="form-control"/><span class="show-pass">
                <i class="fa fa-eye-slash"></i></span>
        </div>
            <div class="form-group">
            <label for="up2">New Password</label>
        <input type="password" name="up2" id="up2"  placeholder="please enter a new password" required="required" class="form-control"/><span class="show-pass2">
                <i class="fa fa-eye-slash"></i></span>
        </div>
            <div class="form-group">
            <label for="up3">New Password <small> Confirmation </small></label>
        <input type="password" name="up3" id="up3"  placeholder="please confirm a new password" required="required" class="form-control"/>
                 
                    <span class="show-pass3">
                <i class="fa fa-eye-slash"></i></span>
        </div>
            <div class="text-right">
            
                <button class="btn btn-primary text-right " type="submit" ><i class="fa fa-repeat "></i>Change</button>
                <button class="btn btn-primary text-right " type="reset" ><i class="fa fa-times-circle-o "></i>Cancel</button>
            </div>
            </form>
            </div>
</div>

<?php include "include/cms_footer.php"; ?>
