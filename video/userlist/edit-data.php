<?php include("header.php"); ?>
<?php
include("../config.php");

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
$nama=$_POST['nama'];
$momment=$_POST['momment'];
$email=$_POST['email'];
$no=$_POST['no'];

// update data in mysql database 
$sql="UPDATE $tbl_name SET nama='$nama', momment='$momment', email='$email' WHERE no='$no'";
$result=mysql_query($sql);

// if successfully deleted
if($result){  ?>

<script type="text/javascript">
var count = 5
var redirect = "index.php";
 
function countDown(){
    var timer = document.getElementById("timer");
    if(count > 0){
        count--;
        timer.innerHTML = "This page will redirect in "+count+" seconds.";
        setTimeout("countDown()", 1000);
    }else{
        window.location.href = redirect;
    }
}
</script>
<div class="messagebox">
<h3>Edit Successfully</h3>
<span id="timer">
<script type="text/javascript">countDown();</script>
</span>
<p><a href='index.php'>or back to main page</a></p>
 </div><br /><br /><br />

<?php }else {
echo "ERROR";
}
?> 

<?php 
// close connection 
mysql_close();
?>

<?php include("footer.php"); ?>
