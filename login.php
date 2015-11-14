<?




echo "Login";

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
	
	echo "check";
	$login = test_input($_POST['login']);
	$password = test_input($_POST['pass']);
	
	echo $login;
	echo $password;
	
	$query = "SELECT * FROM Users WHERE mail='".$login."'AND password='".$password."'";
	$val = mysqli_query($db, $query);
	if(!$val)
	{
		// Wrong password
		echo "wrong password";
	}
	else
		{
			echo "correct";
		}
}
else
	{
		echo "wrong request method";
	}

  mysqli_close($db);

?>