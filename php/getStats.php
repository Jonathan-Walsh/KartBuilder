<?php
	include "database.php";
	$connection = CreateConnection();

	$char = $_POST['char'];
	$body = $_POST['body'];
	$tires = $_POST['tires'];
	$glider = $_POST['glider'];

	$speedGround = GetSum("Speed (Ground)");
    $speedWater = GetSum("Speed (Water)");
    $speedAir = GetSum("Speed (Air)");
    $speedAntiGravity = GetSum("Speed (Anti-Gravity)");
	$acceleration = GetSum("Acceleration");
	$weight = GetSum("Weight");
	$handlingGround = GetSum("Handling (Ground)");
    $handlingWater = GetSum("Handling (Water)");
    $handlingAir = GetSum("Handling (Air)");
    $handlingAntiGravity = GetSum("Handling (Anti-Gravity)");
	$traction = GetSum("Traction");
    $miniTurbo = GetSum("Mini-Turbo");

    echo $speedGround . "," . $speedWater . "," . $speedAir . "," . $speedAntiGravity . "," . $acceleration . "," . $weight . "," . $handlingGround 
    . "," . $handlingWater . "," . $handlingAir . "," . $handlingAntiGravity . "," . $traction . "," . $miniTurbo;
    CloseConnection($connection);

    function GetSum($column) {
    	$connection = $GLOBALS['connection'];
    	$char = $GLOBALS['char'];
    	$body = $GLOBALS['body'];
    	$tires = $GLOBALS['tires'];
    	$glider = $GLOBALS['glider'];

    	$charRow = $connection->query("SELECT `$column` FROM characters WHERE name = \"$char\"");
    	while ($row = $charRow->fetch_assoc())
    		$charVal = $row["$column"];
    	$bodyRow = $connection->query("SELECT `$column` FROM bodies WHERE name = \"$body\"");
    	while ($row = $bodyRow->fetch_assoc())
    		$bodyVal = $row["$column"];
    	$tiresRow = $connection->query("SELECT `$column` FROM tires WHERE name = \"$tires\"");
    	while ($row = $tiresRow->fetch_assoc())
    		$tiresVal = $row["$column"];
    	$gliderRow = $connection->query("SELECT `$column` FROM gliders WHERE name = \"$glider\"");
    	while ($row = $gliderRow->fetch_assoc())
    		$gliderVal = $row["$column"];
    	return $charVal + $bodyVal + $tiresVal + $gliderVal;
    }

?>