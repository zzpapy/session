<?php
$name="";
$email="";
$username="";
$password="";
$confirm="";
var_dump($_SESSION);
if (isset($_POST["submit"]))
{
	if ( !empty($_POST["name"]))
	{ 
		$name=$_POST["name"];
		$email=$_POST["email"];
		$username=$_POST["username"];
		$password=$_POST["password"];
		$confirm=$_POST["confirm"];
		echo "aaaaaa";
		$json=file_get_contents("stock.json");
		$stock = json_decode($json, true);
		$id = uniqid();
		$stockInput = array(
			"name" => $name,
			"email" => $email,
			"username" => $username,
			"password" =>  $password,
			"confirm" => $confirm,
			
		);
		$stock[] = $stockInput;
		// array_push($stock,$stockInput);
		$json=json_encode($stock);
		file_put_contents("stock.json", $json);
		header("Location: index.php?page=login");
		exit; 
		}
		

}


	// require ("views/login.phtml");
?>