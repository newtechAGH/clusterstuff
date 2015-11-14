<?
    class database_connect
    {
    	private $dbname;
		private $user;
		private $password;
		private $serwername;
		
		
    	public function __construct($user = "",$password = "",$serwername = "",$dbname="")
		{
			$this->user = $user;
			$this->password = $password;
			$this->serwername = $serwername;
			$this->dbname = $dbname;
		}
		
		public function connect()
		{
			
			$mysqli = null;
			$mysqli = new mysqli($this->serwername,$this->user,$this->password,$this->dbname);
			if($mysqli->connect_error)
			{
				return null;
			}
			else
				{
					return $mysqli;
				}
		}
		
    }
   
?>