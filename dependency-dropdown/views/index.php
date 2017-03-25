<?php
  require_once "controller/addons.controller.php";
  $addons = new AddonsController();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dependecy Dropdown</title>
    <link rel="stylesheet" href="views/css/master.css">
  </head>
  <body>
    <div class="container">
      <h1>DROPDOWN DEPENDIENTES</h1>
      <form>
        <select id="sel-country">
          <option value="">Seleccione un país</option>
          <?php $addons->loadCountries(); ?>
        </select>
        <select id="sel-state"  class="no-data">
          <option value="">Seleccione un departamento</option>
        </select>
        <select id="sel-city">
          <option value="">Seleccione una ciudad</option>
        </select>
      </form>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="views/lib/master.js"></script>
  </body>
</html>
