<?php

	$conn = new mysqli("localhost","root","","project");
	if(! $conn){
		die("Could not connect to the database");
	}
	$sql = "select SubcategoryName from table_subcategory where CategoryName = '".$_GET['maincategory']."'";
	
	$exe = mysqli_query($conn, $sql) or die("query not executed");
	
		while ( $row = $exe -> fetch_array())
			echo "<option>".$row[0]."</option>";
?>	