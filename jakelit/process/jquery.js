$(document).ready(function(data){
    
     //untuk login
    $('#val-email, #val-password').on('input', function() {
        var email = $("#val-email").val();
        var password = $("#val-password").val();
        if(email !== "" && password !== ""){
            $(".alert-danger").hide();
        }
    });
    
    $('#btnLogin').click(function() {
        var status = "Login";
        var emailPattern = /^[^\s@]+@jakel\.my$/;
        var email = $("#val-email").val();
        var password = $("#val-password").val();
        
        // Hide previous alerts
        $(".alert-danger").hide();
        $(".alert-message").text("");
        
        $('#val-email').on('input', function() {
           $(".alert-email").hide();
        });
        
        $('#val-password').on('input', function() {
           $(".alert-password").hide();
        });
        
        // Check if email and password fields are empty
        if(email === ""){
            $(".alert-email").text("Please enter your email.");
            $(".alert-danger").show();
            $(".alert-email").show();
            
            setTimeout(function() {
                $(".alert-danger").hide();
                $(".alert-email").hide();
            }, 5000);
        } 
        if(password === ""){
            $(".alert-password").text("Please enter your password.");
            $(".alert-danger").show();
            $(".alert-password").show();
            
            setTimeout(function() {
                $(".alert-danger").hide();
                $(".alert-password").hide();
            }, 5000);
        }
        if (email !== "" && !emailPattern.test(email)) {
            $(".alert-email").text("Please enter a valid email address.");
            $(".alert-danger").show();
            $(".alert-email").show();
            
            setTimeout(function() {
                $(".alert-danger").hide();
                $(".alert-email").hide();
            }, 5000);  
        }
        
        if(email != "" && password != "" && emailPattern.test(email) ){ 
            $.ajax({
              url: "process/process.php",
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
                    $(".alert-email").text("Email or Password Wrong.");
                    $(".alert-danger").show();
                    $(".alert-email").show();
                    $("#val-password").val("");
                  }

              },
                error: function() {
                    swal("Error!", "Please check the internet connection!", "error");
                }
            });
        }
    });
    
    
    
     //untuk forget password
    $('#btnForget').click(function() {
        var status = "ForgetPassword";
        var emailPattern = /^[^\s@]+@jakel\.my$/;
        var email = $("#val-email").val();
        
        // Hide previous alerts
        $(".alert-danger").hide();
        $(".alert-message").text("");
        
        $('#val-email').on('input', function() {
           $(".alert-email").hide();
        });
        
        // Check if email and password fields are empty
        if(email === ""){
            $(".alert-email").text("Please enter your email.");
            $(".alert-danger").show();
            $(".alert-email").show();
            
            setTimeout(function() {
                $(".alert-danger").hide();
                $(".alert-email").hide();
            }, 3000);
        } 
        if (email !== "" && !emailPattern.test(email)) {
            $(".alert-email").text("Please enter a valid email address.");
            $(".alert-danger").show();
            $(".alert-email").show();
            
            setTimeout(function() {
                $(".alert-danger").hide();
                $(".alert-email").hide();
            }, 3000);
        }
        
        if(email != "" && emailPattern.test(email) ){ 
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

});