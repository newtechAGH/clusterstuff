<? 
   include 'database_connect.php';
   
   
   $connection = new database_connect("root","root","localhost","clusterstuff");
   $db = $connection->connect();
   
   
   if($db == null)
   {
   	echo "Cannot make connection";
   }
 
  
   
?>