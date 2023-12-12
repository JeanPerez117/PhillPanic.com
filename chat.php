<?php 
session_start();

	if ($_SESSION['loggedIn'] != True) 
	{
		echo '<script type="text/JavaScript"> 
		alert("You are not logged in!");

		let url = "https://phillpanic.com";
      	window.location.href = url;


		 </script>';

		
	}
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chat</title>

	<?php include 'conn.php';?>

	</head>

	<body>


		<div class="Chat">
			<div class="Incomingmsg">
			<?php  
			

			include 'incomingmsg.php';

				 
			?>
			</div>




			<div class="Outgoingmsg">

			<form method="post">

				<label for="outgoingText">Message:</label><textarea id="outgoingText" name="outgoingText"></textarea><input type="submit" name="Send" value="Send">

			</form>
			<?php

			if (isset($_POST['Send']))
			{
				$outgoingtxt = $_POST['outgoingText'];
				$from = $_SESSION['user'];
				$to = "Global";

				$stmt = $conn->prepare("INSERT INTO Messages (FromUser, Message, ToUser) VALUES (?, ?, ?)");

				$stmt->bind_param("sss", $from, $outgoingtxt, $to );
				$stmt->execute();
				$stmt->close();
			}

			?>
				
			
			</div>

		</div>





	</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="main.css">
</html>







