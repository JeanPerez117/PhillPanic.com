

<?php
$last24hours = date_create();
date_sub($last24hours,date_interval_create_from_date_string("24 hours"));
$sql = "SELECT Message FROM Messages Where ToUser = 'global' AND WhenPosted > $last24hours";
				
$result = mysqli_query($conn, $sql);


	if (mysqli_num_rows($result) > 0)
	{
		while($message = mysqli_fetch_assoc($result))
		{
		echo "<tr>" . $message["FromUser"]. ":" . $message["Message"]. " " . $message["WhenPosted"]. "</tr>";
		}

	}
	else{echo "<tr>" . "No messages at this time"."</tr>";}	

				
?>