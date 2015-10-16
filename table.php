<?php
	
	// table.php
	require_once("functions.php");
	require_once("editfunctions.php");
	
	
	//kasutaja tahab midagi muuta
	if(isset($_POST["update"])){
	
		updateCar($_POST["id"], $_POST["number_plate"], $_POST["color"]);
	
	}
	
	//kas kasutaja tahab kustutada
	// kas aadressireal on ?delete=??!??!?!
	if(isset($_GET["delete"])){
		
		// saadan kaasa id, mida kustutada
		deleteCar($_GET["delete"]);
		
	}
	
	
	
	$car_list = getCarData();
	//var_dump($car_list);
?>
<table border=1 >
	<tr>
		<th>id</th>
		<th>kasut id</th>
		<th>auto nr märk</th>
		<th>värv</th>
		<th>X</th>
	</tr>
	
	<?php
	
		// iga massiivis olema elemendi kohta
		// count($car_list) - massiivi pikkus
		for($i = 0; $i < count($car_list); $i++){
			// $i = $i +1; sama mis $i += 1; sama mis $i++;
			
			// kui on see rida, mida kasutaja tahab muuta, siis kuvan input väljad
			if(isset($_GET["edit"]) && $car_list[$i]->id == $_GET["edit"]){
				//kasutajale muutmiseks
				echo "<tr>";
				echo "<form>";
				echo "<td>".$car_list[$i]->id."</td>";
				echo "<td>".$car_list[$i]->user_id."</td>";
				echo "<td><input type='hidden' name='id' value='".$car_list[$i]->id."'<input name='number plate' value='".$car_list[$i]->number_plate."'></td>";
				echo "<td><input name='color' value='".$car_list[$i]->color."'></td>";
				echo "<td><input type='submit' name='update'></td>";
				echo "<td><a href='table.php'>cancel<a/></td>";
				echo "</form>";
				
				echo "</tr>";
			
			}else{
				//tavaline rida
				echo "<tr>";
				
				echo "<td>".$car_list[$i]->id."</td>";
				echo "<td>".$car_list[$i]->user_id."</td>";
				echo "<td>".$car_list[$i]->number_plate."</td>";
				echo "<td>".$car_list[$i]->color."</td>";
				echo "<td><a href='?delete=".$car_list[$i]->id."'>X</a></td>";
				echo "<td><a href='?edit=".$car_list[$i]->id."'>Edit</a></td>";
				echo "<td><a href='edit.php?edit=".$car_list[$i]->id."'>Edit.php</a></td>";
				
				echo "</tr>";
			}
		}
	
	?>

</table>