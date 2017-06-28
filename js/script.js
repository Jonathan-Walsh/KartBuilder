var speedGround = 0;
var speedWater = 1;
var speedAir = 2;
var speedAntiGravity = 3;
var acceleration = 4;
var weight = 5;
var handlingGround = 6;
var handlingWater = 7;
var handlingAir = 8;
var handlingAntiGravity = 9;
var traction = 10;
var miniTurbo = 11;

function startup() {
	getStats();
	$(".hiddenStat").hide();
}

function getStats() {
	var selectedChar = $("#characters option:selected").text();
	var selectedBody = $("#bodies option:selected").text();
	var selectedTires = $("#tires option:selected").text();
	var selectedGlider = $("#gliders option:selected").text();
	 $.post("php/getStats.php", {char: selectedChar, body: selectedBody, tires: selectedTires, glider: selectedGlider},
         function(data){
         	var stats = data.split(",");
            $("#speedGround").html("Speed: " + stats[speedGround]);
            $("#speedWater").html("Speed (Water): " + stats[speedWater]);
            $("#speedAir").html("Speed (Air): " + stats[speedAir]);
            $("#speedAntiGravity").html("Speed (Anti-Gravity): " + stats[speedAntiGravity]);
            $('#acceleration').html("Acceleration: " + stats[acceleration]);
            $("#weight").html("Weight: " + stats[weight]);
            $('#handlingGround').html("Handling: " + stats[handlingGround]);
            $('#handlingWater').html("Handling (Water): " + stats[handlingWater]);
            $('#handlingAir').html("Handling (Air): " + stats[handlingAir]);
            $('#handlingAntiGravity').html("Handling (Anti-Gravity): " + stats[handlingAntiGravity]);
            $("#traction").html("Traction: " + stats[traction]);
            $('#miniTurbo').html("Mini-Turbo: " + stats[miniTurbo]);
        }
    );
}

function toggleHiddenStats() {
	changeSpeedAndHandlingText();
	$(".hiddenStat").slideToggle();
}

function changeSpeedAndHandlingText() {
	if ($(".hiddenStat").is(":hidden")) {
		$speedText = $("#speedGround").html();
		$speedText = $speedText.replace("Speed:", "Speed (Ground):");
		$("#speedGround").html($speedText);

		$handlingText = $("#handlingGround").html();
		$handlingText = $handlingText.replace("Handling:", "Handling (Ground):");
		$("#handlingGround").html($handlingText);
	}
	else {
		$speedText = $("#speedGround").html();
		$speedText = $speedText.replace("Speed (Ground):", "Speed:");
		$("#speedGround").html($speedText);

		$handlingText = $("#handlingGround").html();
		$handlingText = $handlingText.replace("Handling (Ground):", "Handling:");
		$("#handlingGround").html($handlingText);
	}
}