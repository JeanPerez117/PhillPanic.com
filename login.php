<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>

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
		<?php include 'connection.php';?>
	</head>

	<body>

		
		<form  method="post">

			<input type="hidden" name="frmLogin">

			<div class="form-group">
			    <label for="InputEmail">Email address</label>
			    <input type="email" class="form-control" name="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>

		  <div class="form-group">
		    <label for="InputPassword">Password</label>
		    <input type="password" class="form-control" name="InputPassword" placeholder="Password">
		  </div>

		  <button type="submit" class="btn btn-primary">Submit</button>

		</form>
		

	</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="main.css">
</html>