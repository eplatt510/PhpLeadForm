<?php
$servername = "pdb19.awardspace.net";
$username = "1763895_bddb1";
$password = "rqxqhwlej7";
$dbname = "1763895_bddb1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT lead_contact_datetime, 
	lead_company, 
    lead_contact, 
    lead_phone, 
    lead_email, 
    lead_address, 
    lead_description, 
    lead_follow_up, 
    lead_fu_date, 
    lead_setup_online,
	lead_owner
FROM leads
WHERE lead_contact_datetime between DATE_SUB(NOW(),INTERVAL 7 DAY) and NOW()";
$result = $conn->query($sql);

$sql2 = "SELECT lead_contact_datetime, 
	lead_company, 
    lead_contact, 
    lead_phone, 
    lead_email, 
    lead_address, 
    lead_description, 
    lead_follow_up, 
    lead_fu_date, 
    lead_setup_online,
	lead_owner
FROM leads";
$result2 = $conn->query($sql2);

$conn->close();
?>  