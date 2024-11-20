$(document).ready(function()
{
    //setTimeout(function(){$("#load").hide();},5000);
    //$('.carousel').Carousel();
     /* $('.nav-item').onclick(function(e){
         $('.secondNav .nav-item').removeClass('active');
          $(this).addClass('active');
      }); */                                                                                                                     
   
    $(function(){
        $('.nav a').filter(function(){
            return this.href==location.href}).parent().addClass('active').siblings().removeClass('active');

        $('.nav a').click(function(){
            $(this).parent().addClass('active').siblings().removeClass('active')    
            });
        });

    
//class="google.maps.LatLng".myLatLng = new google.maps.LatLng({lat: -34, lng: 151}); 
});
/*var navMenu = document.getElementById("nav_main");
function selectItem()
{
    this.classList.add("menu");
    
    for(i = 0; i < 7 ;i++)
    {
        navMenu[i].classList.remove("menu");
    }
        
}*/
