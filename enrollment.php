<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
   
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
            $('#results').hide();

            $(document).on("keyup", '#txtsearch', function(e){
                $('#college').val('');
                $('#department').val('');
                $('#course').val('');
                $('#section').val('');
                var txtsearch = $('#txtsearch').val();
                if(txtsearch == '')
                {
                    $('#nav').remove();
                    $('#results').hide();
                }
                else{
                    $.ajax({
                    async:false,
                    url: 'getCourseTableEntries.php',
                    type: 'POST',
                    data: {txtsearch: txtsearch}, 
                    dataType : "json",
                    success: function (result) {
                        $('#results').empty();
                        // $('#department').empty();
                        // $('#course').empty();
                        // $('#section').empty();
                        for (var key in result){
                            $('#results').append(result[key]);
                        }
                        paginate();
                        $('#results').show();
                    }
                });
                }
                
                
            });
            $(document).on("change", '#college', function(e){
                var college = $('#college').val();
                
                $.ajax({
                    async:false,
                    url: 'getCourseTableEntries.php',
                    type: 'POST',
                    data: {college: college}, 
                    dataType : "json",
                    success: function (result) {
                        $('#results').empty();
                        // $('#department').empty();
                        // $('#course').empty();
                        // $('#section').empty();
                        for (var key in result){
                            $('#results').append(result[key]);
                        }
                        paginate();
                        $('#results').show();
                    }
                });
            });
            $(document).on("change", '#college', function(e){
                var college = $('#college').val();
                $.ajax({
                    async:false,
                    url: 'getDepartments.php',
                    type: 'POST',
                    data: {college: college}, 
                    dataType : "json",
                    success: function (result) {
                        $('#department').empty();
                        $('#course').empty();
                        $('#section').empty();
                        for (var key in result){
                            $('#department').append(result[key]);
                        }
                        }
                });
            });
            $(document).on("change", '#department', function(e){
                var department = $('#department').val();
                $.ajax({
                    async:false,
                    url: 'getCourses.php',
                    type: 'POST',
                    data: {department: department}, 
                    dataType : "json",
                    success: function (result) {
                        $('#course').empty();
                        $('#section').empty();
                        for (var key in result){
                            $('#course').append(result[key]);
                        }
                    }
                });
            });
            $(document).on("change", '#department', function(e){
                var college = $('#college').val();
                var department = $('#department').val();
                $.ajax({
                    async:false,
                    url: 'getCourseTableEntries.php',
                    type: 'POST',
                    data: {college: college, department: department}, 
                    dataType : "json",
                    success: function (result) {
                        $('#results').empty();
                        // $('#department').empty();
                        // $('#course').empty();
                        // $('#section').empty();
                        for (var key in result){
                            $('#results').append(result[key]);
                        }
                        paginate();
                        $('#results').show();
                    }
                });
            });
            $(document).on("change", '#course', function(e){
                var course = $('#course').val();
                $.ajax({
                    async:false,
                    url: 'getSections.php',
                    type: 'POST',
                    data: {course: course}, 
                    dataType : "json",
                    success: function (result) {
                        $('#section').empty();
                        for (var key in result){
                            $('#section').append(result[key]);

                        }
                    }
                });
            });
            $(document).on("change", '#course', function(e){
                var college = $('#college').val();
                var department = $('#department').val();
                var course = $('#course').val();
                $.ajax({
                    async:false,
                    url: 'getCourseTableEntries.php',
                    type: 'POST',
                    data: {college: college, department: department, course:course}, 
                    dataType : "json",
                    success: function (result) {
                        $('#results').empty();
                        // $('#department').empty();
                        // $('#course').empty();
                        // $('#section').empty();
                        for (var key in result){
                            $('#results').append(result[key]);
                        }
                        paginate();
                        $('#results').show();
                    }
                });
            });

            $(document).on("change", '#section', function(e){
                var college = $('#college').val();
                var department = $('#department').val();
                var course = $('#course').val();
                var section = $('#section').val();
                $.ajax({
                    async:false,
                    url: 'getCourseTableEntries.php',
                    type: 'POST',
                    data: {college: college, department: department, course:course, section:section}, 
                    dataType : "json",
                    success: function (result) {
                        $('#results').empty();
                        // $('#department').empty();
                        // $('#course').empty();
                        // $('#section').empty();
                        for (var key in result){
                            $('#results').append(result[key]);
                        }
                        paginate();
                        $('#results').show();
                    }
                });
            });
            $(document).on("click", '.add', function(e){
                var sectionID = $(this).attr('id');
                var userID = <?php echo $_SESSION['user']['SID']; ?>; 
                $.ajax({
                    async: false,
                    url: 'addToCart.php',
                    type: 'POST',
                    data: {sectionID: sectionID, userID: userID},
                    success: function (result){
                        if (result == "Added" || result== "Added again" ){
                            alert(result);
                        } else {
                            alert("This course is already in your cart");
                        }
                    },
                    error: function(e){
                        alert(e.responseText);
                    }
                });
            });


            function paginate(){
                $('#nav').remove();
	                $("#results").after('<div id="nav"></div>');
                    var table = document.getElementById("results");
					var numrows = table.getElementsByTagName("tr").length;

                    var rowsShown = 6;
                    var rowsTotal = numrows;

                   
                    var classrows = table.getElementsByTagName("tr");
                    
                    var numPages = rowsTotal/rowsShown;
                    for(i = 0;i < numPages;i++) {
                        var pageNum = i + 1;
                        $('#nav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
                    }
                    $(classrows).hide();
                    $(classrows).slice(0, rowsShown).show();
                    $('#nav a:first').addClass('active');
                    $('#nav a').bind('click', function(){

                        $('#nav a').removeClass('active');
                        $(this).addClass('active');
                        var currPage = $(this).attr('rel');
                        var startItem = currPage * rowsShown;
                        var endItem = startItem + rowsShown;
                        $(classrows).css('opacity','0.0').hide().slice(startItem, endItem).css('display','table-row').animate({opacity:1}, 300);
                    });

                }
        });
    </script>
    	<style>
		table,
		td,
		th {
			border: 1px solid #ddd;
			text-align: left;
		}
		table {
			border-collapse: collapse;
			width: 100%;
		}
		.pageheader {
			text-align: center;
            
		}
        .pageheader a{
			text-decoration: none;
            color: white;
		}
		th,
		td {
			padding: 15px;
		}
		tr:hover {
			background-color: #f5f5f580;
			color: black;
		}
		td:hover {
			background-color: #ddda2393;
			color: black;
		}
        .form-inline .form-group {
  margin-right:8px;
}

