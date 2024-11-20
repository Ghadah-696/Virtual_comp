<?php
   
$pg_name="Mail Inbox Management";
include "include/cms_header.php";
    
    //$fn1="Add New Question";
    if(isset($_GET["ms_id"]))
    {
        //to show single message
        $id=$_GET["ms_id"];
        
        //change message status
        $sql="UPDATE `message` SET ms_stat='read' WHERE ms_id=$id ";
        
        $cn->query($sql);
        
        //get all message details
        $sql = "SELECT * FROM `message` WHERE ms_id=$id";
        
        $res=$cn->query($sql);
        
        $row=$res->fetch_assoc();
        
        //Add Button to backword
        echo "<div class='text-right'><a href='message.php' class='btn btn-lg btn-primary'>Back<i class='fa fa-arrow-circle-o-right'></i></a></div>";
        
        
        echo "<table  class='table'>";
        echo "<tr><td>Website UI Language</td><td><input readonly='true' value='".$row["ms_frmb"]."' class='form-control'/></td></tr>";
        echo "<tr><td>Datetime Send</td><td><input readonly='true' value='".$row["ms_dt"]."' class='form-control'/></td></tr>";
        echo "<tr><td>Sender Name</td><td><input readonly='true' value='".$row["ms_sn"]."' class='form-control'/></td></tr>";
        echo "<tr><td>Sender Phone</td><td><input readonly='true' value='".$row["ms_sph"]."' class='form-control'/></td></tr>";echo "<tr><td>Sender Email</td><td><input readonly='true' value='".$row["ms_sem"]."' class='form-control'/></td></tr>";echo "<tr><td>Subject Send</td><td><input readonly='true' value='".$row["ms_subj"]."' class='form-control'/></td></tr>";echo "<tr><td>Messsage</td><td><textarea readonly='true' class='form-control'>". $row["ms_body"]." </textarea></td></tr>";
        echo"</table>";
    }
    else
    {
        //to sho all messages
?>
    
 


   <!-- MailBox -->
    <table class="table  table-border  ">
        <thead>
            <tr>
             <th>Sender Name</th>
             <th>Subject</th>
             <th>Date-Time send</th>
        
        </tr>
        </thead>
        <?php 
        $sql = "SELECT * FROM `message` ORDER BY ms_id  DESC";
        $res=$cn->query($sql);
        while($row=$res->fetch_assoc())
        {
            
            //echo "<a href='message.php?ms_id=".$row["ms_id"]."'>
            echo "<tr class='";
           
            if($row["ms_stat"]=="read")
            {
                echo "inbox-read";
            }
            else
            {
                 echo "inbox-unread";
            }
            echo "'><td><a class='inbox' href='message.php?ms_id=".$row["ms_id"]."'>".$row["ms_sn"]."</a></td>";
            echo "<td><a class='inbox' href='message.php?ms_id=".$row["ms_id"]."'>".$row["ms_subj"]."</a></td>";
            echo "<td><a class='inbox' href='message.php?ms_id=".$row["ms_id"]."'>".$row["ms_dt"]."</a></td>";
           echo "</tr></a>";
           
        }
        ?>

</table>
         



<?php
        }
        include ("include/cms_footer.php"); 
?>