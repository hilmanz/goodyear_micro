<?php include("header.php"); ?>
    	<h3 class="title">Data User</h3>
<?php
include("../config.php"); 
// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Retrieve data from database 
$sql="SELECT * FROM $tbl_name ORDER BY tanggal DESC";
$result=mysql_query($sql);
?>
 
        <table width="100%" class="table">
 <tr>
 	<th>No.</th>
    <th>Nama</th>
    <th>Category</th>
    <th>Momment</th>
    <th>Email</th>
    <th>Submit Date</th>
    <th>Photo</th>
	   <th>Status</th>
    <th>Action</th>
 </tr>
<?php
// Start looping rows in mysql database.
$counter = 1; 
while($rows=mysql_fetch_array($result)){
?>

<tr>
<td valign="top"><? echo $counter ; ?></td>
<td valign="top"><? echo $rows['nama']; ?></td>
<td valign="top"><? echo $rows['category']; ?></td>
<td valign="top"><? echo $rows['momment']; ?></td>
<td valign="top"><? echo $rows['email']; ?></td>
<td valign="top"><? echo $rows['tanggal']; ?></td>
<td valign="top"><img src="../<? echo $rows['thumb']; ?>" height="50px" /></td>
<td valign="top"><? if($rows['n_status']==1) {echo "Active";}else{echo "Deleted";} ?></td>

<td valign="top" class="action">
	<a href="delete-data.php?no=<?php echo $rows['no']; ?>" class="delete"><i class="icon-delete"></i></a> 
    <a href="edit.php?no=<?php echo $rows['no']; ?>" class="edit"><i class="icon-pencil"></i></a>
</td>
</tr>

<?php
 $counter++; 
// close while loop 
} ?>
</table>

<?php
// close MySQL connection 
mysql_close();
?>
 
 
<?php include("footer.php"); ?>