.btncancel {
  font: 20px Arial;
  text-decoration: none;
  background-color:blue;
  color: white;
  padding: 2px 12px 2px 12px;
  border-top: 1px solid #CCCCCC;
  border-right: 1px solid #333333;
  border-bottom: 1px solid #333333;
  border-left: 1px solid #CCCCCC;
}
.btncancel:hover {
  font: 20px Arial;
  text-decoration: none;
  background-color:#ADD8E6;
  color: white;
  padding: 2px 12px 2px 12px;
  border-top: 1px solid #CCCCCC;
  border-right: 1px solid #333333;
  border-bottom: 1px solid #333333;
  border-left: 1px solid #CCCCCC;
}


</style>
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
          <span class="text--bold">Search for Classes</span>
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
  
  
    <form method='post' id='form' action="addToCart.php">
        
            
            <div class="jumbotron-fluid" >
                Search for Course: <input class="form-control" type="text" id="txtsearch"/>
            </div>
        <br/>
 
<div class="form-inline">
    <div class="form-group">
        <label for="college"> College:</label>
        <select name="college" class="form-control" id="college">
            <option value = ""></option>
            <?php
                $con = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
                $query = "SELECT DISTINCT CName FROM college";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_assoc($result)){
                    echo "<option value ='" . $row['CName'] . "'>" . $row['CName'] . "</option>";
                }
                mysqli_close($con);
            ?>
        </select>
    </div>
       
    <div class="form-group">
        <label for="department">Department:</label>
        
        <select name="department" class="form-control" id="department">
            <option value = ""></option>
        </select>
    </div>
    <div class="form-group">
        <label for="course">Course:</label> 
        <select name="course" class="form-control" id="course">
            <option value = ""></option>
        </select>
    
    </div>
        <div class="form-group">
        <label for="section">Section:</label> 
        <select name="section" class="form-control" id="section">
            <option value = ""></option>
        </select>
        </div>
    
        
       
        
    </form>
            </div>  
   <br/>
    <div>
    <a class="btn btn-primary" href='cart.php'>Go to Cart</a>
    </div>
    
    </section>

    <section>
    <div class="jumbotron-fluid">
    <table id='results'>
    </table>
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
      <script src="js/main.js"></script></body>

</html>