<?php
   
$pg_name="Users Management";
include "include/cms_header.php";
    
    $fn1="Add New User";
  
    //update users status:

            
        if(isset($_GET["update"]))
            
    {
          
        if($_GET["update"]=="true")
        {
            echo  "Update User's Data";
            $msg= "<div class='alert alert-success'>User Status Updated  Successsfully***</div>";
        }
        else
        {
            $msg= "<div class='alert alert-danger'>User Statuse Updated Faild!!!</div>";
        }
        
        }
//reset

 elseif(isset($_GET["reset"]))
            
    {
            
        if($_GET["reset"]=="true")
        {
            $msg= "<div class='alert alert-success'>User pass reset Successsfully***</div>";
        }
        else
        {
            $msg= "<div class='alert alert-danger'>User pass reset Faild!!!</div>";
        }
        
        }
    elseif(isset($_GET["edite"]))
    {
        $fn1="Edit User's Data";
        $id=$_GET["edite"];
        $sql="SELECT * FROM `users` WHERE u_id=$id";
       
        
        $res= $cn->query($sql);
        $row=$res->fetch_assoc();
        
        $unn=$row["u_name"];
        $unp=$row["u_ph"];
        
        //echo $sql;
    }
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $un=$_POST["un"];
        $uph=$_POST["uph"];
        
        if(isset($_POST["eid"]))
        {
            //Edite
            if(Check_Number($uph)==true)
        {
            $sql="UPDATE   `users` SET `u_name`='$un', `u_ph`='$uph' where u_id=".$_POST["eid"];
            
            if($cn->query($sql)===true)
            {
                $msg= "<div class='alert alert-success'>User Updated  Successsfully****</div>";
            }
            else
            {
                $msg= "<div class='alert alert-danger'>Sorry:Faild  Update User!</div>";
            }
        }
        else
        {
            $msg= "<div class='alert alert-danger'>Invalide Number</div>";
        }
        }
        else
        {
            //Insert
            if(Check_Number($uph)==true)
        {
            $sql="INSERT INTO `users`( `u_name`, `u_stat`, `u_ph`, `u_pass`) VALUES ('$un','enable','$uph',md5('123456'))";
            
            if($cn->query($sql)===true)
            {
                $msg= "<div class='alert alert-success'>User Added is  Successsfully</div>";
            }
            else
            {
                $msg= "<div class='alert alert-danger'>Sorry:Faild  Added User!</div>";
            }
        }
        else
        {
            $msg= "<div class='alert alert-danger'>Sorry:Invalide Number</div>";
        }
            
        }
        
        
    }
       


    if(isset($msg))
    {
        echo $msg;
    }
    ?>


    <div class="row">
    <div class="col-12 col-md-5 " >
        <div class="sub-title"><?php echo $fn1; ?>
              
       </div>
       <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?> "   >
           <?php if(isset($_GET["edite"])){ ?>
           <div class="form-group">
               <label>User ID</label>
               <input type="text" name="eid" id="eid" readonly="true" class="form-control"
                      value="<?php  echo $id;     ?>" />
           
           
           </div>
           <?php } ?>
        <div class="form-group">
        <label>Name</label>
            <input  required="required"  name="un" id="un" placeholder="Display Name" class="b form-control"
                   <?php if(isset($unn))
                               {
                                 echo "value='$unn'";  
                               }
                   ?>/>
        
        </div>
        <div class="form-group">
        <label>Phone</label>
            <input maxlength="9" required="required"  name="uph" id="uph" placeholder="Phone Number" class="b form-control" <?php if(isset($unp))
                               {
                                 echo "value='$unp'";  
                               }
                   ?>/>
        
        </div>
        <div class="text-right">
        <button type="submit" class="btn  btn-primary"><i class="fa fa-floppy-o"></i>Save</button>
            </div>
           </form>
        </div>
        <div class="col-12 col-md-7 ">
        <div class="sub-title">Users List</div>
            <table class="table table-borderd table-hover table-striped ">
            <tr>
                <td>ID </td>
                <td>User Name </td>
                <td class="">Status </td>
                <td>Phone Numper </td>
                <td> - </td>
                
                
            </tr>
                <?php
                
                    $sql="SELECT * FROM `users` ORDER BY (u_id ) DESC";
                $res=$cn->query($sql);
                while($row=$res->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td>".$row["u_id"]."</td>"; 
                     echo "<td>".$row["u_name"]."</td>"; 
                     echo "<td class='text-capitalize'>".$row["u_stat"]."</td>"; 
                     echo "<td>".$row["u_ph"]."</td>";
                   
                    echo "<td > <a class='btn btn-primary' href='users.php?edite=".$row["u_id"]."'><i class='fa fa-pencil-square'></i>Edit</a>&nbsp";
                    
                    
                    
                    if($row["u_stat"]=="enable")
                    {
                        echo "<a href='user_status.php?eid=".$row["u_id"]."&action=deactivite' class='btn btn-danger'><i class='fa fa-times-circle-o '></i>Deactivite</a>&nbsp"
                        ;
                    }
                    else
                    {
                        
                        echo "<a href='user_status.php?eid=".$row["u_id"]."&action=activite' class=' btn btn-success'><i class='fa fa-check-circle-o '></i>Activite</a>&nbsp"
                        ;
                    
                    }
                    echo "<a href='user_status.php?eid=".$row["u_id"]."&action=reset' class=' btn btn-warning'><i class='fa fa-repeat '></i>Res</a>";
                    echo "</td> </tr>";
                }
                
                
                ?>
        
            </table>
        </div>
        
        </div>    



<?php
        include ("include/cms_footer.php"); 
?>