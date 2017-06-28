<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MK8D Kart Builder</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" type = "text/css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <?php 
      include "php/database.php"; 
      $connection = CreateConnection();
      ?>
  </head>
  <body onload="startup()">
    <div class="jumbotron" style = "background-color: DeepSkyBlue">
      <div class = "container text-center">
        <h1>Mario Kart 8 Deluxe: Kart Builder</h1>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-offset col-md-2">
          <h3 class="text-center">Character</h3>
          <select class="form-control" id="characters" onchange="getStats()">
            <?php
              $characters = $connection->query("SELECT name FROM characters");
              $i = 0;
              while ($row = $characters->fetch_assoc()) {
                $i++;
                echo "<option value=\"" . $i . "\">" . $row['name'] . "</option>";
              }
            ?>
            </select>
            <h3 class="text-center">Body</h3>
          <select class="form-control" id="bodies" onchange="getStats()">
          <?php
              $bodies = $connection->query("SELECT name FROM bodies");
              while ($row = $bodies->fetch_assoc())
                echo "<option>" . $row['name'] . "</option>";
            ?>
          </select>
        </div>
        <div class="col-md-2">
          <h3 class="text-center">Tires</h3>
          <select class="form-control" id="tires" onchange="getStats()">
          <?php
              $tires = $connection->query("SELECT name FROM tires");
              while ($row = $tires->fetch_assoc())
                echo "<option>" . $row['name'] . "</option>";
            ?>
          </select>
          <h3 class="text-center">Glider</h3>
          <select class="form-control" id="gliders" onchange="getStats()">
          <?php
              $gliders = $connection->query("SELECT name FROM gliders");
              while ($row = $gliders->fetch_assoc())
                echo "<option>" . $row['name'] . "</option>";
            ?>
          </select>  
        </div>
        <div class="col-md-offset-4 col-md-2">
          <h3>Stats</h3>
          <p id="speedGround"></p>
          <p class="hiddenStat" id="speedWater"></p>
          <p class="hiddenStat" id="speedAir"></p>
          <p class="hiddenStat" id="speedAntiGravity"></p>
          <p id="acceleration"></p>
          <p id="weight"></p>
          <p id="handlingGround"></p>
          <p class="hiddenStat" id="handlingWater"></p>
          <p class="hiddenStat" id="handlingAir"></p>
          <p class="hiddenStat" id="handlingAntiGravity"></p>
          <p id="traction"></p>
          <p class="hiddenStat" id="miniTurbo"></p>
        </div>
        <div class="col-md-2">
          <h4></h4>
          <button onclick="toggleHiddenStats()">Toggle Hidden Stats</button>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
  </body>
  <?php
    CloseConnection($connection);
  ?>
</html>
