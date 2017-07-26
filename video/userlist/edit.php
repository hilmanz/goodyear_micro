<?php include("header.php"); ?>

<?php
include("../config.php");

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// get value of id that sent from address bar
$no=$_GET['no'];

// Retrieve data from database 
$sql="SELECT * FROM $tbl_name WHERE no='$no' AND n_status=1";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);

?>

	<form method="post" action="edit-data.php">
    	<h3 class="title">Form Input  Data</h3>
        <table width="100%">
        <tr>
          <td>Name</td>
          <td><input type="text" name="nama" size="20" value="<? echo $rows['nama']; ?>">
          </td>
        </tr>
        <tr>
          <td>Momment</td>
          <td><input type="text" name="momment" size="40" value="<? echo $rows['momment']; ?>">
          </td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="text" name="email" size="40" value="<? echo $rows['email']; ?>">
          </td>
        </tr>
        <tr>
          <td valign="top">Photo</td>
          <td>
          	<img src="../<? echo $rows['thumb']; ?>" height="100" />
          </td>
        </tr>
        <tr>
          <td><input name="no" type="hidden" id="no" value="<? echo $rows['no']; ?>"></td>
          <td align="right"><input type="submit" class="button" name="submit" value="SAVE"></td>
        </tr>
        </table>
	</form>
   <?php
// close connection 
mysql_close();
?>
<?php include("footer.php"); ?>
