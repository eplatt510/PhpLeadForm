<?php
	if(empty($errorMessage)) 
        {
			$servername = "pdb19.awardspace.net";
			$username = "1763895_bddb1";
			$password = "rqxqhwlej7";
			$dbname = "1763895_bddb1";

			$db = new mysqli($servername,$username, $password, $dbname);
			if($db->connect_error) die("Error connecting to MySQL database.");
					
			$sql = "SELECT COUNT(lead_id)
					FROM leads
					WHERE lead_contact_datetime between DATE_SUB(NOW(),INTERVAL 7 DAY) and NOW()";
			$weekLeads = $db->query($sql);
			while ($row = $weekLeads->fetch_assoc()) {
			$week = $row['COUNT(lead_id)']."<br>";
			
			}
						
		}
	$db->close();
?>         