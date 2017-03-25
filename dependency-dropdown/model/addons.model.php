<?php

class AddonModel{

	private $pdo;

	public function __CONSTRUCT(){
		try {
		  $this->pdo = DataBase::connect();
		  $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

 /*********************************************
  ** readCountrys
	** Trae todos los datos de la tabla pais
	********************************************/

	public function readCountries(){
		try{
				$sql = "SELECT * FROM countries ORDER BY name";
				$query = $this->pdo->prepare($sql);
				$query->execute();
				$result = $query->fetchALL(PDO::FETCH_BOTH);
			}catch (PDOException $e) {
			die($e->getMessage());
		}

		return $result;
	}

 /***********************************************************
  ** readStatebyCountry
	** Trae todos los datos de la tabla estados segun el pais
	***********************************************************/

	public function readStatebyCountry($country){
		try{
				$sql = "SELECT * FROM states WHERE country_id = ? ORDER BY name";
				$query = $this->pdo->prepare($sql);
				$query->execute(array($country));
				$result = $query->fetchALL(PDO::FETCH_BOTH);
			}catch (PDOException $e) {
			die($e->getMessage());
		}

		return $result;
	}


 /************************************************************
  ** loadCity
	** Trae todos los datos de la tabla ciudad segun el estado
	***********************************************************/

	public function readCitybyState($state){
		try{
				$sql = "SELECT * FROM cities WHERE state_id = ?  ORDER BY name";
				$query = $this->pdo->prepare($sql);
				$query->execute(array($state));
				$result = $query->fetchALL(PDO::FETCH_BOTH);
			}catch (PDOException $e) {
			die($e->getMessage());
		}

		return $result;
	}
	public function __DESTRUCT(){
	    DataBase::disconnect();
	}




}

?>
