
<html>
<?php session_start();?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="title" content="PhillPanic.com">
		<meta name="description" content="PhillPanic's portfolio site. Created by PhillPanic using Amazon Lightsail.">
		<title>PhillPanic.com</title>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z20GP6H3TD"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'G-Z20GP6H3TD');
		</script>


		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		
			<?php include 'navbar.php';?>
		
	</head>





<body>

	<div class="Welcome">
		<h1>Welcome!</h1>
		<p>I created this site to be a portfolio of sorts and to show my capabilities as a developer. Please do not use/enter any sensitive or self identifying information on this site. Thank you, PhillPanic</p>
		<p><a href="login.php">Sign in</a>  or  <a href="register.php">Register</a></p>
	</div>





	<?php include 'footer.php';?>

</body>














<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="main.css">
</html>