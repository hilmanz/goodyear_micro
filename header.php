<header id="header">
    <nav class="navbar navbar-inverse" role="banner">
        <div class="verytop">
        	<div class="container relative">
            	 <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
            	<div class="fr subLogo">
                	<img src="images/logo-80th.png" alt="logo">
                </div>
             </div>
        </div><!--end.verytop-->
            
        <div class="container">
        	
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
            </div>
            
            <div class="collapse navbar-collapse navbar-right">
                <ul id="mainMenunya" class="nav navbar-nav">                
                    <li <?php if(@$_GET['menu']==''){ ?> class="active"<?php }?>>
                        <a href="index.php" >Beranda </a>        
                    </li>
                  <li <?php if(@$_GET['menu']=='gallery'){ ?> class="active"<?php }?>>
                        <a href="index.php?menu=gallery" >Galeri</a>        
                    </li>
                     <li <?php if(@$_GET['menu']=='info-kontes'){ ?> class="active"<?php }?>>
                        <a href="index.php?menu=info-kontes" >Info Kontes</a>        
                    </li>
                     <li <?php if(@$_GET['menu']=='tnc'){ ?> class="active"<?php }?>>
                        <a href="index.php?menu=tnc" >Syarat & Ketentuan</a>        
                    </li>
                                  
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->    
</header><!--/header-->