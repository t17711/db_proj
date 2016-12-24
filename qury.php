<!DOCTYPE html>
<html lang ="en">
<head>
<!--Bootstrap -->

<!-- BOOTSTRAP -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP -->
	

	
<title> query site for my db</title>

<body>
<h1>Hello and welcome to my website.</h1> 
<!--
<form action='qury.php' method='post'> 
QUERY: <input type='text' style='width:100%' name='sqltext'
		value ="<?php echo isset($_POST['sqltext']) ? $_POST['sqltext'] : ''?>" /><br><br> 
<input type='submit'/></form>  
-->

<?php

function import_files(){
	include "db_stuff.php";
}

import_files();
$link = connect_db();
//$sql_table = "show tables";
//show_query($link,$sql_table);

/*if(isset($_POST['sqltext'])){
	$sql = $_POST['sqltext']; 
	echo "$sql <br>"; 
	show_query($link, $sql);
}*/

// now loop through trade history

echo "<h2> Connected successfully</h2>";

echo "<div class ='panel panel-default'>";

$sql = "Select *  from STOCK_TRADE  order by TRADE_TIME desc limit 50";
show_query($link,$sql);

$sql_clean = "call clean_up()";
show_query($link,$sql_clean);

echo "</div>";
mysqli_close($link); 

?> 

</body>
</html>
