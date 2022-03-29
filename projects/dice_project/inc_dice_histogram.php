<?php 
class Histogram
{
	public function getHistogram($aRolls, $aFaces){
		$max = 0;
		$procentage = 0;
		$countFace;
		$total = count($aRolls);
		$out = "";
      
       	
		// FIND MAX
		for ($face=1; $face <= $aFaces; $face++) { 
			$countFace = 0;
			foreach ($aRolls as $value) {

				if ($face==$value) {
					$countFace++;
				}
			}
			if ($countFace > $max){
				$max = $countFace;
			}
		}


        for ($face=1; $face <= $aFaces; $face++) { 
        
            // 
            $countFace = 0;
            for ($i=0; $i < $total; $i++) { 
                if ($aRolls[$i] == $face) {
                    $countFace++;
                }
            } 
           

            // 
            $procentAvKast = $countFace / $total * 100;
            $procent = $countFace / $max * 100;
            
            // Gör ett html element så att bredden på stapeln blir 100% när den är $max
            //
            // $out .= '<div class="procent" style="width: '.(int) $procent.'%;"><nobr>' . "[". $face . "] " .$countFace.' st ('.(int) $procentAvKast.'%)</nobr></div>';
            //
            // Istället för en rad, skapa tydligare HTML för kodens läsbarhet.
            $out .= '<div class="procent" style="width: '.(int) $procent.'%;">';
            $out .= '  <nobr>';
            $out .= '    ['. $face . '] ' .$countFace.' st ('.(int) $procentAvKast.'%)';
            $out .= '  </nobr>';
            $out .= '</div>';
        }
        
		return $out . "Max: " . $max . "<br> Total: " . $total;

	}
}