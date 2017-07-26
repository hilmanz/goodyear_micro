<?php
include("config.php");
function pr($obj_name){
	print "<pre>";
	print_r($obj_name);
	print "</pre>";
}
// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

if (isset($_POST['saveData'])=="saveData") {
// Get values from form 
$nama=$_POST['nama'];
$email=$_POST['email'];
$category=$_POST['category'];
$momment=$_POST['momment'];
$thumb=$_POST['thumb'];
$original=$_POST['original'];
$videoname='';
//pr($_FILES);


  if ($_FILES["myfile"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["myfile"]["error"] . "<br />";
    }
  else
    {


    if (file_exists("upload/" . $_FILES["myfile"]["name"]))
      {
      echo $_FILES["myfile"]["name"] . " already exists. ";
      }
    else
      {
		
      move_uploaded_file($_FILES["myfile"]["tmp_name"],
      "upload_video/" . $_FILES["myfile"]["name"]);
      $videoname=$_FILES["myfile"]["name"];
      }
    }

  
  



// Insert data into mysql 
$sql="INSERT INTO $tbl_name(nama, email,category, momment,thumb,original,tanggal,upload_video) VALUES('$nama', '$email', '$category', '$momment', '$thumb', '$original', (CURRENT_TIMESTAMP),'$videoname')";
$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful". 
if($result){ ?>

    <div class="bg_overlay"></div>
	<div class="messagesukses">
    	<a class="close" href="index.php">X</a>
    	<div class="messagebox">
            <h3>TERIMA KASIH SUDAH IKUT BERBAGI KESERUAN MOMEN MUDIKMU 
BERSAMA GOODYEAR!</h3>
            <a href="index.php?menu=gallery" class="button">Lihat Gallery</a>
        </div>
    </div>
<?php }else { ?>

    <div class="bg_overlay"></div>
	<div class="messagesukses">
    	<a class="close" href="#">X</a>
    	<div class="messagebox">
            <h3>UPLOAD GAGAL</h3>
            <p>Silahkan coba upload kembali</p>
            <a href="index.php?menu=gallery" class="button">Lihat Gallery</a>
        </div>
    </div>

<?php }
}?>
<?php 
// close connection 
mysql_close();
?>
<div id="homePage" class="sections">
    <section id="bannerHome">
    	 <div class="container">
            <div class="row">
                <div class="col-md-6 relative">
                    <div class="bg-mobilTrack">
                        <img src="images/intro.png" />
                    </div>
                    <div class="textCapt">
                        <p>Mulai dari persiapan mudik hingga tiba di kampung halaman <br />
adalah momen-momen berharga yang sangat dinanti dan tak tergantikan.</p>
                        <p class="yellow">Share Foto Persiapan dan Momen Seru Mudikmu,
Menangkan <strong>GoPro Hero4, Samsung Galaxy A3</strong> dan 
<strong>Voucher Belanja</strong> Senilai Total <strong>Rp4.000.000!</strong></p>
                    </div>
                </div><!--row.6-->
                <div class="col-md-6">
                	<div id="messageForm">
                    	Makasi uda ikutan
                    </div>
                	<div class="mainForms" id="mainForm">
                    	<h1>IKUTAN KONTES</h1>
                          <div id="crop-avatar">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="dataform" enctype="multipart/form-data">
                        	<div class="form-group">
                            <input type="text" class="form-control" id="nama" placeholder="Nama" data-rule-required="true"  name="nama"  data-msg-required="Kamu belum mengisi nama">
                          </div>
                          <div class="form-group">
                          
                          <input type="email" class="form-control"  id="email_check" data-rule-required="true" autocomplete="off" placeholder="Email" name="email"  data-rule-email="true" data-msg-required="Kamu belum mengisi alamat email" data-msg-email="Isi alamat email kamu dengan benar">
                           <span id="result_email"></span>
                                                 
                          </div>
                          <div class="form-group">
                           <select class="form-control" name="category"  data-rule-required="true" data-msg-required="Kamu belum memilih kategori">
                              <option value="">Pilih Kategori</option>
                              <option value="Persiapan Mudik">Persiapan Mudik</option>
                              <option value="Momen Mudik">Momen Mudik</option>
                            </select>
                          </div>
						  
						   <div class="form-group">
                           <select class="form-control select_upload" name="select_upload"  data-rule-required="true" data-msg-required="Kamu belum memilih kategori">
                              <option value="">Select Upload</option>
                              <option value="video_form">Upload Video</option>
                              <option value="photo_form">Upload Foto</option>
                            </select>
                          </div>
						  
						  
						 <div class="form-group video_form" style="display:none">
							<div class="inputPhoto">
                               <span class="btnUpload browsfile">Upload Video</span>
								<div  class="injectvideonya">
								  <input style="opacity: 0;position: absolute;" type="text" name="thumbv" id="thumbv"  class="thumbv" data-rule-required="true" data-msg-required="Kamu belum mengupload foto"/>
								  <input style="display:none" type="file" class="myfile" id="myfile" name="myfile" data-rule-required="true" data-msg-required="Kamu belum mengupload Video"/>
								  <input type="hidden" name="idevent" value="{$idevent}">
								</div>
							  </div> 
						  </div>  
                          <div class="form-group photo_form" style="display:none">
                              <div class="inputPhoto">
                                <div class="avatar-view" title="Upload Photo">
                                  <span class="btnUpload">Upload Foto</span>
                                  <img src="" id="imgpreview" />
                                </div>
                                <input type="text" name="thumb" id="thumb"   data-rule-required="true" data-msg-required="Kamu belum mengupload foto"/>
                                <input type="hidden" name="original" id="original" />
                              </div>
                          </div>
						
                          <div class="form-group">
                            <textarea maxlength="250" id="momentStory" placeholder="Ceritakan Momenmu" name="momment" data-rule-required="true"  data-msg-required="Kamu belum menceritakan momenmu"></textarea>
                          </div>
                          <button type="submit" class="submit-Buttons btn btn-default" id="save" name="saveData">Submit</button>
                        </form>
                        
                        
                            <!-- Current avatar -->
                        
                            <!-- Cropping modal -->
                            <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
                                    <div class="modal-header">
                                      <button class="close" data-dismiss="modal" type="button">&times;</button>
                                      <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="avatar-body">
                        
                                        <!-- Upload image and data -->
                                        <div class="avatar-upload">
                                          <input class="avatar-src" name="avatar_src" type="hidden">
                                          <input class="avatar-data" name="avatar_data" type="hidden">
                                          <label for="avatarInput">Local upload</label>
                                          <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                        </div>
                        
                                        <!-- Crop and preview -->
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="avatar-wrapper"></div>
                                          </div>
                                          <div class="col-md-3" style="display:none;">
                                            <div class="avatar-preview preview-lg"></div>
                                            <div class="avatar-preview preview-md"></div>
                                            <div class="avatar-preview preview-sm"></div>
                                          </div>
                                        </div>
                        
                                        <div class="row avatar-btns">
                                          <div class="col-md-12">
                                          	
                                            <button class="btn btn-primary btn-block avatar-save" type="submit">SIMPAN FOTO</button>
                                            <div class="btn-group" style="display:none;">
                                              <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees">Rotate Left</button>
                                              <button class="btn btn-primary" data-method="rotate" data-option="-15" type="button">-15deg</button>
                                              <button class="btn btn-primary" data-method="rotate" data-option="-30" type="button">-30deg</button>
                                              <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button">-45deg</button>
                                            </div>
                                            <div class="btn-group" style="display:none;">
                                              <button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees">Rotate Right</button>
                                              <button class="btn btn-primary" data-method="rotate" data-option="15" type="button">15deg</button>
                                              <button class="btn btn-primary" data-method="rotate" data-option="30" type="button">30deg</button>
                                              <button class="btn btn-primary" data-method="rotate" data-option="45" type="button">45deg</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- <div class="modal-footer">
                                      <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                    </div> -->
                                  </form>
                                </div>
                              </div>
                            </div><!-- /.modal -->
                        
                            <!-- Loading state -->
                            <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                          </div>
                    </div>
                </div><!--row.6-->
            </div><!--endrow-->
        </div><!--end.container-->
    </section><!--end.bannerHOme-->
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
                    $sqlda="SELECT * FROM  $tbl_name WHERE category='Persiapan Mudik' AND n_status=1 ORDER BY  $tbl_name.`tanggal` DESC  LIMIT 0 , 3";
                    //pr($sqlda);exit;
					$resultdah=mysql_query($sqlda);
                    ?>
                        
                    <?php
                    // Start looping rows in mysql database.
                    while($rows=@mysql_fetch_assoc($resultdah)){
                    ?>
                    
                    <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                     <?php 
					 	$images = $rows['thumb']; 
						if ($images == ""){?>
                        	<div class="videobox">
                                <video id="vid-<? echo $rows['upload_video']; ?>" class="video-js vjs-default-skin" controls preload="auto" width="310" height="310" poster="images/video.jpg" data-setup='{"example_option":true}'>
                                    <source src="upload_video/<? echo $rows['upload_video']; ?>" type='video/mp4' />
                                </video>					
                        	</div>
                          <div class="caption">
                            <h3><? echo $rows['nama']; ?></h3>
                            <p><? echo $rows['momment']; ?></p>
                          </div><!--.caption-->
						<?php } else{ ?>
                          <a href="<? echo $rows['thumb']; ?>" class="origin" rel="prettyPhoto" ><img src="<? echo $rows['thumb']; ?>" alt="<h3><? echo $rows['nama']; ?></h3><p><? echo $rows['momment']; ?></p>"></a>
                          <div class="caption">
                            <h3><? echo $rows['nama']; ?></h3>
                            <p><? echo $rows['momment']; ?></p>
                          </div><!--.caption-->
						<?php } ?>
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
                    // Retrieve data from database 
                    $sqlda="SELECT * FROM  $tbl_name WHERE category='Momen Mudik' AND n_status=1 ORDER BY  $tbl_name.`tanggal` DESC  LIMIT 0 , 3";
					//pr($sqlda);exit;
				   $resultdah=mysql_query($sqlda);
                    ?>
                        
                    <?php
                    // Start looping rows in mysql database.
                    while($rows=@mysql_fetch_assoc($resultdah)){
                    ?>
                    
                    <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                     <?php 
					 	$images = $rows['thumb']; 
						if ($images == ""){?>
                        	<div class="videobox">
                                <video id="vid-<? echo $rows['upload_video']; ?>" class="video-js vjs-default-skin" controls preload="auto" width="310" height="310" poster="images/video.jpg" data-setup='{"example_option":true}'>
                                    <source src="upload_video/<? echo $rows['upload_video']; ?>" type='video/mp4' />
                                </video>					
                        	</div>
                          <div class="caption">
                            <h3><? echo $rows['nama']; ?></h3>
                            <p><? echo $rows['momment']; ?></p>
                          </div><!--.caption-->
						<?php } else{ ?>
                          <a href="<? echo $rows['thumb']; ?>" class="origin" rel="prettyPhoto" ><img src="<? echo $rows['thumb']; ?>" alt="<h3><? echo $rows['nama']; ?></h3><p><? echo $rows['momment']; ?></p>"></a>
                          <div class="caption">
                            <h3><? echo $rows['nama']; ?></h3>
                            <p><? echo $rows['momment']; ?></p>
                          </div><!--.caption-->
						<?php } ?>
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

<script>

var urt=0;

$('.browsfile').click(function(e)
 {
	console.log($('.filimg').length);

	if($('.filimg').length < 1  )
	{
	
		if($('.filimg').length==0)
		{
			$(".myfile").trigger('click');
			thiss= $(".myfile");
		}
	
	}
	else
	{
		alert('Sorry, you can only upload 1 files');
	}
	if($('.myfile').length<=1)
	{
		thiss.change(function(e)
		 {
		   
			   e.preventDefault();
				
			    $(".upload_no").html('');
				
				var dataup = $('.filimg').length;
				
				if(this.files[0].size > 25000000)
				{
				
					alert('Sorry, maximum file size is 25 MB');
					
				}
				else
				{
					
				   if(this.files[0].type!=='video/quicktime' && this.files[0].type!=='video/x-quicktime' && this.files[0].type!=='video/mp4' && this.files[0].type!=='video/avi')
					{
						alert('Sorry, we can only support mp4 files');
					
					}else{
						$('.thumbv').attr( "value", "Ada" );
						$('#thumbv-error').remove();
						$('.browsfile').html('Terima kasih, video akan Di proses')
					}
				 
				  
				}
			   
				
			   // $('browsfile')
			   // $('.bg_home').attr('src', e.target.result);   

		 });
	 }
	
 });
 
 function delimgs(rows)
		{
			
			$('.ros'+rows).remove();
		
		}
 function delimgst(rows)
		{
			
			$('.rot'+rows).remove();
		
		}
		
$( ".select_upload" ).change(function() {
  if($( ".select_upload option:selected").val()=='video_form'){
	  
	  $(".video_form").show();
	  $(".photo_form").hide();
}else{
	$(".photo_form").show();
	$(".video_form").hide();
}
});


</script>
 
