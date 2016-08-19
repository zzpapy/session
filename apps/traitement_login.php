<?php
$json=file_get_contents("stock.json");
$stock = json_decode($json, true);


$username="";
$password="";


if (isset($_POST["submit"]))
{
	if ( !empty($_POST["username"]))
	{ 
		
		$username=$_POST["username"];
		$password=$_POST["password"];
		$i=0;
		while ($i<sizeof($stock))
		{
			if ($username==$stock[$i]["username"] && $password==$stock[$i]["password"])
			{
				$_SESSION["name"]=$stock[$i]["name"];
				$_SESSION["username"]=$username;
				
				
				$_SESSION["email"]=$stock[$i]["email"];
				
			}
			$log=true;
			$i++;
		}
		require ("apps/header.php");
		exit; 
		
		
			
		
		
		}
		

}


	// require ("views/login.phtml");
?>