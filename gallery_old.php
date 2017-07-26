<?php include('config.php');?>

<div id="gallery" class="sections">    
    <section id="listImages">
    	<div class="container gallery">
        	<div class="rowImages">
            	<h2 class="titleList">PERSIAPAN MUDIK</h2>
            	<div class="row">
					<?php
                    // Connect to server and select database.
                    mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
                    mysql_select_db("$db_name")or die("cannot select DB");
                    
                    // Retrieve data from database 
                    $sqlda="SELECT * FROM $tbl_name WHERE category='Persiapan Mudik' ORDER BY `datalomba`.`tanggal` DESC ";
                    $resultdah=mysql_query($sqlda);
                    ?>
                        
                    <?php
                    // Start looping rows in mysql database.
                    while($rows=@mysql_fetch_assoc($resultdah)){
                    ?>
                    
                    <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                      <a href="<? echo $rows['thumb']; ?>" class="origin" rel="prettyPhoto" ><img src="<? echo $rows['thumb']; ?>" alt="<h3><? echo $rows['nama']; ?></h3><p><? echo $rows['momment']; ?></p>"></a>
                      <div class="caption">
                        <h3><? echo $rows['nama']; ?></h3>
                        <p><? echo $rows['momment']; ?></p>
                      </div><!--.caption-->
                    </div><!--.thumbnail-->
                  </div><!--.col-sm-6 col-md-4-->
                    <?php
                    // close while loop 
                    } ?>
                </div><!--.row-->
            </div><!--end.rowImages-->
            
            
        	<div class="rowImages">
            	<h2 class="titleList">MOMEN MUDIK</h2>
            	<div class="row">
					<?php
                    // Connect to server and select database.
                    mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
                    mysql_select_db("$db_name")or die("cannot select DB");
                    
                    // Retrieve data from database 
                    $sqlda="SELECT * FROM $tbl_name WHERE category='Momen Mudik' ORDER BY `datalomba`.`tanggal` DESC ";
                    $resultdah=mysql_query($sqlda);
                    ?>
                        
                    <?php
                    // Start looping rows in mysql database.
                    while($rows=@mysql_fetch_assoc($resultdah)){
                    ?>
                    
                    <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                      <a href="<? echo $rows['thumb']; ?>" class="origin" rel="prettyPhoto" ><img src="<? echo $rows['thumb']; ?>" alt="<h3><? echo $rows['nama']; ?></h3><p><? echo $rows['momment']; ?></p>"></a>
                      <div class="caption">
                        <h3><? echo $rows['nama']; ?></h3>
                        <p><? echo $rows['momment']; ?></p>
                      </div><!--.caption-->
                    </div><!--.thumbnail-->
                  </div><!--.col-sm-6 col-md-4-->
                    <?php
                    // close while loop 
                    } ?>
                </div><!--.row-->
            </div><!--end.rowImages-->
        </div><!--end.container-->
    </section>
</div><!---#hompage--->

