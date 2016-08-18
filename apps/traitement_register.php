<?php
if (!isset($_SESSION["submit"]))
{
	$page="register";
}
else
{
	$_SESSION["name"]=$name;
	$_SESSION["email"]=$email;
	$_SESSION["username"]=$username;
	$_SESSION["password"]=$password;
	$_SESSION["confirm"]=$confirm;
	var_dump($_SESSION);
	echo "aaaaaa";

}


header("Location: index.php?page=login");
exit; 
	// require ("views/login.phtml");
?>