var box_select = 'box_user';
var mode_box_users = 1;
var img_select = '';
var element_this = false;
//$(document).ready(function(){});
function opt_mode_users($this){
	mode = $($this).val();
	console.log("mode: "+mode);
    if(mode == 1){
	    mode_box_users = 1;
		$("#box_user").show();
		$("#box_userFriend").hide();
	}else if(mode == 2){
	    mode_box_users = 2;	
		$("#box_user").show();
		$("#box_userFriend").show();		
	}else if(mode == 3){
	    mode_box_users = 3;		
		$("#box_user").hide();
		$("#box_userFriend").show();	
	}else if(mode == 4){
	    mode_box_users = 4;		
		$("#box_user").show();
		$("#box_userFriend").show();
		$("#box_userFriend").show();
	}
    load_values();		
}
var change_mode_opt = function($this){
	var obj = $($this);
	$(".box_edit_opt_select").removeClass('box_edit_opt_select');
	obj.addClass('box_edit_opt_select');
	if(obj.attr('data-value') == 'avan'){
		$('#box_avance_edit').show();
		$('#box_vasic_info').hide();
		var shear_box_select = setInterval(function(){
	        if($(".box_selects").length > 0){
    		    clearInterval(shear_box_select); 
	    		console.log("SetInterval Clear");
                $('.box_selects')
			      .resizable({
                    aspectRatio: 16 / 16,
	                containment: ".box-text-edit",
                    minHeight: 50,
                    minWidth: 50
                  })
			      .draggable({
		            cursor: 'move',	
		            containment: ".box-text-edit",
		            scroll: false
				  });
		    }
	    },500);
	}	
	if(obj.attr('data-value') == 'vasic'){
		$('#box_avance_edit').hide();
		$('#box_vasic_info').show();		
	}
}
var validate_fileimg = function($this){
    var file = $($this)[0].files[0];
    var fileName = file.name;
    fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
    var fileSize = file.size;
    var fileType = file.type;
	console.log(file.type)
	ext_permitidas = new Array("image/png", "image/jpeg", "image/jpg", "image/gif"); 
	permitida = false; 
      for (var i = 0; i < ext_permitidas.length; i++) { 
         if (ext_permitidas[i] == fileType) { 
         permitida = true; 
         break; 
         } 
      } 
	if(!permitida){
		swal({
            title: "Failure!",
            text: "The file extension is not allowed",
            type: "error"
        });
	}
}
var delete_test = function($this){
	var tid = $($this).attr('data-value');
	swal({
        title: "Deleted?",
        text: "Estas seguro de eliminar el resultado!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function(){
		$.ajax({
			url: './index.php?Act=DeleteTest&tid='+tid,
			type: 'POST'
		}).done(function(i){
			if(i == 'DELETE-TEST-SUCCESFULLY'){
				swal("Deleted!", "el test fue eliminado con exito.", "success");
				$("#test-"+tid).remove();
			}else{
		        swal({
                    title: "Failure!",
                    text: "No se pudo eliminar el Test",
                    type: "error"
                });
			}
		});
        
    });
}
var delete_res_test = function($this){
	var tid = $($this).attr('data-value');
	swal({
        title: "eliminar este resultado?",
        text: "eliminar resultado!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function(){
		$.ajax({
			url: './index.php?Act=DeleteRes&tid='+tid,
			type: 'POST'
		}).done(function(i){
			if(i == 'DELETE-TEST-RES-SUCCESFULLY'){
				swal("Deleted!", "el Resultado fue eliminado con exito.", "success");
				$("#test-"+tid).remove();
			}else{
		        swal({
                    title: "Failure!",
                    text: "No se pudo eliminar el resultado",
                    type: "error"
                });
			}
		});
        
    });
}
var save_config_site = function(){
	console.log("sabe data clickect");
	if(
	    $("#site-name").val() !='' &&
	    $("#site-description").val() !=''
	){
		$.ajax({
            type: "POST",
            url: './index.php',
            data: {
				'siteName': $("#siteName").val(),
				'siteDescription': $("#siteDescription").val(),
				'siteUri': $("#siteUri").val(),
				'FB_page': $("#FB_page").val(),
				'FB_ID': $("#FB_ID").val(),
				'analytics_ID': $("#analytics_ID").val(),
				'ads_300': $("#ads_300").val().replace(/</g, "[[=").replace(/>/g, "=]]"),
				'ads_720': $("#ads_720").val().replace(/</g, "[[=").replace(/>/g, "=]]")
			},
            cache: false
        }).done(function(i){
			console.log(i);
			if(i == 'SAVE-CONFIG-SUCCESFULLY'){
			    $.ajax({url: './index.php?Act=config',type: 'POST'}).done(function(i){$(".container-right").html(i)});
                swal({
                    title: "Successfully!",
                    text: "Click OK to continue!",
                    type: "success"
                });
			}
        });		
	}
}
var edit_test_res = function(tid){
	$.ajax({
		url: './index.php?Act=EditTestRes&tid='+tid,
		type: 'POST'
	}).done(function(i){
		$(".container-right").html(i);
	});
}
var edit_test = function(tid){
	$.ajax({
		url: './index.php?Act=EditTest&tid='+tid,
		type: 'POST'
	}).done(function(i){
		$(".container-right").html(i);
	});
}
var all_test_res = function(tid){
	$.ajax({
		url: './index.php?Act=AllTestRes&tid='+tid,
		type: 'POST'
	}).done(function(i){
		$(".container-right").html(i);
	});
}
var AddTestRes = function(tid){
	$.ajax({
		url: './index.php?Act=AddTestRes&tid='+tid,
		type: 'POST'
	}).done(function(i){
		$(".container-right").html(i);
	});
}
var udt_test = function(){
	if(
	    $("#site-name").val() !='' &&
	    $("#site-description").val() !=''
	){
		var formData = new FormData(document.getElementById("formaddtest"));
        formData.append("dato", "valor");
		console.log(formData);
		$.ajax({
			url: "./index.php?Act_udt_test",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
	        processData: false
        }).done(function(i){
			data = $.parseJSON(i);
			console.log(data);
			if(data.state){
			    $.ajax({url: './index.php?Act=AllTest',type: 'POST'}).done(function(i){$(".container-right").html(i)});
                swal({
                    title: "Successfully!",
                    text: "Update test successfully, click OK to continue!",
                    type: "success"
                });
			}else{
				swal({
                    title: "Failure!",
                    text: data.messaje,
                    type: "error"
                });
			}
        });		
	}
}
var udt_test_res = function(tid){
	if(
	    $("#title").val() !='' &&
	    $("#des").val() !=''
	){
		load_values();
		var formData = new FormData(document.getElementById("frm-data-res"));
        formData.append("dato", "valor");
		console.log(formData);
		$.ajax({
			url: "./index.php?Act_udt_test_res",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
	        processData: false
        }).done(function(i){
			data = $.parseJSON(i);
			console.log(data);
			if(data.state){
			    $.ajax({url: './index.php?Act=AllTestRes&tid='+tid,type: 'POST'}).done(function(i){$(".container-right").html(i)});
                swal({
                    title: "Successfully!",
                    text: "Aggregate result test successfully, click OK to continue!",
                    type: "success"
                });
			}else{
				swal({
                    title: "Failure!",
                    text: data.messaje,
                    type: "error"
                });
			}
        });		
	}
}
var Add_test_res = function(tid){
	if(
	    $("#title").val() !='' &&
	    $("#des").val() !=''
	){
		load_values();
		var formData = new FormData(document.getElementById("frm-data-res"));
        formData.append("dato", "valor");
		console.log(formData);
		$.ajax({
			url: "./index.php?Act_inc_test_res",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
	        processData: false
        }).done(function(i){
			data = $.parseJSON(i);
			console.log(data);
			if(data.state){
			    $.ajax({url: './index.php?Act=AllTestRes&tid='+tid,type: 'POST'}).done(function(i){$(".container-right").html(i)});
                swal({
                    title: "Successfully!",
                    text: "Aggregate result test successfully, click OK to continue!",
                    type: "success"
                });
			}else{
				swal({
                    title: "Failure!",
                    text: data.messaje,
                    type: "error"
                });
			}
        });		
	}
}
var add_test = function(){
	if(
	    $("#site-name").val() !='' &&
	    $("#site-description").val() !=''
	){
		var formData = new FormData(document.getElementById("formaddtest"));
        formData.append("dato", "valor");
		console.log(formData);
		$.ajax({
			url: "./index.php?Act_add_test",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
	        processData: false
        }).done(function(i){
			data = $.parseJSON(i);
			console.log(data);
			if(data.state){
			    $.ajax({url: './index.php?Act=NewTest',type: 'POST'}).done(function(i){$(".container-right").html(i)});
                swal({
                    title: "Successfully!",
                    text: "Aggregate test successfully, click OK to continue!",
                    type: "success"
                });
			}else{
				swal({
                    title: "Failure!",
                    text: data.messaje,
                    type: "error"
                });
			}
        });		
	}
}
var preview_img = function($this){			
    var img = $($this)[0].files, $this=$('#img-fond-prepare');
    Lector = new FileReader();
    Lector.onloadend = function(e) {
        var org = e.target; 
        $this.attr('src', org.result);
        img_select = org.result;				
    };
    Lector.onerror = function(e) {
        console.log(e)
    }
    Lector.readAsDataURL(img[0]);
}
var load_values = function(){	
    $("#pss-left").val(parseInt($('#'+box_select).css("left")));
    $("#pss-top").val(parseInt($('#'+box_select).css("top")));
	$("#size_selectd").val(parseInt($('#'+box_select).css("height")));
		
	if($('#mode_users').val() != 3){
	    var Duser = 'status:200'
	      +',s:'+parseInt($("#box_user").css("width"))
		  +',x:'+parseInt($("#box_user").css("left"))
		  +',y:'+parseInt($("#box_user").css("top"));
    }else{
	    var Duser = 'status:100';
	}
    $("#data_user").val(Duser);
		
	if($('#mode_users').val() != 1){
	    var Dfriend = 'status:200'
	      +',s:'+parseInt($("#box_userFriend").css("width"))
		  +',x:'+parseInt($("#box_userFriend").css("left"))
		  +',y:'+parseInt($("#box_userFriend").css("top"));
	}else{
	    var Dfriend = 'status:100';
	}
    $("#data_userFriend").val(Dfriend);
}
var next_prss = function(){
				
	if($("#title").val() == ''){
		swal({
			title: "Failure!",
            text: "Por favor escriba un titulo",
            type: "error"
		});
	}else if(img_select == ''){
		swal({
			title: "Failure!",
            text: "Por favor seleccione una imagen",
            type: "error"
		});
	}else if($("#des").val() == ''){
		swal({
			title: "Failure!",
            text: "Por favor escriba una descripcion",
            type: "error"
		});
	}else{
        $("#box_vasic_info").hide();
        $("#img_loading").show();
	    setTimeout(function(){
            $("#img_loading").hide();
	        $("#box_avance_edit").fadeIn("slow");
	    }, 1500);	
	}	
	
	var shear_box_select = setInterval(function(){
	    if($(".box_selects").length > 0){
		    clearInterval(shear_box_select); 
            $('.box_selects')
			  .resizable({
                aspectRatio: 16 / 16,
	            containment: ".box-text-edit",
                minHeight: 50,
                minWidth: 50
              })
			  .draggable({
		        cursor: 'move',	
		        containment: ".box-text-edit",
		        scroll: false,
				change: function(){
					load_values();
				}
	          });
		}
	},2500);
	
}