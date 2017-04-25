<?PHP
require_once("fg_membersite.php");

$fgmembersite = new FGMembersite();

//Provide your site name here
$fgmembersite->SetWebsiteName('mybrickdata.com');

//Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail('erik@brickdata.com');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$fgmembersite->InitDB(/*hostname*/'pdb19.awardspace.net',
                      /*username*/'1763895_bddb1',
                      /*password*/'rqxqhwlej7',
                      /*database name*/'1763895_bddb1',
                      /*table name*/'users');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('HK2VMPqy8ZVVM2K');

?>