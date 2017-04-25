<?php
	if(isset($_POST['formSubmit']))
    {
		$errorMessage = "";
		
		if(empty($_POST['formDatetime'])) 
        {
			$errorMessage .= "<li>You didn't enter the date and time.</li>";
		}
		if(empty($_POST['formCompany'])) 
        {
			$errorMessage .= "<li>You did not enter a Company.</li>";
		}
		if(empty($_POST['formContact'])) 
        {
			$errorMessage .= "<li>You did not enter a Contact.</li>";
		}
		$varLeadContactDatetime = $_POST['formDatetime'];
		$varLeadCompany = $_POST['formCompany'];
		$varLeadContact = $_POST['formContact'];
		$varLeadPhone = $_POST['formPhone'];
		$varLeadEmail = $_POST['formEmail'];
		$varLeadAddress = $_POST['formAddress'];
		$varLeadDescription = $_POST['formDescription'];
		$varLeadFollowUp = $_POST['formFollowUp'];
		$varLeadFUDatetime = $_POST['formFUDatetime'];
		$varLeadSetupOnline = $_POST['formSetupOnline'];
		$varLeadSalesperson = $_POST['formSalesperson'];

	
		if(empty($errorMessage)) 
        {
		
			$servername = "pdb19.awardspace.net";
			$username = "1763895_bddb1";
			$password = "rqxqhwlej7";
			$dbname = "1763895_bddb1";
			
			$db = new mysqli($servername,$username, $password, $dbname);
			if($db->connect_error) die("Error connecting to MySQL database.");
			//mysqli_select_db($db, "hours");

			$sql = "INSERT INTO hours (lead_id, lead_contact_datetime, lead_company, lead_contact, lead_phone, lead_email, lead_address, lead_description, lead_follow_up, lead_fu_date, lead_setup_online, lead_owner) VALUES ('', 
							'$varLeadContactDatetime',
							'$varLeadCompany',
							'$varLeadContact',
							'$varLeadPhone',
							'$varLeadEmail',
							'$varLeadAddress',
							'$varLeadDescription',
							'$varLeadFollowUp',
							'$varLeadFUDatetime',
							'$varLeadSetupOnline',
							'$varLeadSalesperson')";
			$db->query($sql);
			
			header("Location: thank-you.html");
			exit();
		}
	}
            
    // function: PrepSQL()
    // use stripslashes and mysql_real_escape_string PHP functions
    // to sanitize a string for use in an SQL query
    //
    // also puts single quotes around the string
    //
    function PrepSQL($value)
    {
        // Stripslashes
        if(get_magic_quotes_gpc()) 
        {
            $value = stripslashes($value);
        }

        // Quote
        $value = "'" . mysql_real_escape_string($value) . "'";

        return($value);
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- Website title -->
<title>myBrickdata|Hours</title>
<!--Attached css-->
<link href="css/basic.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">
<!--Attached fevicon-->
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<style>
/* label,a {
	font-family : Arial, Helvetica, sans-serif;
	font-size : 12px; 
}
box {
width: 300px;
height: 10em;
}  */

</style>	
</head>

<body>
<div id="wrapper">
  <!-- Header starts -->
  <div id="header">
    <div class="ovfl-hidden">
      <h1 id="logo" class="fl"><a href="http://www.brickdata.com/index.html">&nbsp;</a></h1>
	  <div class="fr header-rgt">
       <div class="sec-2"><label><b>Address:</b></label></div>
            <div class="sec-1"><label>74-5599 Alapa St<br /> Kailua Kona, HI 96740</label></div>
            <div class="sec-2"><label><b>Phone No. :</b><br /> 808 329 5505</label></div>
            <div class="sec-3"><label><b>Email :</b><br /><a href="mailto:info@brickdata.com">info@brickdata.com</a></label></div>
            
      </div>
    </div>
    <div class="navigation">
    <div class="nav-lft-bg"></div>
    <div class="nav-mid-bg">                                                                  
      <ul class="reset ovfl-hidden" id="globalNav">
        <li class="first"><a href="index.html">Home</a></li>
        <li><a href="http://www.brickdata.com/aboutus.html">About us</a></li>
        <li><a href="http://www.brickdata.com/services.html">Services</a></li>
        <li><a href="https://secure.ontimesystem.com/sites/Brickdata/login.aspx?ReturnUrl=%2fsites%2fBrickdata%2fdefault.aspx">Online Ordering</a></li>
        <li><a href="http://www.brickdata.com/rates.html">Rates</a></li>
        <li><a href="http://www.brickdata.com/contactus.html">Contact us</a></li>
      </ul>
      </div>
      <div class="nav-rgt-bg"></div>
    </div>
  </div>
  
  <!-- Header ends -->


       <?php
		    if(!empty($errorMessage)) 
		    {
			    echo("<p>There was an error with your form:</p>\n");
			    echo("<ul>" . $errorMessage . "</ul>\n");
            }
			
			$varLeadContactDatetime = NULL;
			$varLeadCompany = NULL;
			$varLeadContact = NULL;
			$varLeadPhone = NULL;
			$varLeadEmail = NULL;
			$varLeadAddress = NULL;
			$varLeadDescription = NULL;
			$varLeadFollowUp = NULL;
			$varLeadFUDatetime = NULL;
			$varLeadSetupOnline = NULL;
			$varLeadSalesperson = NULL;
        ?>

	<h2>Lead Contact Form</h2>
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
			<p>
				<label for='formDatetime'>Date and Time of Visit</label><br/>
				<input type="datetime-local" name="formDatetime" maxlength="50" value="<?=$varLeadContactDatetime;?>" />
			</p>
			<p>
				<label for='formCompany'>Company</label><br/>
				<input type="text" name="formCompany" maxlength="100" value="<?=$varLeadCompany;?>" />
			</p>
			<p>
				<label for='formContact'>Contact</label><br/>
				<input type="text" name="formContact" maxlength="100" value="<?=$varLeadContact;?>" />
			</p>
			<p>
				<label for='formPhone'>Phone</label><br/>
				<input type="text" name="formPhone" maxlength="10" value="<?=$varLeadPhone;?>" />
			</p>
			<p>
				<label for='formEmail'>Email</label><br/>
				<input type="text" name="formEmail" maxlength="100" value="<?=$varLeadEmail;?>" />
			</p>
			<p>
				<label for='formAddress'>Address</label><br/>
				<input type="text" name="formAddress" maxlength="150" value="<?=$varLeadAddress;?>" />
			</p>
			<p>
				<label for='formDescription'>Description of conversation</label><br/>
				<textarea rows="6" cols="65" name="formDescription" maxlength="1000" value="<?=$varLeadDescription;?>"> </textarea>
			</p>
			<p>
				<label for='formFollowUp'>Information about Follow Up</label><br/>
				<textarea rows="6" cols="65" name="formFollowUp" maxlength="1000" value="<?=$varLeadFollowUp;?>"> </textarea>
			</p>
			<p>
				<label for='formFUDatetime'>Date to follow up</label><br/>
				<input type="date" name="formFUDatetime" maxlength="50" value="<?=$varLeadFUDatetime;?>" />
			</p>
			<p>
				<label for='formSetupOnline'>Setup Online Account</label><br/>
				<select name="formSetupOnline">
					<option value="">Select...</option>
					<option value="Yes"<? if($varLeadSetupOnline=="Yes") echo(" selected=\"selected\"");?>>Yes</option>
					<option value="No"<? if($varLeadSetupOnline=="No") echo(" selected=\"selected\"");?>>No</option>
				</select>
			</p>
			<p>
				<label for='salesperson'>Salesperson</label><br/>
				<select name="formSalesperson">
					<option value="">Select...</option>
					<option value="Josh"<? if($varLeadSalesperson=="Josh") echo(" selected=\"selected\"");?>>Josh</option>
					<option value="Mark"<? if($varLeadSalesperson=="Mark") echo(" selected=\"selected\"");?>>Mark</option>
				</select>
			</p>
			<input type="submit" name="formSubmit" value="Submit" />
		</form>
		

<!-- Footer starts -->
<div id="footer">
  <div id="footerwrap">
                                                           
  <div class="f-lft-bg"></div>
  <div class="f-mid-bg">
  <ul class="f-links">
  <li class="first"><a href="http://www.brickdata.com/index.html">Home</a></li>
        <li><a href="http://www.brickdata.com/aboutus.html">About us</a></li>
        <li><a href="http://www.brickdata.com/services.html">Services</a></li>
        <li><a href="https://secure.ontimesystem.com/sites/Brickdata/login.aspx?ReturnUrl=%2fsites%2fBrickdata%2fdefault.aspx">Online Ordering</a></li>
        <li><a href="http://www.brickdata.com/rates.html">Rates</a></li>
        <li><a href="http://www.brickdata.com/contactus.html">Contact us</a></li>
  </ul>
  </div>
  <div class="f-rgt-bg"></div>
  <div class="clr"></div>
  <div class="copyright"><p>Copyright © 2013. Brickdata.com<br />All Rights Reserved. Terms & Condition.</p></div>
   
  </div>
</div>
<!-- Footer ends -->
</body>
</html>