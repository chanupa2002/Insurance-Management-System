
<?php 

session_start();

// Clearing the session data
$_SESSION = array();

// Checking if the session cookie exists and deleting it
if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time()-86400, '/');
}

// Destroying the session
session_destroy();

// Redirecting the user to the login page with logout confirmation
header('Location: insMngrLog.php?logout=yes');

?>
