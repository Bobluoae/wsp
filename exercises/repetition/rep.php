<?php 
function Medel($arg) {
	$medelvärde = array_sum($arg) / count($arg);
	return $medelvärde;
}
function printFavorätt($matArray){

		if (count($matArray) == 1) {
			echo "Din favoriträtt är {$matArray[0]}. ";
		}
		
		if (count($matArray) > 1){
			echo "Dina favoriträtter är ";

			//echo implode(", ", $matArray) . ". "; Farsans Förslag för att fixa formateringen

			foreach ($matArray as $value) {
				echo "{$value}, ";
			}
		}
		
	}