
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";
include 'function.php';
include 'connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = not_empty(test_input($_POST["email"]));
  $password = not_empty(test_input($_POST["password"]));
  if($email && $password)
  {
	//$new_password = password_hash($password,PASSWORD_DEFAULT);
	$result_query =add_user($email,$password,$conn);
	if(!$result_query)
	{
		echo "error in inserting the user to system";
	}else{
	$mail = new PHPMailer(true);
	$mail->From = "from@yourdomain.com";
	$mail->FromName = "Full Name";
	$mail->addAddress("nandini.software17@gmail.com");
	$mail->isHTML(true);
	$mail->Subject = "New Account Creation";
	$mail->Body = "<i>
	Congratulation new account have been created with below credentials. Please use the below credentials to login to the system</br>
	User Name : '".$email."' </br> Password : '".$password."'</i></br>
	Thank You,
	Company Name";
	$mail->AltBody = "This is the plain text version of the email content";
	try {
    $mail->send();
    echo "Message has been sent successfully";
	} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
	}
	
	header("Location:http://localhost/builder_proj/login.php");
	die(); 
	}	
  }
}
?>

<html>
<head>
<!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">-->
<link href="http://localhost/builder_proj/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->


 <script src="http://localhost/builder_proj/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 


	<style>
	body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #B0BEC5;
    background-repeat: no-repeat
}

.form-input-class {
	
	font-size: large;
    font-weight: 500;
}
.btn-purple
{
	background-color: #8c00ff;
	color: #f8f9fa;
}

.card0 {
    box-shadow: 0px 4px 8px 0px #757575;
    border-radius: 0px
}

.card2 {
    margin: 0px 40px
}

.logo {
    width: 200px;
    height: 100px;
    margin-top: 20px;
    margin-left: 35px
}

.image {
    width: 360px;
    height: 280px
}

.border-line {
    border-right: 1px solid #EEEEEE
}

.facebook {
    background-color: #3b5998;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.twitter {
    background-color: #1DA1F2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.linkedin {
    background-color: #2867B2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.line {
    height: 1px;
    width: 45%;
    background-color: #E0E0E0;
    margin-top: 10px
}

.or {
    width: 10%;
    font-weight: bold
}

.text-sm {
    font-size: 14px !important
}

::placeholder {
    color: #BDBDBD;
    opacity: 1;
    font-weight: 300
}

:-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

::-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

input,
textarea {
    padding: 10px 12px 10px 12px;
    border: 1px solid lightgrey;
    border-radius: 2px;
    margin-bottom: 5px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    font-size: 14px;
    letter-spacing: 1px
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #304FFE;
    outline-width: 0
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

a {
    color: inherit;
    cursor: pointer
}

.btn-blue {
    background-color: #1A237E;
    width: 150px;
    color: #fff;
    border-radius: 2px
}

.btn-blue:hover {
    background-color: #000;
    cursor: pointer
}

.bg-blue {
    color: #fff;
    background-color: #1A237E
}

@media screen and (max-width: 991px) {
    .logo {
        margin-left: 0px
    }

    .image {
        width: 300px;
        height: 220px
    }

    .border-line {
        border-right: none
    }

    .card2 {
        border-top: 1px solid #EEEEEE !important;
        margin: 0px 15px
    }
}
	</style>
	


<script>

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
	
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')
  

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
		  alert(forms);
  return false;
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
</head>
<body>

<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto" style="width:60%;">
<form name="builder_login" name="builder_login" method="post">

<h2 class="mb-5" style="text-align:center">Register </h2>
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
			
                <div class="card2 card border-0 px-4 py-5">
							
                   
                    <div class="mb-3">
					  <label for="exampleFormControlInput1" class="form-label form-input-class">Email address</label>
					  <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$" required>
					  <div class="invalid-feedback">
        Please choose a username.
      </div>
					<div class="mb-3">
					  <label for="exampleFormControlTextarea1" class="form-label form-input-class" >Password</label>
					  <input class="form-control" name="password" required>
					</div>
					
					<div class="mb-3 mt-4">
					  
					  <input type="submit" class="btn btn-purple mb-3">
					</div>
                </div>
            </div>
        </div>
<!--<div class="bg-blue py-4">
            <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2019. All rights reserved.</small>
                
            </div>
        </div>-->
    </div>
	</form>
</div>
</body>
</html>