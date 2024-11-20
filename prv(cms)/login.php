<?php 
    session_start();

    if(isset($_SESSION["uph"]))
       {
           header("location:index.php");
           
           exit();
       }


   if($_SERVER["REQUEST_METHOD"]=="POST")
   {
       
       require ("include/function.php");
       $uph=$_POST["uph"];
       $up=$_POST["up"];
       $upe=md5($up);
       
       //check user info
       //$sql="SELECT  u_name,u_ph,u_stat FROM `users` WHERE u_ph='$uph'";
      $sql="SELECT `u_id`, `u_name`, `u_stat`, `u_ph`, `u_pass` FROM `users` WHERE u_ph='$uph' "; 
       
       $res=$cn->query($sql);
           
           if($row=$res->fetch_assoc())
           {
               //compare between pass inserted by user and pass  returned from db 
               if($upe===$row["u_pass"])
               {
                   if($row["u_stat"]=="enable")
                   {
                   $_SESSION["un"]=$row["u_name"];
                   $_SESSION["uph"]=$row["u_ph"];
                   $_SESSION["eid"]=$row["u_id"];
                   $_SESSION["ust"]=$row["u_stat"];

                   header("location:http://localhost/Company_Project/prv(cms)/index.php");
                   exit();
                   }
                   else
                   {
                       $msg="Sory:Your Account Is Inactiv!" ;
                   }
                  
               }
               else
               {
                   $msg="Sory:This Password Doesn't Exist!" ;
               }
               
           }
       else
               {
                   $msg="Sory:This User Doesn't Exist!";
               }
       
   }

?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/cms.css" />



</head>
    

<body>
    <div class="log">

        <h1 class="text-center">Log In</h1>
        <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
            <div class="inp form-group">
                <label for="uph">User phone</label>
                <input autocomplete="off" type="tel" name="uph" id="uph" placeholder="please enter your phone number" required="required" class="form-control" maxlength="9" <?php if(isset($uph))
               
                            {
                                    echo "value='$uph'";

                            }
                       ?>
                      />

            </div>
            <div class="form-group">
                <label for="up">Password</label>
                <input autocomplete="new-password" type="password" name="up" id="up" placeholder="please enter your password" required="required" class="form-control" />
                <span class="show-pass"></span>
                <i class="fa fa-eye-slash"></i>
            </div>
            <div class="text-right">
                <?php if(isset($msg))
                {
                    echo "<div class='alert alert-danger '>$msg</div>";
                }
            
            ?>
                <button class="btn btn-primary " type="submit"><i class="fa fa-sign-in "></i>Sign in</button>
            </div>
        </form>
    </div>
</body>

</html>
