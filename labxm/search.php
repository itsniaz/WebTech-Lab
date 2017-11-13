<form >
	<fieldset>
	<legend>Search</legend>
	<input type="text" name="search">
	<button>Search By name</button>
	</fieldset>
	<hr>
	<table border="1">
		<tr>
			<td>Name</td>
			<td>Profit</td>
		</tr>
		<?php  
			if(isset($_REQUEST['search']))
			{
				$sr=$_REQUEST['search'];

				$file =fopen("log.csv", "r");

				$i=0;
				while(!feof($file))
				{
					echo $i;
					if($i==0)
					{
						fgets($file);
					}
					else
					{
						$log = explode(",",fgets($file));
						$name = trim($log[0]);
						$bprice = trim($log[1]);
						$sprice = trim($log[2]);
						//$resp = trim($log[3]);
						$profit = $sprice - $bprice;

						print_r($log);

						echo "<tr>";

						echo $sr;
						echo $name;
						if($sr == $name)
						{
							echo "<td>".$name."</td>";
							echo "<td>".$profit."</td>";

						}
						echo "<tr/>";
						
					}
					$i++;
				}
			}
		?>
	</table>
</form>