<?ob_start();?>
<?php
require_once('connect.php');
session_start();
$_SESSION['posted'] = false;
if(isset($_POST['submit']))
 {
      $time = date("g:i:s A"); 
      $date = date("n/j/Y");
      $msg = $_POST['message']; 
      $name = $_POST['fname'];
      $result = "";
       if(!empty($msg) && !empty($name)) 
        { 
            //name time date message 
         $query = "INSERT INTO comment (";
         $query .= " name, time, date, message"; 
         $query .= ") VALUES (";
         $query .= " '{$name}', '{$time}', '{$date}', '{$msg}' ";
         $query .= ")"; 
         $result = mysqli_query($connect, $query); 
    }
  }
?>

<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>MBOARD</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<style type="text/css">
     textarea
     {
        border-radius: 2%;
     }
     #thread
     {
         border: 1px #d3d3d3 solid;
         height: 350px;
         width: 880px;
         overflow: scroll;
     }
   </style>  

	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="#">Mboard</a></h1>
					<nav id="nav">
						
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container medium">
					<header>
						<h2>Chat Board</h2>
					</header>

					<div class="box">
						<form method="post" action="index.php">
							<div class="row gtr-50 gtr-uniform">
							
								<div id="thread">
                                  <?php
                                    $select = "SELECT * FROM comment";
                                    $q = mysqli_query($connect, $select);
                                    while($row = mysqli_fetch_assoc($q))
                                    {
                                       echo $row['name']. ": ". $row['message']."<br>";
                                    }
                                  ?>
                                </div>  
   
                                
                                <input type="text" name="fname" id="fname"><br>
                                <textarea name="message" id="message" rows="4" cols="35"> </textarea> <br>
								<div class="col-12">
									<ul class="actions special">
										<li><input type="submit" name="submit" value="Send Message" /></li>
									</ul>
								</div>
								<!-- <button type="submit" name="submit">Submit</button> -->
								

							</div>
						</form>
					</div>

				</section>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
