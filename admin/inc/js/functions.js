/*
 _____  __  __  ____                __                   
/\___ \/\ \/\ \/\  _`\             /\ \                  
\/__/\ \ \ \_\ \ \ \/\_\    ___    \_\ \     __    ____  
   _\ \ \ \  _  \ \ \/_/_  / __`\  /'_` \  /'__`\ /',__\ 
  /\ \_\ \ \ \ \ \ \ \L\ \/\ \L\ \/\ \L\ \/\  __//\__, `\
  \ \____/\ \_\ \_\ \____/\ \____/\ \___,_\ \____\/\____/
   \/___/  \/_/\/_/\/___/  \/___/  \/__,_ /\/____/\/___/ 
                                                         
http://www.jhcodes.com/
Jesus Herrera - jesuxherrera@jhcodes.com
*/


///// Loading /////
var opts = {lines:17,length:10,width:2,radius:13,corners:1,rotate:0,direction:1,color:'#FFF',speed:1,trail:60,shadow:false,hwaccel:false,className:'spinner',zIndex:2e9,top:'50%',left:'50%'};
var target = document.getElementById('loading');
var spinner = new Spinner(opts).spin(target);

// Page Load
$(document).ready(function() {
  $(window).load(function() {

       // Efect Spinner
      $("#loading").fadeOut(1000);

      $("#header").addClass("animated fadeInDown").fadeIn(1000);

    });
});


$(document).ready(function(){

$(".sparkline").sparkline([0,25,0,12,82,0,21,59,34,75,10], {
    type: 'line',
    width: '90%',
    height: '50',
    lineColor: '#a9a9b2',
    fillColor: '#ffffff',
    drawNormalOnTop: false
});




$(".user-block a").on( "click", function(){
	  $(this).hide();
	  $(this).parent().addClass("animated flipOutY");
});


// Add slideup & fadein animation to dropdown
$('.dropdown').on('show.bs.dropdown', function(e){
   var $dropdown = $(this).find('.dropdown-menu');
   var orig_margin_top = parseInt($dropdown.css('margin-top'));
   $dropdown.css({'margin-top': (orig_margin_top + 10) + 'px', opacity: 0}).animate({'margin-top': orig_margin_top + 'px', opacity: 1}, 300, function(){
      $(this).css({'margin-top':''});
   });
});



$(document).keypress(function(e) { 
    //13 es el codigo de la tecla
   if(e.which == 13) {   
       var mensaje = $('input#mensaje').val();
       $('ul#text-content').append('<li class="right clearfix"><div class="chat-body clearfix"><p>'+mensaje+'</p></div></li>');
       $('input#mensaje').val('');
   }
});  



$("#chat-container i").on( "click", function(){
    
     if ($(this).hasClass("fa-rotate-180")){
         $(this).removeClass("fa-rotate-180");
         return;
     }

     $(this).addClass("fa-rotate-180");


});


});


