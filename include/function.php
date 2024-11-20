<?php 

    //All functionds to will used on controle pages and setting

//Company name

    $com_name_en="Electronics Worlds";
    $com_name_ar=" عوالم الإلكترونيات" ; 



    
    //connect to database

    $serv="localhost";
    $un="root";
    $pass="";
    $db="compdb";

    $cn=new mysqli($serv,$un,$pass,$db);
        
        if($cn->connect_error)
        {
           // header("location:http://localhost/Company_Project/error.php");
        }

//functions to validate phone number
    function Check_Number($phone)
    
    {
        if(strlen($phone)==9)
        {
            $un="";
            for($i=0;$i<9;$i++)
        {
           
            $n=substr($phone,$i,1);
            if($n=="0" || $n=="1" || $n=="2" || $n=="3" || $n=="4" || $n=="5" || $n=="6" || $n=="7" || $n=="8" || $n=="9")
            {
                $un=$un.$n;
            }
                
        }
            if(strlen($un)==9)
            {
             $n=substr($un,0,2);
            if($n=="77" || $n=="70" || $n=="71" || $n== "73")
            {
                return TRUE;
            }
                else
                {
                   return FALSE; 
                }
            }
            else
            {
              return FALSE;  
            }
        }
        else
        {
            return FALSE;
        }
 }  

//functions fore hide message after 5 scond
/*
            function message(id , content , type , target)
            {
                $('<div class="alert alert-'+type+'" id="'+id+'">'+content+'</div>').hide().insertBefore(target).slideDown('500',function())
                {
                    setTimeout(function)
                    {
                        $('#'+id).slideUp(500,function(){$(this).remove();});
                    },5000);
                });
            }
*/
//myLatLng = new google.maps.LatLng({lat: -34, lng: 151}); 

    ?>

