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


   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
   	   $error = false;

   	   $name = test_input($_POST['name']);
	   $surname = test_input($_POST['surname']);
	   $mail = test_input($_POST['mail']);
	   $password = test_input($_POST['password']);


     $query = "SELECT COUNT(*) FROM Users WHERE mail='$mail' OR surname='$surname'";
     $isnick  = mysqli_fetch_array(mysqli_query($db,$query));


    if($isnick[0] == 0)
    {
   $sql = "INSERT INTO Users (name,surname,mail,password,admin) VALUES ('$name','$surname','$mail','$password','false')";
   if(mysqli_query($db, $sql))
   {
     echo "ok";
   }
   else {
     echo "Error while saving data";
   }
 }
else {
  echo "error";
}



   }
   else {
       echo "Error while sending data";
   }

  mysqli_close($db);

?>
