<?
session_start();


function test_input($data) {
 		 $data = trim($data);
  		 $data = stripslashes($data);
  		 $data = htmlspecialchars($data);
  return $data;
   }



  require "connect.php";

	$login = test_input($_POST['login']);
	$password = test_input($_POST['pass']);


	$query = "SELECT COUNT(*) FROM Users WHERE mail='$login' AND password='$password' AND aktywny='1'";
  $isnick  = mysqli_fetch_array(mysqli_query($db,$query));

  if($isnick[0] == 0)
  {
    echo "użytkownik nie istnieje";
  }
  else {
    echo "zalogowany";

   $_SESSION['login'] = $login;
   $_SESSION['password'] = $password;


  }


?>
