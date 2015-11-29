<?
session_start();
function test_input($data) {
 		 $data = trim($data);
  		 $data = stripslashes($data);
  		 $data = htmlspecialchars($data);
  return $data;
   }




$db = new mysqli("localhost","root","root","clusterstuff");
   if($db->connect_error)
   {
   	 echo "error";
   }

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$login = test_input($_POST['login']);
	$password = test_input($_POST['pass']);


	$query = "SELECT COUNT(*) FROM Users WHERE mail='$login' AND password='$password' AND aktywny='1'";
  $isnick  = mysqli_fetch_array(mysqli_query($db,$query));

  if($isnick[0] == 0)
  {
    echo "użytkownik nie istnieje";
  }
  else {
   $_SESSION['login'] = $login;
   $_SESSION['password'] = $password;

   echo "zalogowany";
  }
}
else
	{
		echo "wrong request method";
	}

  mysqli_close($db);

?>
