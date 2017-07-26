<?php
include('config.php');
include("config.inc.php"); //include config file
//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//throw HTTP error if page number is not valid
if(!is_numeric($page_number)){
	header('HTTP/1.1 500 Invalid page number!');
	exit();
}

//get current starting point of records
$position = ($page_number * $item_per_page);

//Limit our results within a specified range. 
$results = mysqli_query($connecDB,"SELECT * FROM $tbl_name WHERE category='Persiapan Mudik' AND n_status=1 ORDER BY `datalomba`.`tanggal` DESC LIMIT $position, $item_per_page");

//output results from database
while($row = mysqli_fetch_array($results))
{
	echo '<div class="col-sm-6 col-md-4">';
	   echo ' <div class="thumbnail">';
		 echo ' <a href="' .$row["thumb"].'" class="origin" rel="prettyPhoto" ><img src="' .$row["thumb"].'" alt="<h3>' .$row["nama"].'</h3><p>' .$row["momment"].'</p>"></a>';
		 echo ' <div class="caption">';
		 echo '   <h3>' .$row["nama"].'</h3>';
		echo '    <p>' .$row["momment"].'</p>';
		echo '  </div>';
	   echo ' </div>';
	echo '</div>';
}
?>

