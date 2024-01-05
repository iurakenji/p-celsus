<?php
class Conexao {
	
	const DBHOST = "192.168.0.149";
	const DBUSER = "cq";
	const DBPASSWORD = "cq030018N";
	const DBNAME = "pcelsus";
	
  /**
   * Summary of hostdb
   * @var 
   */
	private $hostdb;
  /**
   * Summary of userdb
   * @var 
   */
	private $userdb;
  /**
   * Summary of password
   * @var 
   */
	private $password;
  /**
   * Summary of dbname
   * @var 
   */
	private $dbname;
	
  /**
   * Summary of __construct
   * @param mixed $host
   * @param mixed $user
   * @param mixed $pass
   * @param mixed $dbname
   */
	function __construct(
	$host = self::DBHOST, 
	$user = self::DBUSER, 
	$pass = self::DBPASSWORD, 
	$dbname = self::DBNAME) {
		$this->hostdb = $host;
		$this->userdb = $user;
		$this->password = $pass;
		$this->dbname = $dbname;
	}
	
  /**
   * Summary of getConnection
   * @return PDO
   */
	public function getConnection() {
		try {
			
			$dbh = new PDO ( "mysql:host={$this->hostdb};dbname={$this->dbname}", $this->userdb, $this->password, 
			array (
					PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" 
			) );
			
			return $dbh;
		} catch ( PDOException $e ) {
			
			print "Erro de conexao: " . $e->getMessage () . "<br/>\n";
			
			die ();
		}
	}
	
}

?>

