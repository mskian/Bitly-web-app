<?php 

session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}

include('class.php');

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
<div class="col-sm-8 col-sm-offset-2 text">

<h1>Welcome</h1>

</div>
</div>
</div>
<br />

<div class="container">
<div class="row justify-content-center">
<div class="col-lg-6 col-lg-offset-3 centered">

<div class="form-bottom">
<form action="" method="post" class="login-form">
<div class="form-group">
<input type="text" required id="url" name="url" class="form-username form-control" placeholder="Enter your Url" />
</div>
<div class="form-group">
<span class="help-block has-error" id="url_error"></span>
<button type="submit" value="Get Short URL" id="short_url_btn" data-loading-text="Getting Short URL..." class="btn">Create Now</button>
</div>
</form>
</div>

</div>
</div>
</div>
<br />

<div class="container">		
<div class="row justify-content-center">
<div class="col-lg-6 col-lg-offset-3">

<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{

$lgurl = $_POST['url'];
 
// Shorten a URL
$shortURL = $api->shorten($lgurl);
echo "<div class='text-center card card-body bg-light'><code>Your Short URL : $shortURL</code></div>";

}

?>

</div>
</div>
</div>
<br />

<div class="container">		
<div class="row justify-content-center">
<div class="col-lg-6 col-lg-offset-3 centered">
<a href="logout.php" class="btn btn-info"><i class="fa fa-paper-plane"></i> Logout</a>
</div>
</div>
</div>
<br />  			
		
<!-- JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
			$(document).ready(function(){
				$('#short_url_btn').on('click', function(){
					//
					
					if(!do_validation()){
						console.log(do_validation());
						return false;
					}else{
						$('#short_url_btn').button('loading');
					}
					
					
					
				});
				
			});
	
			var do_validation = function(){
				var error = 0;
				url = $.trim( $('#url').val() );
				if(url == '' ){
					$msg = '<p class="text-center">Please enter URL</p>';
					error++;
				}else if( ! isUrlValid(url) ){
					$msg = '<p class="text-center">Please enter valid URL</p>';
					error++;
				}
				
				console.log(error);
				
				if(error > 0){
					$('#url_error').html($msg);
					return false;
				}else{
					$('#url_error').html('');
					return true;
				} 
			}

			function isUrlValid(url) {
			    return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
			}
						
</script>

</body>
</html>