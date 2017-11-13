<?php 
	if(isset($_REQUEST['name']) && isset($_REQUEST['bprice']) && isset($_REQUEST['sprice']))
		{
			$name = $_REQUEST['name'];
			$bprice	= $_REQUEST['bprice'];
			$sprice	 =$_REQUEST['sprice'];
			$display = False;

			var_dump($_REQUEST);

			if(isset($_REQUEST['display']))
			{
				$display = True;
			}
			


			$errors = array();
			$flag = True;
			
			if(strlen($name)<4)
			{
				array_push($errors,"Name must be at least 4 character");
			//	echo "Name must be at least 4 character"."<br>";
				$flag = False;
				
			}
			if(!is_numeric($bprice) or !is_numeric($sprice))
			{
				array_push($errors,"Price must be a valid double number");
				$flag = False;
			}
			if($flag)
			{
				var_dump($display);
				$file = fopen("log.csv", "a");
				$rs = 'No';
				if($display)
				{
					$rs = "yes"
				}
				$row = "\r\n".$name.",".$bprice.",".$sprice.",".$rs;
				fwrite($file,$row);
				fclose($file);	
				if($display)
				{
					header("location:display.php");
				}
			}
			else
			{
				foreach ($errors as $e) {
					echo $e."<br/>";
				}
			}
		}
 ?>
 <form>
 	<fieldset>
 		<legend>Product</legend>
 		<label>Name</label><br>
 		<input type="text" name="name"><br>
 		<label>Buying Price</label><br>
 		<input type="text" name="bprice"><br>
 		<label>Selling Price</label><br>
 		<input type="text" name="sprice">
 		<hr>
 		<input type="checkbox" name="display" value="yes">&nbsp;&nbsp;Display
 		<hr>
 		<button>Save</button>
 	</fieldset>
 </form>