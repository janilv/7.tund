<?php
	
	require_once("../configglobal.php");
	$database = "if15_janilv";
	
	function getSingleCarData($edit_id){
		
		//echo "id on ".$edit_id;
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
	
		$stmt = $mysqli->prepare("SELECT number_plate, color FROM car_plates WHERE id=?");
		//asendan ? märgi
		$stmt->bind_param("i", $edit_id);
		$stmt->bind_result($number_plate, $color);
		$stmt->execute();
	
		//tekitan objketi
		$car = new Stdclass();
	
	
		//saime ühe rea andmeid
		if($stmt->fetch()){
			//saan saan siin alles kasutada bind_result muutujaid
			$car->number_plate = $number_plate;
			$car->color = $color;
		
			
			
		}else{
			// ei saanud rida andmeid kätte
			// sellist id'd ei ole olemas
			// see rida võib olla kustutatud
		
			//saadan kaasa id
			$car_object = getSingleCarData($_GET["edit"]);
			var_dump($car_object);
		
		}
		
		return $car;
		
		$stmt->close();
		$mysqli->close();
	
	
	}

	
	function updateCar($id, $number_plate, $color){
	
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("UPDATE car_plates SET number_plate=?, color=? WHERE id=?");
		$stmt->bind_param("ssi", $number_plate, $color, $id);

		// kas õnnestus salvestada
		if($stmt->execute()){
				// õnnestus
				echo "jeee";
		}		
				
	

		$stmt->close();
		$mysqli->close();
		
		
		
	}	
?>