<?php 
	include('functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link href="css/ionicons.min.css" rel="stylesheet">
	<link href="css/linear-icon.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.theme.css" rel="stylesheet">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/weblysleek-ui-fonts.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>


<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">
          <img src="images/utd.png" alt="">
          <span class="text--bold">Admin - Home Page</span>
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
	<div class="header">
	<h2>Admin - Home Page</h2>

	</div>
  <!-- HOME -->
  <section id="home" class="section jumbotron-section bg--position-center no-repeat bg-cover md-display-table" >
  
	<div class="container">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<br/>
		
		<img height="150" width="150" src="images/admin_profile.png"  >
		
			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<div>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
					</div>
						<br/>
					<div>
							<a href="home.php?logout='1'" style="color: red;">logout</a>
					
					&nbsp; <a href="create_user.php"> + add user</a>
					</div>	<br/>
					<div>
					<a href="enrollment.php">Enrollment Module</a>
          &nbsp; <a href="showHistory.php">Show Enrolled Courses</a>
					</div>
					<br/>
					<div>
					<a href="Course.php">Admin Module</a>
					</div>
          
					
				<?php endif ?>
			</div>
		</div>


</div>
</section>
<!-- FOOTER -->
<footer>
    <section class="footer-bottom">
      <div class="container">
        <hr class="footer-devider">
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