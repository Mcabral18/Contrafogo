<?php

class ligacao_bd {
	
	private $host = 'localhost';
	private $username = 'root';
	private $password = 'cm';
	private $bd = 'DBcontrafogo';
	private $myDb = null;
	//ligar a base de dados
	public function __construct() {
		$this->myDb = new mysqli($this->host, $this->username, $this->password, $this->bd);
	
	if (mysqli_connect_error()){
		throw new Exception('Error connecting to the database.');	
	}
}
	
	//query
	public function performQuery($query){
		
		if($result = $this->myDb->query($query)){
			return($result);
		}
		else {
				throw new Exception('erro na querry');
		}
	}
		
	//fechar a bd
	public function closeDb(){
		
		
		if($this->myDB != null){
			$myDb->close();
		}
	}
}

?>