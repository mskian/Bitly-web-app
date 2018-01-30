<?php 

session_start(); /* Starts the session */
	
	/* Check Login form submitted */	
	if(isset($_POST['Submit'])){
		/* Define username and associated password array */
		$logins = array('admin' => '123456');
		
		/* Check and assign submitted Username and Password to new variable */
		$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
		
		/* Check Username and Password existence in defined array */		
		if (isset($logins[$Username]) && $logins[$Username] == $Password){
			/* Success: Set session variables and redirect to Protected page  */
			$_SESSION['UserData']['Username']=$logins[$Username];
			header("location:index.php");
			exit;
		} else {
			/*Unsuccessful attempt: Set error message */
			$msg="<div class='text-center'><span style='color:red'>Invalid Login Details</span></div><br/>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<!-- meta character set -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Mskian Bitly URL Shortener</title>
<meta name="Description" content="Mskian Online Bitly URL Shortener  - Short Your Long Url.">
<?php $current_page = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 echo '<link rel="canonical" href="'.$current_page.'"/>'; ?>

<!-- CSS and Fonts -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Exo+2:400,700" rel="stylesheet">
<link href="form.css" rel="stylesheet">
<link href="login.css" rel="stylesheet">

 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

</head>
<body>
<br />
<br />

<!-- Top content -->   	
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-6 col-lg-offset-3 text">
<h1>Admin Login</h1>
</div>
</div>
</div>
<br />
<br />

<div class="container">
<div class="row justify-content-center">
<div class="col-lg-6 col-lg-offset-3 centered">

<div class="form-bottom">
<form action="" method="post" class="login-form">
<?php if(isset($msg)){?>
<?php echo $msg;?>
<?php } ?>
<div class="form-group">
<input name="Username" id="username" type="text" class="form-username form-control"  placeholder="Enter the user name">
</div>
<div class="form-group">
<input name="Password" id="password" type="password" class="form-username form-control" placeholder="Enter your password">
</div>
<button name="Submit" type="submit" class="btn">Log in</button>
</form>
</div>

</div>
</div>
</div>

<!-- JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>