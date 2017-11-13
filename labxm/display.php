 <fieldset>
 	<legend>Display</legend>
 	<table border="1">
 		<tr>
 			<td>Name</td>
 			<td>Profit</td>
 		</tr>
 		<?php
 			$file = fopen("log.csv", "r");
 			$i=0;
 			while(!feof($file))
 			{ 
 				if($i==0)
 				{
 					fgets($file);
 				}

 				else
 				{

				$log = explode(",",fgets($file));
				$log[3] = trim($log[3]);
		
				if($log[3] == "yes")
				{
					$name = $log[0];
					echo "<tr>";
					$profit = $log[2] - $log[1];
					echo "<td>".$name."</td>";
					echo "<td>".$profit."</td>";  
					echo "</tr>";
				}
			
 				}
 				$i++;
 			}

 		?>
 	</table>
 </fieldset>
 <form>