<html>

<body>


	
<?php


	$servername = "localhost";
	$serverusername = "root";
	$serverpassword = "Kalel117!";
	$dbname = "phillpanic";

	// Create connection
	$conn = mysqli_connect($servername, $serverusername, $serverpassword, $dbname);






	//Checking if login for POST
	if (isset($_POST['frmLogin']))
	{
		//save user input in variables
		$username = $_POST['InputEmail'];
		$password = $_POST['InputPassword'];
		
		//query to see if user exists
		$stmt = $conn->prepare("SELECT UserName, UserMail, UserPass FROM users WHERE UserMail =? OR UserName =? "); 
		$stmt->bind_param("ss", $username, $username);
		$stmt->execute();
		//saving results to variable
		$result = $stmt->get_result();
		$user = $result->fetch_assoc();
		//saving hashed pass to a variable
		$hashed = $user['UserPass'];
		$verified = password_verify($password, $hashed);

		//checking if password matches.
		if ($verified)
		{
			//Log you in.
			$_SESSION['loggedIn'] = true;
			$_SESSION['user'] = $username;
			echo '<script type="text/JavaScript"> alert("you are logged in!"); </script>';
			

		}
		else
		{
			echo '<script type="text/JavaScript"> alert("Incorrect username/password combination. Please try again."); </script>';

		}
		mysqli_free_result($result);
		


	}



	if (isset($_POST['frmSignup']))
	{
		$usermail = $_POST['InputEmail'];
		$usermail = filter_var($usermail, FILTER_SANITIZE_EMAIL);

		if(!filter_var($usermail, FILTER_VALIDATE_EMAIL))
		{
			echo '<script type="text/JavaScript"> alert("Please use a valid email."); </script>';
		}

		else 
		{

		
			if ($_POST['InputPassword'] == $_POST['InputPassword2'])
			{
				$stmt = $conn->prepare("SELECT UserMail FROM users Where UserMail=?"); 
				$stmt->bind_param("s", $usermail);
				$stmt->execute();
				$result = $stmt->get_result(); // get the mysqli result
				

				if (mysqli_num_rows($result) == 0)
				{	
					$userpassword = $_POST['InputPassword'];
					$userpassword = password_hash($userpassword, PASSWORD_DEFAULT);

					$stmt = $conn->prepare("INSERT INTO users (UserMail, UserPass) VALUES (?, ?)"); 
					$stmt->bind_param("ss", $usermail, $userpassword);
					$stmt->execute();

					$_SESSION['user'] = $usermail;
					$_SESSION['loggedIn'] = true;
					$stmt->close();
					mysqli_free_result($result);
				}
				else	
				{
				echo '<script type="text/JavaScript"> alert("User already exists!"); </script>';
				}
			} 
			else
			{
				echo '<script type="text/JavaScript"> alert("Your passwords dont match! "); </script>';
			}
		}
	}	



	
	$conn->close();

?>





</body>
</html>