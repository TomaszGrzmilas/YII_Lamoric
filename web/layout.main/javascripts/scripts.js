function showmoredetails(el)
{
    if($("#box"+el).children('.list-cell-more').css('display')=='none')
    {
        $("#box"+el).children('.list-cell-more').show("slow");
        $("#box"+el).addClass('open');
        $("#box"+el+' .pan-btn-show').removeClass('pan-btn-show').addClass('pan-btn-hide');
    }
    else
    {
        $("#box"+el).children('.list-cell-more').hide("fast");
        $("#box"+el).removeClass('open');
        $("#box"+el+' .pan-btn-hide').removeClass('pan-btn-hide').addClass('pan-btn-show');
    }
}


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

