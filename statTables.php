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
  <body>
    <div class="jumbotron" style = "background-color: DeepSkyBlue">
      <div class = "container text-center">
        <h1>Mario Kart 8 Deluxe: Stat Tables</h1>
        <div class="btn-group pull-right">
          <button type="button" class="btn-lg btn-default dropdown-toggle nav-list" data-toggle="dropdown">
            <span class="glyphicon glyphicon-list"></span><span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index.php">Kart Builder</a></li>
            <li class="active"><a href="statTables.php">Stat Tables</a></li>
          </ul>
        </div>  
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md">
          <h3>Characters</h3>
          <table class="table table-bordered">
            <?php
              function displayRow($row, $cols) {
                echo "<tr>";
                foreach($cols as $col)
                  echo "<td>" . $row[$col] . "</td>";
                echo "</tr>";
              }

              $charData = $connection->query("SELECT * FROM characters");
              echo "<tr>";
              $row = $charData->fetch_assoc();
              foreach($row as $key => $value)
                echo "<th class=\"header\">$key</th>";
              echo "</tr>";

              $charData = $connection->query("SELECT * FROM characters");
              $charCols = ["Name", "Weight Class", "Speed (Ground)", "Speed (Water)", "Speed (Air)", "Speed (Anti-Gravity)", 
                "Acceleration", "Weight", "Handling (Ground)", "Handling (Water)", "Handling (Air)", "Handling (Anti-Gravity)",
                "Traction", "Mini-Turbo"];
              while ($row = $charData->fetch_assoc()) {
                displayRow($row, $charCols);
              }
            ?>
          </table>
          <h3>Kart Bodies</h3>
          <table class="table table-bordered">
            <?php
              $bodyData = $connection->query("SELECT * FROM bodies");
              echo "<tr>";
              $row = $bodyData->fetch_assoc();
              foreach($row as $key => $value)
                echo "<th class=\"header\">$key</th>";
              echo "</tr>";

              $bodyData = $connection->query("SELECT * FROM bodies");
              $bodyCols = ["Name", "Type", "Speed (Ground)", "Speed (Water)", "Speed (Air)", "Speed (Anti-Gravity)", 
                "Acceleration", "Weight", "Handling (Ground)", "Handling (Water)", "Handling (Air)", "Handling (Anti-Gravity)",
                "Traction", "Mini-Turbo"];
              while ($row = $bodyData->fetch_assoc()) {
                displayRow($row, $bodyCols);
              }
            ?>
          </table>
          <h3>Tires</h3>
          <table class="table table-bordered">
            <?php
              $tiresData = $connection->query("SELECT * FROM tires");
              echo "<tr>";
              $row = $tiresData->fetch_assoc();
              foreach($row as $key => $value)
                echo "<th class=\"header\">$key</th>";
              echo "</tr>";

              $tiresData = $connection->query("SELECT * FROM tires");
              $tiresCols = ["Name", "Speed (Ground)", "Speed (Water)", "Speed (Air)", "Speed (Anti-Gravity)", 
                "Acceleration", "Weight", "Handling (Ground)", "Handling (Water)", "Handling (Air)", "Handling (Anti-Gravity)",
                "Traction", "Mini-Turbo"];
              while ($row = $tiresData->fetch_assoc()) {
                displayRow($row, $tiresCols);
              }
            ?>
          </table>
          <h3>Gliders</h3>
          <table class="table table-bordered">
            <?php
              $gliderData = $connection->query("SELECT * FROM gliders");
              echo "<tr>";
              $row = $gliderData->fetch_assoc();
              foreach($row as $key => $value)
                echo "<th class=\"header\">$key</th>";
              echo "</tr>";

              $gliderData = $connection->query("SELECT * FROM gliders");
              $gliderCols = ["Name", "Speed (Ground)", "Speed (Water)", "Speed (Air)", "Speed (Anti-Gravity)", 
                "Acceleration", "Weight", "Handling (Ground)", "Handling (Water)", "Handling (Air)", "Handling (Anti-Gravity)",
                "Traction", "Mini-Turbo"];
              while ($row = $gliderData->fetch_assoc()) {
                displayRow($row, $gliderCols);
              }
            ?>
          </table>
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