

$(document).ready(function(data){
    
	 //untuk login
	$('#btnLogin').click(function() {

		var status = "LoginSystem";
		var email = $("#val-email").val();
		var password = $("#val-password").val();

		if(email == "" || password == ""){
			$(".form-valide").valid();
		}
		if(email != "" && password != "" ){ 
			$.ajax({
			  url: "system/process.php",
			  method: "POST",
			  dataType: "json",
			  data: {
				status: status,
				email : email,
				password : password
			  },
			  success: function(data) {
				  if ($.trim(data) === "SuccessNew") {
					$('.form-valide')[0].reset();
					window.location.href='changePassword.php';
				  }
				  else if ($.trim(data) === "Success") {
					$('.form-valide')[0].reset();
					window.location.href='./dashboard.php';
				  }
				  else if ($.trim(data) === "Failed") {
					swal("Invalid!", "email or password is invalid!", "error");
					$("#val-password").val("");
				  }
					
			  },
				error: function() {
					swal("Error!", "Please check the internet connection!", "error");
				}
			});
		}
	});
    
    
	 //untuk set password baru jika still password default 'p@ssword1234'
	$('#btnConfirmPassword').click(function() {
		
		var status = "ConfirmPassword";
		var password = $("#val-password").val();
		var passwordConfirmed = $("#val-passwordConfirmed").val();
		
		if(password == "" || passwordConfirmed == ""){
			$(".form-valide").valid();
		}
		
		if(password == passwordConfirmed && password != "" ){ 
			$.ajax({
			  url: "system/process.php",
			  method: "POST",
			  dataType: "json",
			  data: {
				status: status,
				password : password
			  },
			  success: function(data) {
				  if ($.trim(data) === "Success") {
					$('.form-valide')[0].reset();
						swal({
						   title: "Successfully!",
						   text: "Password is successfully changed!",
						   type: "success",
						   showCancelButton: false,
						   confirmButtonColor: "#3085d6",
						   confirmButtonText: "Done",
						   closeOnConfirm: false
						}, function () {
							  window.location.href='./iPadManagementSystem/'; 
						});
				  }
				  else if ($.trim(data) === "Failed") {
					swal("Invalid!", "email or password is invalid!", "error");
					$("#val-password").val("");
				  }
					
			  },
				error: function() {
					swal("Error!", "Please check the internet connection!", "error");
				}
			});
		}
	});
    
    
});

