<?php
$json=file_get_contents("stock.json");
$stock = json_decode($json, true);
$error="";
$name="";
$email="";
$username="";
$password="";
$confirm="";
if (isset($_POST["submit"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["confirm"]))
{
		$name=$_POST["name"];
		$email=$_POST["email"];
		$username=$_POST["username"];
		$password=$_POST["password"];
		$confirm=$_POST["confirm"];
	if ( empty($_POST["name"]))
	{ 
		$error="l'entrée nom est vide";
		
		
	}
	else if (empty($_POST["email"])|| !filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
	{
		$error="l'email est non valide";
		
	}
	else if ($password != $confirm)
	{
		$error="vos mots de passe ne sont pas identique";
		
	}
	else if (!empty($username))
	{
		$i=0;
		while ($i<sizeof($stock))
		{
			if($stock[$i]["username"]==$username)
			{
				$error="ce pseudo existe dejà";
				
			}
			$i++;
		}
// var_dump($_POST);
// exit;
	}
		
	if (empty($error))
	{
		// $json=file_get_contents("stock.json");
		// $stock = json_decode($json, true);
		
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