<?php
require_once 'model/addons.model.php';

class AddonsController{

    private $addon;

    public function __CONSTRUCT(){
        $this->addon = new AddonModel();
    }

    // Metodo para cargar los valores del primer dropdown (PAIS)
    public function loadCountries(){
        $data = $this->addon->readCountries();
        foreach ($data as $row) {
          echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
        }
    }

    // Metodo para cargar los valores del segundo dropdown (ESTADO)
    public function loadState(){
      $data = $this->addon->readStatebyCountry($_POST["code"]);
      $x = 0;
      foreach($data as $row) {
        if($x == 0){ echo "<option value=''>Seleccione un estado</option>"; }
        echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
        $x++;
      }
    }

    // Metodo para cargar los valores del tercer dropdown (CIUDAD)
    public function loadCity(){
        $data = $this->addon->readCitybyState($_POST["code"]);
        $x = 0;
        foreach($data as $row) {
          if($x == 0){ echo "<option value=''>Seleccione una ciudad</option>"; }
          echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
          $x++;
        }

        if(count($data)<=0){ echo "<option value=''>No hay ciudades almacenadas</option>"; }
    }

}

?>
