$(document).ready(function(){
    
    $(".show-pass").hover(function(){
       
        
       if($("#up").attr("type")=="password")
           {
               $("#up").attr("type","text");
           }
        else
            {
                $("#up").attr("type","password");
            }
        
    });
});