<script type="text/javascript">
$(function(){
    search_account();
});

const check_user_type =()=>{
	var user_type = document.getElementById('user_type').value;
	if (user_type == 'employee') {
		document.getElementById('emp_col').style.display = "block";
	}else{
		document.getElementById('emp_col').style.display = "none";
	}
}

const check_user_type_update =()=>{
	var user_type = document.getElementById('user_type_update').value;
	if (user_type == 'employee') {
		document.getElementById('emp_col_update').style.display = "block";
	}else{
		document.getElementById('emp_col_update').style.display = "none";
	}
}


const search_account =()=>{
	$('#spinner').css('display','block');
	var username = document.getElementById('account_username_search').value;
	$.ajax({
        url:'../../process/admin/processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_account',
                    username:username
                },success:function(response){
                  document.getElementById('list_of_accounts').innerHTML = response;
                   $('#spinner').fadeOut();
                }
    });
}

const save_account =()=>{
	var user_type = document.getElementById('user_type').value;
	var employee_id = document.getElementById('employee_id').value;
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;


	if (user_type == '') {
			Swal.fire({
	            icon: 'info',
	            title: 'Please Select User Type !!!',
	            text: 'Information',
	            showConfirmButton: false,
	            timer : 1000
	        });
	}else if(user_type == 'employee' && employee_id == ''){
			Swal.fire({
	            icon: 'info',
	            title: 'Please Input Employee ID !!!',
	            text: 'Information',
	            showConfirmButton: false,
	            timer : 1000
	        });
	}else if(username == ''){
			Swal.fire({
	            icon: 'info',
	            title: 'Please Input Username !!!',
	            text: 'Information',
	            showConfirmButton: false,
	            timer : 1000
	        });
	}else if(password == ''){
			Swal.fire({
	            icon: 'info',
	            title: 'Please Input Password !!!',
	            text: 'Information',
	            showConfirmButton: false,
	            timer : 1000
	        });
	}else{
		$.ajax({
	        url:'../../process/admin/processor.php',
	        type:'POST',
	        cache:false,
	        data:{
	            method:'add_account',
	            user_type:user_type,
				employee_id:employee_id,
				username:username,
				password:password
	        },success:function(response){    
	            
	            if (response == 'success') {
	                    Swal.fire({
	                      icon: 'success',
	                      title: 'Succesfully Recorded!!!',
	                      text: 'Success',
	                      showConfirmButton: false,
	                      timer : 1000
	                    });
	                    $("#user_type").val('');
	          			$("#employee_id").val('');
	          			$("#username").val('');
	          			$("#password").val('');
	          			$('#add_account').modal('hide');
	          			search_account();
	            }else if(response == 'duplicate'){
	                     Swal.fire({
	                      icon: 'info',
	                      title: 'Duplicate Data !!!',
	                      text: 'Information',
	                      showConfirmButton: false,
	                      timer : 1000
	                    });
	                    $("#user_type").val('');
	          			$("#employee_id").val('');
	          			$("#username").val('');
	          			$("#password").val('');
	          			$('#add_account').modal('hide');
	          			search_account();
	            }else if(response == 'not existing'){
	                     Swal.fire({
	                      icon: 'info',
	                      title: 'Employee ID Not Existing !!!',
	                      text: 'Information',
	                      showConfirmButton: false,
	                      timer : 1000
	                    });
	                    $("#user_type").val('');
	          			$("#employee_id").val('');
	          			$("#username").val('');
	          			$("#password").val('');
	          			$('#add_account').modal('hide');
	          			search_account();
	            }else{
	                    Swal.fire({
	                      icon: 'error',
	                      title: 'Error !!!',
	                      text: 'Error',
	                      showConfirmButton: false,
	                      timer : 1000
	                    });
	                    $("#user_type").val('');
	          			$("#employee_id").val('');
	          			$("#username").val('');
	          			$("#password").val('');
	          			$('#add_account').modal('hide');
	          			search_account();       
	                }
	        }
	    });
	}
}

const get_account_details =(param)=>{
	var data = param.split('~!~');
    var id = data[0];
    var employee_id = data[1];
    var username = data[2];
    var password = data[3];
    var role = data[4];

    document.getElementById('id_account').value = id;
    document.getElementById('user_type_update').value = role;
    document.getElementById('employee_id_update').value = employee_id;
	document.getElementById('username_update').value = username;
	document.getElementById('password_update').value = password;
	check_user_type_update();
}

const update_account =()=>{
	var id = document.getElementById('id_account').value;
	var fullname = document.getElementById('fullname_update_account').value;
	var username = document.getElementById('username_update_account').value;
	var password = document.getElementById('password_update_account').value;
	
	if (fullname == '') {
			Swal.fire({
	            icon: 'info',
	            title: 'Please Input Fullname !!!',
	            text: 'Information',
	            showConfirmButton: false,
	            timer : 1000
	        });
	}else if(username == ''){
			Swal.fire({
	            icon: 'info',
	            title: 'Please Input Username !!!',
	            text: 'Information',
	            showConfirmButton: false,
	            timer : 1000
	        });
	}else if(password == ''){
			Swal.fire({
	            icon: 'info',
	            title: 'Please Password !!!',
	            text: 'Information',
	            showConfirmButton: false,
	            timer : 1000
	        });
	}else{
		$.ajax({
	        url:'../../process/admin/processor.php',
	        type:'POST',
	        cache:false,
	        data:{
	            method:'update_account',
	            	id:id,
					fullname:fullname,
					username:username,
					password:password
	        },success:function(response){    
	            
	            if (response == 'success') {
	                    Swal.fire({
	                      icon: 'success',
	                      title: 'Succesfully Updated !!!',
	                      text: 'Success',
	                      showConfirmButton: false,
	                      timer : 1000
	                    });
	          			$('#edit_account').modal('hide');
	          			search_account();
	            }else if(response == 'duplicate'){
	                     Swal.fire({
	                      icon: 'info',
	                      title: 'Duplicate Data !!!',
	                      text: 'Information',
	                      showConfirmButton: false,
	                      timer : 1000
	                    });
	                   $('#edit_account').modal('hide');
	          		   search_account();
	            }else{
	                    Swal.fire({
	                      icon: 'error',
	                      title: 'Error !!!',
	                      text: 'Error',
	                      showConfirmButton: false,
	                      timer : 1000
	                    });
	                    $('#edit_account').modal('hide');
	          			search_account();        
	                }
	        }
	    });
	}
}

const delete_account =()=>{
	var id = document.getElementById('id_account').value;
	$.ajax({
	        url:'../../process/admin/processor.php',
	        type:'POST',
	        cache:false,
	        data:{
	            method:'delete_account',
	            	id:id
	        },success:function(response){    
	            
	            if (response == 'success') {
	                    Swal.fire({
	                      icon: 'info',
	                      title: 'Succesfully Deleted !!!',
	                      text: 'Information',
	                      showConfirmButton: false,
	                      timer : 1000
	                    });
	          			$('#edit_account').modal('hide');
	          			search_account(); 
	            }else{
	                    Swal.fire({
	                      icon: 'error',
	                      title: 'Error !!!',
	                      text: 'Error',
	                      showConfirmButton: false,
	                      timer : 1000
	                    });
	          			$('#edit_account').modal('hide');
	          			search_account();           
	                }
	        }
	    });
}
</script>