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

	changeImages(selectedChar, selectedBody, selectedTires, selectedGlider);

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

function changeImages(char, body, tires, glider) {
	var charImg = "../img/characters/" + char + ".png";
	var charId = "#charImg";
	setImage(charImg, charId);

	var bodyImg = "../img/bodies/" + body + ".png";
	var bodyId = "#bodyImg";
	setImage(bodyImg, bodyId);

	var tiresImg = "../img/tires/" + tires + ".png";
	var tiresId = "#tiresImg";
	setImage(tiresImg, tiresId);

	var gliderImg = "../img/gliders/" + glider + ".png";
	var gliderId = "#gliderImg";
	setImage(gliderImg, gliderId);
}

function setImage(img, htmlId) {
	var height = 0;
	var width = 1;

	$(htmlId).attr("src", img);
	$.post("php/getImageDimensions.php", {img : img},
		function(data) {
			var dimensions = data.split(",");
			$(htmlId).attr("height", dimensions[height] / 2.2);
			$(htmlId).attr("width", dimensions[width] / 2.2);
		}
	); 
}

function getImgHeight(url) {
	var img = new Image();
	img.onload = function(){
 	 	var height = this.height / 2;
 	 	return height;
	}
	img.src = url;
}

function getImgWidth(url) {
	var img = new Image();
	img.onload = function(){
 	 	var width = this.width / 2;
 	 	return width;
	}
	img.src = url;
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

$('ul.nav.nav-pills li a').click(function() {           
    $(this).parent().addClass('active').siblings().removeClass('active');
    hideAllTables();
    showCorrectTable($(this).html());
});

function hideAllTables() {
	$(".characterStatsTable").hide();
    $(".bodyStatsTable").hide(); 
    $(".tiresStatsTable").hide();
   	$(".gliderStatsTable").hide();
}

function showCorrectTable($table) {
	if ($table === "Characters")
		$(".characterStatsTable").show();
	if ($table === "Bodies")
    	$(".bodyStatsTable").show();
    if ($table === "Tires") 
    	$(".tiresStatsTable").show();
	if ($table === "Gliders")	
   		$(".gliderStatsTable").show();
}