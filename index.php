<?php
session_start();
//date_default_timezone_set('UTC');

$page = "home";
$pageList = ["home","register","login"];

$error = "";
// $date = "";

if(isset($_GET["page"]) && in_array($_GET["page"], $pageList))
{
	$page = $_GET["page"];
}

$traitementList = ["register","login","logout"];

if(isset($_GET['page']) && in_array($_GET['page'], $traitementList))
{
	require("apps/traitement_".$_GET['page'].".php");
}

require("apps/skel.php");

?>