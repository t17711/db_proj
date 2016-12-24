<?php
	function connect_db(){

		$link = mysqli_connect("host","uname", "pass","db"); 
		if (!$link) { 
    		die('Could not connect: ' .  mysqli_connect_error()); 
		}
		return $link;
	}

	function show_query($link, $sql){
		//$result = $link->query($sql); 
		if (mysqli_multi_query($link, $sql)) { 
			do { 

			    /* store first result set */ 
			    if ($data = mysqli_store_result($link)) { 
			      echo '<table style=\"width=100%;\" border=\"1\" >'; 
			      echo '<tr>'; 
				 for ($i=0; $i<mysqli_field_count($link);$i++){ 
					echo "<th>".mysqli_fetch_field_direct($data, $i)->name."</th>" ; 
				} 
				echo '<tr>'; 
				while ($row = mysqli_fetch_row($data)) {
					/* print your results */ 
					echo "<tr>"; 
					foreach ($row as $col) { 
						 echo "<td> $col </td>"; 
					    } 
					echo "</tr>"; 

					} 
				echo "</table> <br> ----------<br> "; 
				mysqli_free_result($data); 
			}

			} while (mysqli_next_result($link)); 
		}
		else { 
		     echo "0 results"; 
		} 
	}

?> 

</body>
</html>
