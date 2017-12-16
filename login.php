<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/validate.js"></script>
	<link href="css/ionicons.min.css" rel="stylesheet">
	<link href="css/linear-icon.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.theme.css" rel="stylesheet">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/weblysleek-ui-fonts.css">
	<link rel="stylesheet" href="css/main.css">
	<script>
	$(document).ready(function(){

		$("#username").val('');
		$("#password").val('');
		
		$("#username").after('<span id="id_username"></span>');
		$("#password").after('<span id="id_password"></span>');

		$("#id_username").hide();
		$("#id_password").hide();

		

		
	$("#username").blur(function () {
			
			var uname = $("#username").val();
			if (uname == '') {
			$("#id_username").show();	
			$("#id_username").addClass("error");
			$("#id_username").html("Cannot be empty");
			}
			else{
				$("#id_username").hide();
			}
			
			
		});


		$("#password").blur(function () {
		var pwd = $("#password").val();
		if (pwd == '') {
			$("#id_password").show();
			$("#id_password").addClass("error");
			$("#id_password").html("Cannot be empty");
		}
		else{
			$("#id_password").hide();
		}
		
	});


	});
	</script>
	<style>
	 .error {
	padding: 0px 2px;
	background: #fcc;
	border: 2px solid #c99;
	}



	</style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
          aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">
          <img src="images/utd.png" alt="">
          <span class="text--bold">Login Page</span>
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="index.html">home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li>
            <a href="about.html">about</a>
          </li>
          <li>
            <a href="login.php">login</a>
          </li>
          <li>
            <a href="register.php">register</a>
          </li>
          
          <li>
            <a href="contact.html">contact us</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>



<!-- HOME -->
<section id="home" class="section jumbotron-fluid bg--position-center no-repeat bg-cover md-display-table" >
<div class="container">
	<form class="form-group" method="post" action="login.php">

		<?php echo display_error(); ?>

		<div>
			<label>Username</label>
			<input class="form-control" type="text" id="username" name="username" >
		</div>
		<div>
			<label>Password</label>
			<input class="form-control" type="password" id="password" name="password">
		</div>
		<br/>
		<div>
			<button class="btn btn-success" type="submit" id="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
</div>
</section>
 <!-- FOOTER -->
<footer class="navbar navbar-fixed-bottom">
    <section class="footer footer-bottom">
      <div class="container">
        <hr/>
        <div class="row">
          <div class="col-md-5">
            <p class="copyright">Copyright © 2017 UTD COURSE REGISTRATION</p>
          </div>
          <div class="col-md-2">
            <a id="scroll-top-div" href="" class="pull-right back-top-btn">back to top
              <span class="btn-icon">
                <i class="ion-ios-arrow-thin-up"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
    </section>
</footer>


	<script src="js/jquery-3.1.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>