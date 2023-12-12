<html>

<body>


	
<?php

include 'conn.php';


	//Checking login for POST
	//being passed from login.php
	if (isset($_POST['frmLogin']))
	{
		//save user input in variables
		$username = $_POST['InputEmail'];
		$password = $_POST['InputPassword'];
		
		//prepared query to see if user exists
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
			//Save some session variables for later use.
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


	//checking signup POST
	//Being passed from register.php
	if (isset($_POST['frmSignup']))
	{	
		//passing user input to variables
		$usermail = $_POST['InputEmail'];
		$usermail = filter_var($usermail, FILTER_SANITIZE_EMAIL);

		//making sure user uses correct format for email form
		if(!filter_var($usermail, FILTER_VALIDATE_EMAIL))
		{
			echo '<script type="text/JavaScript"> alert("Please use a valid email."); </script>';
		}

		else 
		{

			//making sure user is typing the correct password and checking for typos.
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


		error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

		require_once "Mail.php";

		//smtp email setup.
		include "emailTemplates.php"

		$host = "";
		$username = "";
		$password = "";
		$port = "";
		$email_from = "";
		$email_address = "";

		$to = $usermail;
		$email_subject = "Email Verification";
		$email_body = "Please click on the following link in order to verify your email address. This link will only be active for 10 minutes. If your link is no longer active, please complete the account registration process again to receive the new link. ";


		$headers = ['From' => $email_from, 'To' => $to, 'Subject' => $email_subject, 'Reply-To' => $email_address];
		$smtp = Mail::factory('smtp', ['host' => $host, 'port' => $port, 'auth' => true, 'username' => $username, 'password' => $password]);

		$mail = $smtp->send($to, $headers, $email_body);

		if (PEAR::isError($mail)) 
		{
		  echo "<p>" . $mail->getMessage() . "</p>";
		} else 
		{
		  echo "<p>Message successfully sent!</p>";
		}


		 
		  //create or generate a token that is attached to the userid then store token in db. Give token a create date. Then create an event in table to clear tokens older than 10 minutes.

	//This is the end of the register.php POST
	}	



	
	$conn->close();

?>





</body>
</html>