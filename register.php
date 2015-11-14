<?

   $db = new mysqli("localhost","root","root","clusterstuff");
   if($db->connect_error)
   {
   	 echo "error";
   }
   
   function test_input($data) {
 		 $data = trim($data);
  		 $data = stripslashes($data);
  		 $data = htmlspecialchars($data);
  return $data;
   }
   
   
   function test_preg_input($data)
   {
   	 if (preg_match("/^[a-zA-Z ]*$/",$data))
	 return true;
	 else 
	 	return false;
   }
   
   function test_mail_input($data)
   {
   	if (filter_var($data, FILTER_VALIDATE_EMAIL)) 
	  return true;
	else 
		return false;
   }
   
   function saveData($name,$surname,$mail,$password)
   {
   	 
   	  print_r($db);
   	  $sql = "INSERT INTO Users (name,surname,mail,password,admin) VALUES ('".$name."','".$surname."','".$mail."','".$password."','false')";
	  if(mysqli_query($GLOBALS['db'], $sql))
	  {
	  	header("Location: /clusterstuff/index.php");
	  }
	  else {
		  echo "Error while saving data";
	  }
   }
   
   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
   	   $error = false;
	   
   	   $name = test_input($_POST['name']);
	   $surname = test_input($_POST['surname']);
	   $mail = test_input($_POST['mail']);
	   $password = test_input($_POST['password']);
	   
	   
	   saveData($name, $surname, $mail, $password);
	   
	   
	   	
	      
	   
   }
   else {
       echo "Error while sending data";
   }
  
  mysqli_close($db);
	
?>