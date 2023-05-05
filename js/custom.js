function send_message(){
	var name=jQuery("#name").val();
	var email=jQuery("#email").val();
	var mobile=jQuery("#mobile").val();
	var message=jQuery("#message").val();
	
	if(name==""){
		alert('Vui lòng nhập tên');
	}else if(email==""){
		alert('Vui lòng nhập email');
	}else if(mobile==""){
		alert('Vui lòng nhập số điện thoại');
	}else if(message==""){
		alert('Vui lòng nhập nội dung');
	}else{
		jQuery.ajax({
			url:'send_message.php',
			type:'post',
			data:'name='+name+'&email='+email+'&mobile='+mobile+'&message='+message,
			success:function(result){
				alert(result);
			}	
		});
	}
}

function user_register(){
    jQuery('.field_error').html('');
    var name=jQuery("#name").val();
    var email=jQuery("#email").val();
    var mobile=jQuery("#mobile").val();
    var password=jQuery("#password").val();
    var is_error='';
    if(name==""){
        jQuery('#name_error').html('Vui lòng nhập tên');
        is_error='yes';
    }
    else{
        if (!name.match(/^[a-zA-Z]$/)) {
            jQuery('#name_error').html('Tên chỉ được chứa ký tự A-z');
            is_error='yes';
        }
    }
    if(email==""){
        jQuery('#email_error').html('Vui lòng nhập email');
        is_error='yes';
    }
    else{
        if (!email.match(/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/)) {
            jQuery('#email_error').html('Vui lòng nhập đúng email');
            is_error='yes';
        }
    }
    if(mobile==""){
        jQuery('#mobile_error').html('Vui lòng nhập số điện thoại');
        is_error='yes';
    }
    else{
        if (!mobile.match(/^[0]{1}[\d]{9}$/)) {
            jQuery('#mobile_error').html('Vui lòng nhập đúng số điện thoại');
            is_error='yes';
        }
    }
    if(password==""){
        jQuery('#password_error').html('Vui lòng nhập mật khẩu');
        is_error='yes';
    }
    else{
        if (!password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/)) {
            jQuery('#password_error').html('Mật khẩu phải trên 8 ký tự,chứa chữ hoa chữ thường và số');
            is_error='yes';
        }
    }
    if(is_error==''){
        jQuery.ajax({
            url:'register_submit.php',
            type:'post',
            data:'name='+name+'&email='+email+'&mobile='+mobile+'&password='+password,
            success:function(result){
                if(result=='email_present'){
                    jQuery('#email_error').html('Email này đã tồn tại');
                }
                if(result=='insert'){
                    jQuery('.register_msg p').html('Đăng ký thành công');
                }
            }   
        });
    }
    
}

function user_login(){
    jQuery('.field_error').html('');
    var email=jQuery("#login_email").val();
    var password=jQuery("#login_password").val();
    var is_error='';
    if(email==""){
        jQuery('#login_email_error').html('Vui lòng nhập email');
        is_error='yes';
    }if(password==""){
        jQuery('#login_password_error').html('Vui lòng nhập mật khẩu');
        is_error='yes';
    }
    if(is_error==''){
        jQuery.ajax({
            url:'login_submit.php',
            type:'post',
            data:'email='+email+'&password='+password,
            success:function(result){
                if(result=='wrong'){
                    jQuery('.login_msg p').html('Sai tài khoản hoặc mật khẩu');
                }
                if(result=='valid'){
                    window.location.href=window.location.href;
                }
            }   
        });
    }   
}

function manage_cart(pid,type){
    if(type=='update'){
        var qty=jQuery("#"+pid+"qty").val();
    }else{
        var qty=jQuery("#qty").val();
    }
    jQuery.ajax({
        url:'manage_cart.php',
        type:'post',
        data:'pid='+pid+'&qty='+qty+'&type='+type,
        success:function(result){
            if(type=='update' || type=='remove'){
                window.location.href=window.location.href;
            }
            jQuery('.htc__qua').html(result);
        }   
    }); 
}

function sort_product_drop(cat_id,site_path){
    var sort_product_id=jQuery('#sort_product_id').val();
    window.location.href=site_path+"danhmuc.php?id="+cat_id+"&sort="+sort_product_id;
}

