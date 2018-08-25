$(document).ready(function(){
	
	$('.left-menu .show-button').click(function(){
       if($('.left-menu').css('width')=='50px')
       {
           $('.left-menu').css('width','100%');
           $('.left-menu .logo').css('display','block');
           $('.left-menu .left-menu-list').css('display','block');
       }
        else
        {
           $('.left-menu').css('width','');
            $('.left-menu .logo').css('display','');
           $('.left-menu .left-menu-list').css('display','');
        }
    });

});