<?
	if(!isset($_SESSION['user']) || $_SESSION["user"] == null || !isset($_SESSION["connection"]) || $_SESSION["connection"] == null)
	{
		header("Location: index.php");
	}

?>