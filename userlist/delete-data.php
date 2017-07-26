<?php include("header.php"); ?>
<?php
include("../config.php");

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// get value of id that sent from address bar 
$no=$_GET['no'];

// Delete data in mysql from row that has this id 
//$sql="DELETE FROM $tbl_name WHERE `datalomba`.`no`='$no'";
$sql="UPDATE $tbl_name SET n_status='2' WHERE `datalomba`.`no`='$no'";
$result=mysql_query($sql);

// if successfully deleted
if($result){ ?>

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
<h3>Deleted Successfully</h3>
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
